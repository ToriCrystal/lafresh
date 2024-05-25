<?php

namespace App\Admin\Http\Controllers\Discount;

use App\Admin\DataTables\DiscountSeller\DiscountSellerDatatable;
use App\Admin\Http\Controllers\Controller;
use App\Admin\Http\Requests\Discount\DiscountRequest;
use App\Admin\Repositories\DiscountAgent\DiscountAgentRepositoryInterface;
use App\Admin\Repositories\DiscountSeller\DiscountSellerRepositoryInterface;
use App\Admin\Repositories\Product\ProductRepositoryInterface;
use App\Admin\Services\Discount\DiscountServiceInterface;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    protected $discountAgentRepo;
    protected $discountSellerRepo;
    protected $productRepo;

    protected $discountService;

    public function __construct(
        DiscountAgentRepositoryInterface $discountAgentRepo,
        DiscountSellerRepositoryInterface $discountSellerRepo,
        DiscountServiceInterface $discountService,
        ProductRepositoryInterface $productRepo
    ) {
        parent::__construct();
        $this->discountAgentRepo = $discountAgentRepo;
        $this->discountSellerRepo = $discountSellerRepo;
        $this->discountService = $discountService;
        $this->productRepo = $productRepo;
    }

    public function getView()
    {
        return [
            'index_agent' => 'admin.discount.index-agent',
            'index_seller' => 'admin.discount.index-seller',
            'create' => 'admin.discount.partials.loop-discount-seller',
            'seller' => 'admin.discount.partials.seller',
        ];
    }

    public function getRoute()
    {
        return [

        ];
    }
    public function indexAgent()
    {
        $discountAgent = $this->discountAgentRepo->getAll();
        return view($this->view['index_agent'], [
            'discount_agent' => $discountAgent,
        ]);
    }

    public function indexSeller(DiscountSellerDatatable $dataTable)
    {
        $products = $this->productRepo->getAll();

        return $dataTable->render($this->view['index_seller'], [
            'products' => $products,
        ]);
    }

    public function editAgent(Request $request)
    {
        $this->discountService->updataDiscountAgent($request);
        return response()->json(['success' => true]);
    }

    public function store(DiscountRequest $request)
    {
        $reponse = $this->discountService->store($request);
        if ($reponse) {
            return back()->with('success', __('notifySuccess'));
        }
    }

    public function create()
    {
        $products = $this->productRepo->getAll();
        return view($this->view['create'], compact('products'));
    }

    public function deleteSeller($id)
    {
        $this->discountSellerRepo->delete($id);
        return back()->with('success', __('notifySuccess'));
    }

    public function editSeller($id){
        $seller = $this->discountSellerRepo->findOrFail($id)->load('product');
        return response()->json($seller);
    }

    public function updateSeller(DiscountRequest $request){
        $this->discountService->updateSeller($request);
        return back()->with('success', __('notifySuccess'));
    }
}
