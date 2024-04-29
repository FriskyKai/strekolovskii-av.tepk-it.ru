<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Создание новости
    public function create(ArticleCreateRequest $request) {
        $article = Article::create($request->all());

        return response()->json($article)->setStatusCode(201);
    }

    // Просмотр всех новостей
    public function index() {
        $articles = Article::all();
        return response()->json($articles)->setStatusCode(200, 'Успешно');
    }

    // Просмотр новости
    public function show($id) {
        $article = Article::find($id);

        if (!$article) {
            return response()->json('Новость не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($article)->setStatusCode(200, 'Успешно');
    }

    // Редактирование новости
    public function update(ArticleUpdateRequest $request, $id) {
        $article = Article::find($id);

        if (!$article) {
            return response()->json('Новость не найдена')->setStatusCode(404, 'Not found');
        }

        $article->update($request->all());
        return response()->json($article)->setStatusCode(200, 'Изменено');
    }

    // Удаление новости
    public function destroy($id) {
        $article = Article::find($id);

        if (!$article) {
            return response()->json('Новость не найдена')->setStatusCode(404, 'Not found');
        }

        Article::destroy($id);
        return response()->json('Новость удалена')->setStatusCode(200, 'Удалено');
    }
}
