<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Просмотр всех статусов заказа
    public function index() {
        $statuses = Status::all();
        return response()->json($statuses)->setStatusCode(200, 'Успешно');
    }
}
