<?php

namespace App\Api\V1\Repositories\ProductCategory;

use App\Admin\Repositories\ProductCategory\ProductCategoryRepositoryInterface as AdminProductCategoryRepositoryInterface;

interface ProductCategoryRepositoryInterface extends AdminProductCategoryRepositoryInterface
{
    public function getTreeByKeys(array $data = []);
    
    public function findByIdOrSlug($idOrSlug);

    public function findByIdOrSlugWithAncestorsAndDescendants($idOrSlug);

    public function getRootWithAllChildren();
}