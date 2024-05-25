<?php

namespace App\Services\ManagerEmployee;

use Illuminate\Http\Request;

interface ManagerEmployeeServiceInterface
{
    public function store(Request $request);
    public function storeEmployee(Request $request);
    public function updateEmployee(Request $request);
    public function delete($id);
}