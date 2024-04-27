<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'new',
        'bestseller',
        'price',
        'description',
        'promotion_id',
        'photo_id',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function orderLists() {
        return $this->hasMany(OrderList::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function promotion() {
        return $this->belongsTo(Promotion::class);
    }

    public function photo() {
        return $this->belongsTo(Photo::class);
    }
}
