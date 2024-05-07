<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Просмотр всех ролей
    public function index() {
        $roles = Role::all();
        return response()->json($roles)->setStatusCode(200, 'Успешно');
    }

    // Просмотр роли
    public function show($id) {
        $role = Role::find($id);

        if (!$role) {
            return response()->json('Роль не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($role)->setStatusCode(200, 'Успешно');
    }
}
