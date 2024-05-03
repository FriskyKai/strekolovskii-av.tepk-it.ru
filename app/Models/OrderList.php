<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'count',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Автоматически вычисляем поле total перед сохранением
    protected static function boot()
    {
        parent::boot();

        // Событие перед сохранением
        static::saving(function ($orderList) {
            // Пересчитываем поле total как произведение count * price
            $orderList->total = $orderList->count * $orderList->price;
        });
    }

    // Связи
    public function orderListAdditives() {
        return $this->hasMany(OrderListAdditive::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
