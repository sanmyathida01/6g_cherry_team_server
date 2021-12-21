<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginForm;
use App\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    /**
     * コンストラクター
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginForm $request)
    {
        return $this->authService->login($request);
    }

    public function logout(LogoutForm $request)
    {
        return $this->authService->logout($request);
    }
}
