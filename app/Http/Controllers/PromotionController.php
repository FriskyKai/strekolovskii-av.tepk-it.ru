<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromotionCreateRequest;
use App\Http\Requests\PromotionUpdateRequest;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    // Создание акции
    public function create(PromotionCreateRequest $request) {
        $promotion = Promotion::create($request->all());

        return response()->json($promotion)->setStatusCode(201);
    }

    // Просмотр всех акций
    public function index() {
        $promotions = Promotion::all();
        return response()->json($promotions)->setStatusCode(200, 'Успешно');
    }

    // Просмотр акции
    public function show($id) {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json('Акция не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($promotion)->setStatusCode(200, 'Успешно');
    }

    // Редактирование акции
    public function update(PromotionUpdateRequest $request, $id) {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json('Акция не найдена')->setStatusCode(404, 'Not found');
        }

        $promotion->update($request->all());
        return response()->json($promotion)->setStatusCode(200, 'Изменено');
    }

    // Удаление акции
    public function destroy($id) {
        $promotion = Promotion::find($id);

        if (!$promotion) {
            return response()->json('Акция не найдена')->setStatusCode(404, 'Not found');
        }

        Promotion::destroy($id);
        return response()->json('Акция удалена')->setStatusCode(200, 'Удалено');
    }
}
