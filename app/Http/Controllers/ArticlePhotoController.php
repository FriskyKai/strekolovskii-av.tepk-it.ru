<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlePhotoCreateRequest;
use App\Http\Requests\ArticlePhotoUpdateRequest;
use App\Http\Resources\ArticlePhotoResource;
use App\Models\ArticlePhoto;
use Illuminate\Http\Request;

class ArticlePhotoController extends Controller
{
    // Создание новостной фотографии
    public function create(ArticlePhotoCreateRequest $request) {
        $articlePhoto = ArticlePhoto::create($request->all());

        return response()->json(new ArticlePhotoResource($articlePhoto))->setStatusCode(201);
    }

    // Просмотр всех новостных фотографий
    public function index() {
        $articlePhotos = ArticlePhoto::all();
        return response()->json(ArticlePhotoResource::collection($articlePhotos))->setStatusCode(200, 'Успешно');
    }

    // Просмотр всех новостных фотографий по новости
    public function showByArticle($id) {
        $articlePhotos = ArticlePhoto::where('article_id', $id)->get();

        return response()->json(ArticlePhotoResource::collection($articlePhotos))->setStatusCode(200, 'Успешно');
    }

    // Редактирование новостной фотографии
    public function update(ArticlePhotoUpdateRequest $request, $id) {
        $articlePhoto = ArticlePhoto::find($id);

        if (!$articlePhoto) {
            return response()->json('Новостная фотография не найдена')->setStatusCode(404, 'Not found');
        }

        $articlePhoto->update($request->all());
        return response()->json(new ArticlePhotoResource($articlePhoto))->setStatusCode(200, 'Изменено');
    }

    // Удаление новостной фотографии
    public function destroy($id) {
        $articlePhoto = ArticlePhoto::find($id);

        if (!$articlePhoto) {
            return response()->json('Новостная фотография не найдена')->setStatusCode(404, 'Not found');
        }

        ArticlePhoto::destroy($id);
        return response()->json('Новостная фотография удалена')->setStatusCode(200, 'Удалено');
    }
}
