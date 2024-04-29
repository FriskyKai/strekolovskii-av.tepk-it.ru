<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Http\Requests\SliderUpdateRequest;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    // Добавление фотографии в слайдер
    public function add(SliderAddRequest $request) {
        $slider = Slider::create($request->all());

        return response()->json($slider)->setStatusCode(201);
    }

    // Просмотр всех фотографий в слайдере
    public function index() {
        $photos = Slider::all();
        return response()->json($photos)->setStatusCode(200, 'Успешно');
    }

    // Редактирование фотографии в слайдере
    public function update(SliderUpdateRequest $request, $id) {
        $photo = Slider::find($id);

        if (!$photo) {
            return response()->json('Фотография в слайдере не найдена')->setStatusCode(404, 'Not found');
        }

        $photo->update($request->all());
        return response()->json($photo)->setStatusCode(200, 'Изменено');
    }

    // Удаление фотографии в слайдере
    public function destroy($id) {
        $photo = Slider::find($id);

        if (!$photo) {
            return response()->json('Фотография в слайдере не найдена')->setStatusCode(404, 'Not found');
        }

        Slider::destroy($id);
        return response()->json('Фотография в слайдере удалена')->setStatusCode(200, 'Удалено');
    }
}
