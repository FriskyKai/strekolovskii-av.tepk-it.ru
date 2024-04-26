<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderListAdditive extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function orderList() {
        return $this->belongsTo(OrderList::class);
    }

    public function additive() {
        return $this->belongsTo(Additive::class);
    }
}
