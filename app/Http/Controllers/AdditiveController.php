<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AdditiveCreateRequest;
use App\Http\Requests\AdditiveUpdateRequest;
use App\Models\Additive;
use Illuminate\Http\Request;

class AdditiveController extends Controller
{
    // Создание добавки
    public function create(AdditiveCreateRequest $request) {
        $additive = Additive::create($request->all());

        return response()->json($additive)->setStatusCode(201);
    }

    // Просмотр всех добавок
    public function index() {
        $additives = Additive::all();
        return response()->json($additives)->setStatusCode(200, 'Успешно');
    }

    // Просмотр добавки
    public function show($id) {
        $additive = Additive::find($id);

        if (!$additive) {
            return response()->json('Добавка не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($additive)->setStatusCode(200, 'Успешно');
    }

    // Редактирование добавки
    public function update(AdditiveUpdateRequest $request, $id) {
        $additive = Additive::find($id);

        if (!$additive) {
            return response()->json('Добавка не найдена')->setStatusCode(404, 'Not found');
        }

        $additive->update($request->all());
        return response()->json($additive)->setStatusCode(200, 'Изменено');
    }

    // Удаление добавки
    public function destroy($id) {
        $additive = Additive::find($id);

        if (!$additive) {
            return response()->json('Добавка не найдена')->setStatusCode(404, 'Not found');
        }

        Additive::destroy($id);
        return response()->json('Добавка удалена')->setStatusCode(200, 'Удалено');
    }
}
