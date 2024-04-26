<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $fillable = ['start', 'end', 'user_id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function user() {
        return $this->belongsTo(User::class);
    }
}
