<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function photos() {
        return $this->hasMany(Photo::class);
    }
}
