<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Создание роли
    public function create(RoleCreateRequest $request) {
        $role = Role::create($request->all());

        return response()->json($role)->setStatusCode(201);
    }

    // Просмотр всех ролей
    public function index() {
        $roles = Role::all();
        return response()->json($roles)->setStatusCode(200, 'Успешно');
    }

    // Просмотр роли
    public function show($id) {
        $role = Role::find($id);

        if (!$role) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json($role)->setStatusCode(200, 'Успешно');
    }

    // Редактирование роли
    public function update(RoleUpdateRequest $request, $id) {
        $role = Role::find($id);

        if (!$role) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        $role->update($request->all());
        return response()->json($role)->setStatusCode(200, 'Изменено');
    }

    // Удаление роли
    public function destroy($id) {
        $role = Role::find($id);

        if (!$role) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        Role::destroy($id);
        return response()->json('Адрес удален')->setStatusCode(200, 'Удалено');
    }
}
