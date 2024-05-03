<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // Создание категории
    public function create(CategoryCreateRequest $request) {
        $category = Category::create($request->all());

        return response()->json($category)->setStatusCode(201);
    }

    // Просмотр всех категорий
    public function index() {
        $categories = Category::all();
        return response()->json($categories)->setStatusCode(200, 'Успешно');
    }

    // Просмотр категории
    public function show($id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json('Категория не найдена')->setStatusCode(404, 'Not found');
        }

        return response()->json($category)->setStatusCode(200, 'Успешно');
    }

    // Редактирование категории
    public function update(CategoryUpdateRequest $request, $id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json('Категория не найдена')->setStatusCode(404, 'Not found');
        }

        $category->update($request->all());
        return response()->json($category)->setStatusCode(200, 'Изменено');
    }

    // Удаление категории
    public function destroy($id) {
        $category = Category::find($id);

        if (!$category) {
            return response()->json('Категория не найдена')->setStatusCode(404, 'Not found');
        }

        Category::destroy($id);
        return response()->json('Категория удалена')->setStatusCode(200, 'Удалено');
    }
}
