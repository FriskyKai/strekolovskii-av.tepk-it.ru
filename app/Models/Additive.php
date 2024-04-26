<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Additive extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function orderListAdditives() {
        return $this->hasMany(OrderListAdditive::class);
    }
}
