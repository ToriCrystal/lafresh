<?php

namespace App\Api\V1\Services\ShoppingCart;

use App\Api\V1\Services\ShoppingCart\ShoppingCartServiceInterface;
use App\Api\V1\Repositories\ShoppingCart\ShoppingCartRepositoryInterface;
use App\Api\V1\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartService implements ShoppingCartServiceInterface
{
    /**
     * Current Object instance
     *
     * @var array
     */
    protected $data;
    
    protected $repository;
    protected $repositoryProduct;

    public function __construct(
        ShoppingCartRepositoryInterface $repository,
        ProductRepositoryInterface $repositoryProduct,
    ){
        $this->repository = $repository;
        $this->repositoryProduct = $repositoryProduct;
    }
    
    public function store(Request $request){
        $this->data = $request->validated();
        
        try {
            foreach($this->data['product_id'] as $key => $productId){
                
                $qty = $this->data['qty'][$key] ?? 1;

                $this->repository->updateOrCreate([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productId
                ], [
                    'qty' => DB::raw("qty + {$qty}")
                ]);
            }

            return true;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    public function update(Request $request){
        
        $this->data = $request->validated();
        $instance = $this->repository->updateMultiple($this->data['id'], $this->data['qty']);
        return $instance;

    }

    public function deleteMultiple(Request $request){
        return $this->repository->deleteMultiple($request->input('id'));
    }

    public function delete($id){
        return $this->repository->delete($id);
    }

}