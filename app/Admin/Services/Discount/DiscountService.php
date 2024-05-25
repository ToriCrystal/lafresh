<?php

namespace App\Admin\Services\Discount;

use App\Admin\Repositories\DiscountAgent\DiscountAgentRepositoryInterface;
use App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface;
use App\Admin\Services\Discount\DiscountServiceInterface;
use App\Enums\Product\ProductUnit;
use Illuminate\Http\Request;

class DiscountService implements DiscountServiceInterface
{
    protected $data;

    protected $agentRepo;

    protected $sellerRepo;

    public function __construct(
        DiscountAgentRepositoryInterface $agentRepo,
        DiscountSellerRepositoryInterface $sellerRepo
    ) {
        $this->agentRepo = $agentRepo;
        $this->sellerRepo = $sellerRepo;
    }

    public function updataDiscountAgent(Request $request)
    {

        $this->data = $request->all();

        if ($this->data['unit'] == ProductUnit::Pail->value) {
            return $this->agentRepo->update($this->data['id'], ['discount_data->pail' => $this->data['newValue']]);
        }

        return $this->agentRepo->update($this->data['id'], ['discount_data->bottle' => $this->data['newValue']]);
    }

    public function store(Request $request)
    {
        $this->data = $request->validated();

        for ($i=0; $i < count($this->data['product_id']); $i++) { 
            $discount_seller = $this->sellerRepo->create([
                'product_id' => $this->data['product_id'][$i],
                'qty' => $this->data['qty'][$i],
                'qty_donate' => $this->data['qty_donate'][$i],
            ]);
        }

        return $discount_seller;
    }

    public function updateSeller(Request $request){
        $this->data = $request->validated();
        $seller = $this->sellerRepo->update($this->data['id'], $this->data);
        return $seller;
    }

}
