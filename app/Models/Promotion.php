<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = ['percent'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function products() {
        return $this->hasMany(Product::class);
    }
}
