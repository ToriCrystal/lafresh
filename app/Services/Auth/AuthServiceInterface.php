<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function register(Request $request);
    public function updatePassword(Request $request);
    public function updateTokenPassword(Request $request);
    public function generateRouteGetPassword($view);
    public function getInstance();
}