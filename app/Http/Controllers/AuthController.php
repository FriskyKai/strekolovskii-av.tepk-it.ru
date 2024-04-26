<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Регистрация
    public function singIn(RegisterRequest $request) {
        User::create($request->all());

        return response()->json('Регистрация успешна')->setStatusCode(201);
    }

    // Авторизация
    public function login(LoginRequest $request) {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            throw new ApiException(401, 'Unauthorized');
        }

        return response()->json([
            'token' => Auth::user()->generateToken()
        ])->setStatusCode(200);
    }

    // Выход
    public function logout(Request $request) {
        $request->user()->forceFill(['remember_token' => ''])->save();

        return response()->json('Выход из аккаунта')->setStatusCode(200);
    }
}
