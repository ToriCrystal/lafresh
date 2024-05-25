<?php

namespace App\Services\Product;

use Illuminate\Http\Request;

interface ProductServiceInterface
{
    public function sort(Request $request);
}