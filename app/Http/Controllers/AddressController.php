<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressCreateRequest;
use App\Http\Requests\AddressUpdateRequest;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    // Создание адреса
    public function create(AddressCreateRequest $request) {
        $address = Address::create($request->all());

        return response()->json($address)->setStatusCode(201);
    }

    // Просмотр всех адресов
    public function index() {
        $addresses = Address::all();
        return response()->json($addresses)->setStatusCode(200, 'Успешно');
    }

    // Просмотр адреса
    public function show($id) {
        $address = Address::find($id);

        if (!$address) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        return response()->json($address)->setStatusCode(200, 'Успешно');
    }

    // Редактирование адреса
    public function update(AddressUpdateRequest $request, $id) {
        $address = Address::find($id);

        if (!$address) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        $address->update($request->all());
        return response()->json($address)->setStatusCode(200, 'Изменено');
    }

    // Удаление адреса
    public function destroy($id) {
        $address = Address::find($id);

        if (!$address) {
            return response()->json('Адрес не найден')->setStatusCode(404, 'Not found');
        }

        Address::destroy($id);
        return response()->json('Адрес удален')->setStatusCode(200, 'Удалено');
    }
}
