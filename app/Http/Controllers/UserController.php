<?php

namespace App\Http\Controllers;

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
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }

        return response()->json($user)->setStatusCode(200, 'Успешно');
    }

    // Редактирование пользователя
    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }

        $user->update($request->all());
        return response()->json($user)->setStatusCode(200, 'Изменено');
    }

    // Удаление пользователя
    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json('Пользователь не найден')->setStatusCode(404, 'Не найдено');
        }

        User::destroy($id);
        return response()->json('Пользователь удален')->setStatusCode(200, 'Удалено');
    }
}
