<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShiftCreateRequest;
use App\Http\Requests\ShiftUpdateRequest;
use App\Http\Resources\ShiftResource;
use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Создание смены
    public function create(ShiftCreateRequest $request) {
        $shift = Shift::create($request->all());

        return response()->json(new ShiftResource($shift))->setStatusCode(201);
    }

    // Просмотр всех смен
    public function index() {
        $shifts = Shift::all();
        return response()->json(ShiftResource::collection($shifts))->setStatusCode(200, 'Успешно');
    }

    // Просмотр смены
    public function show($id) {
        $shift = Shift::find($id);

        if (!$shift) {
            return response()->json('Смена не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json(new ShiftResource($shift))->setStatusCode(200, 'Успешно');
    }

    // Редактирование смены
    public function update(ShiftUpdateRequest $request, $id) {
        $shift = Shift::find($id);

        if (!$shift) {
            return response()->json('Смена не найдена')->setStatusCode(404, 'Not found');
        }

        $shift->update($request->all());
        return response()->json(new ShiftResource($shift))->setStatusCode(200, 'Изменено');
    }

    // Удаление смены
    public function destroy($id) {
        $shift = Shift::find($id);

        if (!$shift) {
            return response()->json('Смена не найдена')->setStatusCode(404, 'Not found');
        }

        Shift::destroy($id);
        return response()->json('Смена удалена')->setStatusCode(200, 'Удалено');
    }
}
