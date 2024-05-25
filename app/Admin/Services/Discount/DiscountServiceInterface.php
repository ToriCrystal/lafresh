<?php

namespace App\Admin\Services\Discount;
use Illuminate\Http\Request;

interface DiscountServiceInterface
{
    public function updataDiscountAgent(Request $request);
    
    public function store(Request $request);

    public function updateSeller(Request $request);
}