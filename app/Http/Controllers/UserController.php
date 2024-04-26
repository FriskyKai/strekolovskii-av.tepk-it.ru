<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\ApiRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Просмотр всех пользователей
    public function index() {
        $users = User::all();
        return response()->json($users)->setStatusCode(200, 'Успешно');
    }

    // Просмотр пользователя
    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json($user)->setStatusCode(200, 'Успешно');
    }

    // Редактирование пользователя
    public function update(UserUpdateRequest $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Not found');
        }

        $user->update($request->all());
        return response()->json($user)->setStatusCode(200, 'Изменено');
    }

    // Удаление пользователя
    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Not found');
        }

        User::destroy($id);
        return response()->json('Пользователь удален')->setStatusCode(200, 'Удалено');
    }

    // Профиль пользователя
    public function profile() {
        $user = auth()->user();

        return response()->json(['data' => $user]);
    }
}
