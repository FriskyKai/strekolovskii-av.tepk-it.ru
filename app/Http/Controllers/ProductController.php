<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Создание роли
    public function create(ProductCreateRequest $request) {
        $product = Product::create($request->all());

        return response()->json($product)->setStatusCode(201);
    }

    // Просмотр всех ролей
    public function index() {
        $products = Product::all();
        return response()->json($products)->setStatusCode(200, 'Успешно');
    }

    // Просмотр роли
    public function show($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json($product)->setStatusCode(200, 'Успешно');
    }

    // Редактирование роли
    public function update(ProductUpdateRequest $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        $product->update($request->all());
        return response()->json($product)->setStatusCode(200, 'Изменено');
    }

    // Удаление роли
    public function destroy($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        Product::destroy($id);
        return response()->json('Продукт удален')->setStatusCode(200, 'Удалено');
    }
}
