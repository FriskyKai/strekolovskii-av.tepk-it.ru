<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Создание товара
    public function create(ProductCreateRequest $request) {
        $product = Product::create($request->all());

        return response()->json(new ProductResource($product))->setStatusCode(201);
    }

    // Просмотр всех товаров
    public function index() {
        $products = Product::all();
        return response()->json(ProductResource::collection($products))->setStatusCode(200, 'Успешно');
    }

    // Просмотр товара
    public function show($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json(new ProductResource($product))->setStatusCode(200, 'Успешно');
    }

    // Редактирование товара
    public function update(ProductUpdateRequest $request, $id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        $product->update($request->all());
        return response()->json(new ProductResource($product))->setStatusCode(200, 'Изменено');
    }

    // Удаление товара
    public function destroy($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json('Продукт не найден')->setStatusCode(404, 'Not found');
        }

        Product::destroy($id);
        return response()->json('Продукт удален')->setStatusCode(200, 'Удалено');
    }
}
