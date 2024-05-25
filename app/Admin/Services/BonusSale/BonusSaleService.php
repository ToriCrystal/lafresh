<?php

namespace App\Admin\Services\BonusSale;

use App\Admin\Services\BonusSale\BonusSaleServiceInterface;
use App\Admin\Repositories\BonusSale\BonusSaleRepositoryInterface;
use Illuminate\Support\Facades\DB;

class BonusSaleService implements BonusSaleServiceInterface
{
    protected $data;

    public function __construct(
        BonusSaleRepositoryInterface $repository,
    ) {
        $this->repository = $repository;

    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

   
}
