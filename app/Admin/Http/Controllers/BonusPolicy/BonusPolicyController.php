<?php

namespace App\Admin\Http\Controllers\BonusPolicy;

use App\Admin\Http\Controllers\Controller;
use App\Admin\Repositories\BonusPolicy\BonusPolicyRepositoryInterface;
use App\Admin\Repositories\User\UserRepositoryInterface;
use App\Admin\Services\BonusPolicy\BonusPolicyServiceInterface;
use Illuminate\Http\Request;
use App\Enums\Product\ProductUnit;

class BonusPolicyController extends Controller
{

    protected $repository;

    protected $service;

    protected $userRepo;

    public function __construct(
        BonusPolicyRepositoryInterface $repository,
        BonusPolicyServiceInterface $service,
        UserRepositoryInterface $userRepo
    ) {
        parent::__construct();
        $this->repository = $repository;
        $this->service = $service;
        $this->userRepo = $userRepo;
    }

    public function getView()
    {
        return [
            'info' => 'admin.bonus_policy.info',
            'point' => 'admin.bonus_policy.point'
        ];
    }

    public function getRoute()
    {
        return [];
    }

    public function info()
    {
        $bonus_policy_pail = $this->repository->getByQueryBuilder(['unit' => ProductUnit::Pail->value], ['detail'])->get();

        $bonus_policy_bottle = $this->repository->getByQueryBuilder(['unit' => ProductUnit::Bottle->value], ['detail'])->get();

        return view($this->view['info'], [
            'bonus_policy_pail' => $bonus_policy_pail,
            'bonus_policy_bottle' => $bonus_policy_bottle
        ]);
    }


    public function update(Request $request)
    {

        $this->service->update($request);

        return response()->json(['success' => true]);
    }

    public function point()
    {

        $results = $this->userRepo->getUnitQtyInTheAgent();

        return view($this->view['point'], [
            'results' => $results
        ]);
    }


    public function index()
    {
        $discountAgent = $this->discountAgentRepo->getAll();
        $discountSeller = $this->discountSellerRepo->getAll();

        return view($this->view['index'], [
            'discount_agent' => $discountAgent,
            'discount_seller' => $discountSeller
        ]);
    }

    public function editAgent(Request $request)
    {
        $this->discountService->updataDiscountAgent($request);
        return response()->json(['success' => true]);
    }

    public function editSeller(Request $request)
    {
        $this->discountService->updataDiscountSeller($request);
        return response()->json(['success' => true]);
    }
}
