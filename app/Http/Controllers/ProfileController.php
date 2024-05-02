<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Профиль пользователя
    public function profile() {
        $user = auth()->user();

        return response()->json(['data' => new UserResource($user)]);
    }

    // Редактирование профиля пользователя
    public function update(UserUpdateRequest $request) {
        $user = auth()->user();
        $user->update($request->all());

        return response()->json(new UserResource($user))->setStatusCode(200, 'Изменено');
    }
}
