<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function users() {
        return $this->hasMany(User::class);
    }
}
