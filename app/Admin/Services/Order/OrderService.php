<?php

namespace App\Admin\Services\Order;

use App\Admin\Repositories\BonusPolicyDetail\BonusPolicyDetailRepositoryInterface;
use App\Admin\Repositories\DiscountAgent\DiscountAgentRepositoryInterface;
use App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface;
use App\Admin\Repositories\Order\OrderDetailRepositoryInterface;
use App\Admin\Repositories\Order\OrderRepositoryInterface;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\Order\OrderServiceInterface;
use App\Enums\Order\OrderStatus;
use App\Enums\Product\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    protected $data;
    protected $subTotal;
    protected $orderDetails;
    protected $repository;
    protected $repositoryOrderDetail;
    protected $repositoryUser;
    protected $repositoryProduct;
    protected $repositoryDiscountAgent;
    protected $repositoryDiscountSeller;
    protected $repositoryBonusPolicy;

    public function __construct(
        OrderRepositoryInterface $repository,
        OrderDetailRepositoryInterface $repositoryOrderDetail,
        UserRepositoryInterface $repositoryUser,
        ProductRepositoryInterface $repositoryProduct,
        DiscountAgentRepositoryInterface $repositoryDiscountAgent,
        DiscountSellerRepositoryInterface $repositoryDiscountSeller,
        BonusPolicyDetailRepositoryInterface $repositoryBonusPolicy
    ) {
        $this->repository = $repository;
        $this->repositoryOrderDetail = $repositoryOrderDetail;
        $this->repositoryUser = $repositoryUser;
        $this->repositoryProduct = $repositoryProduct;
        $this->repositoryDiscountAgent = $repositoryDiscountAgent;
        $this->repositoryDiscountSeller = $repositoryDiscountSeller;
        $this->repositoryBonusPolicy = $repositoryBonusPolicy;
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();

        $this->data['order']['status'] = OrderStatus::Processing;
        $this->data['order']['bonus'] = 0;
        $this->data['order']['discount'] = 0;
        DB::beginTransaction();
        try {
            if (!$this->makeNewDataOrderDetail()) {
                return false;
            }

            $this->data['order']['sub_total'] = $this->subTotal;
            $userLevel = $this->repositoryUser->findLevel($this->data['order']['user_id']);

            if ($userLevel) {
                $this->data['order']['discount'] = $userLevel->typeDiscountAmount() ? (-$userLevel->plain_value) : (-$this->data['order']['sub_total'] * $userLevel->plain_value / 100);
            }

            $subTotalPail = 0;
            $subTotalBottle = 0;
            $product = [];

            foreach ($this->data['order_detail']['product_id'] as $key => $value) {
                $product[] = [
                    'id' => $value,
                    'qty' => $this->data['order_detail']['product_qty'][$key],
                    'unit' => $this->data['order_detail']['product_unit'][$key],
                ];
            }

            if (!empty($product)) {

                $subTotalPail += $this->totalPrice(
                    $this->repositoryProduct->getByIdsAndOrderByIds(array_column($product, 'id'),
                        ['purchaseQty']),
                    array_column($product, 'qty'),
                    ProductUnit::Pail->value);

                $subTotalBottle += $this->totalPrice(
                    $this->repositoryProduct->getByIdsAndOrderByIds(array_column($product, 'id'),
                        ['purchaseQty']),
                    array_column($product, 'qty'),
                    ProductUnit::Bottle->value);
            }

            $user = $this->repositoryUser->findOrFail($this->data['order']['user_id']);

            if ($user->isAgent()) {

                $this->data['order']['discount'] = $this->totalDiscountAgent($this->subTotal, $subTotalPail, $subTotalBottle);

                if ($this->bonusCheckMonth($user)) {

                    $this->data['order']['bonus'] = -($user->bonusSale->reward ?? 0);

                    $this->data['order']['total'] = $this->data['order']['sub_total'] + $this->data['order']['discount'] + $this->data['order']['bonus'];
                } else {
                    $this->data['order']['total'] = $this->data['order']['sub_total'] + $this->data['order']['discount'];
                }

            } elseif ($user->isSeller()) {

                $this->data['order']['total'] = $this->data['order']['sub_total'] + $this->data['order']['discount'];
            }

            $order = $this->repository->create($this->data['order']);

            $this->storeOrderDetail($order->id, $this->orderDetails);

            if ($user->isAgent()) {
                $this->storeBonusSale($user, $product);
            }

            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    public function storeBonusSale($user, array $product)
    {
        $result_qty = [];
        foreach ($product as $item) {
            $unit = $item['unit'];
            $qty = (int) $item['qty'];

            if (isset($result_qty[$unit])) {
                $result_qty[$unit] += $qty;
            } else {
                $result_qty[$unit] = $qty;
            }
        }

        if ($user->bonusSale) {

            if ($this->checkMonth($user)) {
                $user->bonusSale->update([
                    'qty_pail' => $user->bonusSale->qty_pail + ($result_qty[ProductUnit::Pail->value] ?? 0),
                    'qty_bottle' => $user->bonusSale->qty_bottle + ($result_qty[ProductUnit::Bottle->value] ?? 0),
                    'reward' => $this->totalBonusSale($user->bonusSale->qty_pail + ($result_qty[ProductUnit::Pail->value] ?? 0), $user->bonusSale->qty_bottle + ($result_qty[ProductUnit::Bottle->value] ?? 0)),
                ]);
            } else {
                $user->bonusSale()->update([
                    'month' => now(),
                    'qty_pail' => $result_qty[ProductUnit::Pail->value] ?? 0,
                    'qty_bottle' => $result_qty[ProductUnit::Bottle->value] ?? 0,
                    'reward' => $this->totalBonusSale($result_qty[ProductUnit::Pail->value] ?? null, $result_qty[ProductUnit::Bottle->value] ?? null),
                ]);
            }
        } else {
            $user->bonusSale()->create([
                'month' => now(),
                'qty_pail' => $result_qty[ProductUnit::Pail->value] ?? 0,
                'qty_bottle' => $result_qty[ProductUnit::Bottle->value] ?? 0,
                'reward' => $this->totalBonusSale($result_qty[ProductUnit::Pail->value] ?? null, $result_qty[ProductUnit::Bottle->value] ?? null),
            ]);
        }
    }

    private function bonusCheckMonth($user)
    {
        $currentMonth = date('Y-m');

        $nextMonth = date('Y-m', strtotime(optional($user->bonusSale)->month . '+1 month'));

        return $currentMonth >= $nextMonth;
    }

    private function checkMonth($user)
    {
        return date('Y-m', strtotime($user->bonusSale->month)) === date('Y-m');
    }

    private function totalBonusSale($qty_pail, $qty_bottle)
    {
        $total_pail = 0;
        $total_bottle = 0;

        $total_pail += $this->calculateTotalBonus($qty_pail, ProductUnit::Pail->value);

        $total_bottle += $this->calculateTotalBonus($qty_bottle, ProductUnit::Bottle->value);

        return $total = $total_pail + $total_bottle;
    }

    private function calculateTotalBonus($qty, $unit)
    {
        $total = 0;
        $bonus_policy = $this->repositoryBonusPolicy->latest($unit);

        foreach ($bonus_policy as $item) {
            if ($qty >= $item->point) {
                $total += $qty * $item->bonus;
                break;
            }
        }

        return $total;
    }

    private function makeNewDataOrderDetail()
    {
        $products = $this->repositoryProduct->getByIdsAndOrderByIds(
            array_unique($this->data['order_detail']['product_id']),
            ['purchaseQty']
        );
        if ($products->count() == 0) {
            return false;
        }
        $this->dataOrderDetail($products);
        return true;
    }
    private function dataOrderDetail($products)
    {
        foreach ($this->data['order_detail']['product_id'] as $key => $value) {
            $product = $products->firstWhere('id', $value);
            $unitPrice = $product->price_promotion ?: $product->price;
            $unitPricePurchaseQty = null;
            $unit = $product->unit->value;
            $qty = $this->data['order_detail']['product_qty'][$key];

            $purchaseQty = $product->findOnePurchaseFollowQty($qty);
            if ($purchaseQty) {
                $unitPrice = $product->price;
                if ($purchaseQty->typeAmount()) {
                    $unitPricePurchaseQty = $product->price * $qty - $purchaseQty->plain_value;
                } else {
                    $unitPricePurchaseQty = $product->price * $qty * (100 - $purchaseQty->plain_value) / 100;
                }
            }

            $this->orderDetails[] = [
                'product_id' => $product->id,
                'unit_price' => $unitPrice,
                'unit' => $unit,
                'unit_price_purchase_qty' => $unitPricePurchaseQty,
                'qty' => $this->data['order_detail']['product_qty'][$key],
                'qty_donate' => $this->data['order_detail']['product_qty_donate'][$key] ?? null,
                'detail' => [
                    'product' => $product,
                ],
            ];
            $this->subTotal += $unitPricePurchaseQty ? $unitPricePurchaseQty : $unitPrice * $qty;
        }
    }

    protected function storeOrderDetail($orderId, $data)
    {
        foreach ($data as $item) {
            $item['order_id'] = $orderId;
            $this->repositoryOrderDetail->create($item);
        }
    }

    public function update(Request $request)
    {
        $this->data = $request->validated();
        DB::beginTransaction();
        try {
            $order = $this->repository->update($this->data['order']['id'], $this->data['order']);
            DB::commit();
            return $order;
        } catch (\Throwable $th) {
            throw $th;
            DB::rollBack();
            return false;
        }
    }

    private function updateOrCreateDataOrderDetail()
    {
        $data = [];
        foreach ($this->data['order_detail']['id'] as $key => $value) {
            if ($value == 0) {
                $data['product_id'][] = $this->data['order_detail']['product_id'][$key];
                $data['product_qty'][] = $this->data['order_detail']['product_qty'][$key];
            } else {
                $product = $this->repositoryProduct->findOrFailWithRelations($this->data['order_detail']['product_id'][$key], ['purchaseQty']);
                $unitPrice = $product->price_promotion ?: $product->price;
                $unitPricePurchaseQty = null;
                $qty = $this->data['order_detail']['product_qty'][$key];

                $purchaseQty = $product->findOnePurchaseFollowQty($qty);

                if ($purchaseQty) {
                    $unitPrice = $product->price;
                    if ($purchaseQty->typeAmount()) {
                        $unitPricePurchaseQty = $product->price * $qty - $purchaseQty->plain_value;
                    } else {
                        $unitPricePurchaseQty = $product->price * $qty * (100 - $purchaseQty->plain_value) / 100;
                    }
                }

                $orderDetail = $this->repositoryOrderDetail->update($value, [
                    'qty' => $qty,
                    'unit_price' => $unitPrice,
                    'unit_price_purchase_qty' => $unitPricePurchaseQty,
                ]
                );
                $this->subTotal += $unitPricePurchaseQty ? $unitPricePurchaseQty : $unitPrice * $qty;
            }
        }
        return $data;
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function addProduct(Request $request)
    {
        $data = $request->validated();
        $product = $this->repositoryProduct->findOrFail($data['product_id']);
        return $product;
    }

    public function calculateTotal(Request $request)
    {
        $data = $request->validated('order_detail');
        $data_user = $request->validated('order');

        $subTotal = 0;
        $subTotalPail = 0;
        $subTotalBottle = 0;
        $discount = 0;
        $bonus = 0;
        $product = [];

        foreach ($data['product_id'] as $key => $value) {
            $product[] = [
                'id' => $value,
                'qty' => $data['product_qty'][$key],
            ];
        }

        if (!empty($product)) {

            $subTotal += $this->totalPrice(
                $this->repositoryProduct->getByIdsAndOrderByIds(array_column($product, 'id'), ['purchaseQty']),
                array_column($product, 'qty')
            );

            $userLevel = $this->repositoryUser->findLevel($request->input('order.user_id'));
            if ($userLevel) {
                $discount = $userLevel->typeDiscountAmount() ? (-$userLevel->plain_value) : (-$subTotal * $userLevel->plain_value / 100);
            }

            $subTotalPail += $this->totalPrice(
                $this->repositoryProduct->getByIdsAndOrderByIds(array_column($product, 'id'),
                    ['purchaseQty']),
                array_column($product, 'qty'),
                ProductUnit::Pail->value);

            $subTotalBottle += $this->totalPrice(
                $this->repositoryProduct->getByIdsAndOrderByIds(array_column($product, 'id'),
                    ['purchaseQty']),
                array_column($product, 'qty'),
                ProductUnit::Bottle->value);
        }

        $user = $this->repositoryUser->findOrFail($data_user['user_id']);

        if ($user->isAgent()) {

            $discount = $this->totalDiscountAgent($subTotal, $subTotalPail, $subTotalBottle);

            if ($this->bonusCheckMonth($user) && $this->checkCompareBonusAndTotal($user, $subTotal, $discount)) {

                $bonus = -($user->bonusSale->reward ?? 0);

            }
            $total = $subTotal + $discount + $bonus;

        } elseif ($user->isSeller()) {

            $total = $subTotal + $discount;
        }

        return [
            'sub_total' => $subTotal,
            'discount' => $discount,
            'total' => max(0, $total),
            'bonus' => $bonus ?? 0,
            'user' => $user->roles,
        ];
    }

    private function checkCompareBonusAndTotal($user, $subTotal, $discount)
    {

        return $user->bonusSale->reward <= ($subTotal + $discount);

    }

    public function totalDiscountAgent($subTotal, $subTotalPail, $subTotalBottle)
    {
        $discount_pail = 0;
        $discount_bottle = 0;
        if ($subTotal > 10000000) {

            $ratio = $this->repositoryDiscountAgent->findLevel(1);

            $discount_pail += -($subTotalPail * $ratio->discount_data['pail'] / 100);
            $discount_bottle += -($subTotalBottle * $ratio->discount_data['bottle'] / 100);

        } elseif ($subTotal > 5000000) {

            $ratio = $this->repositoryDiscountAgent->findLevel(2);

            $discount_pail += -($subTotalPail * $ratio->discount_data['pail'] / 100);
            $discount_bottle += -($subTotalBottle * $ratio->discount_data['bottle'] / 100);
        }

        return $discount_pail + $discount_bottle;
    }

    public function totalPrice($collect, $qty, $unit = null)
    {
        $total = 0;

        $total += $collect->mapWithKeys(function ($product, $key) use ($qty, $unit) {
            if (!$unit || $product->unit->value === $unit) {
                $purchaseQty = $product->findOnePurchaseFollowQty($qty[$key]);
                if ($purchaseQty) {
                    if ($purchaseQty->typeAmount()) {
                        $price = $product->price * $qty[$key] - $purchaseQty->plain_value;
                    } else {
                        $price = $product->price * $qty[$key] * (100 - $purchaseQty->plain_value) / 100;
                    }
                } else {
                    $price = ($product->price_promotion ?: $product->price) * $qty[$key];
                }

                return [$product->id => $price];
            }

            return [];
        })->sum();

        return $total;
    }

    public function updatePriceProduct(Request $request)
    {
        $data = $request->validated();

        $product = $this->repositoryProduct->findOrFailWithRelations($data['id'], ['purchaseQty']);
        $purchaseQty = $product->findOnePurchaseFollowQty($data['qty']);
        $discountSeller = $product->discountSeller()->orderBy('qty', 'desc')->get();

        foreach ($discountSeller as $item) {
            if ($data['qty'] >= $item->qty){
                $qty_donate = $item->qty_donate;
                break;
            }
        }
        if ($purchaseQty) {
            return [
                'unit_price' => $product->price,
                'total' => $purchaseQty->typeAmount() ? $product->price * $data['qty'] - $purchaseQty->plain_value : $product->price * $data['qty'] * (100 - $purchaseQty->plain_value) / 100,
                'qty_donate' => $qty_donate ?? 0,
            ];
        } else {
            $unitPrice = $product->price_promotion ?: $product->price;
            return [
                'unit_price' => $unitPrice,
                'total' => $unitPrice * $data['qty'],
                'qty_donate' => $qty_donate ?? 0,
            ];
        }
    }
}
