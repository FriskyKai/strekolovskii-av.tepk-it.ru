<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    protected $hidden = [
        'updated_at',
    ];

    // Связи
    public function articlePhotos() {
        return $this->hasMany(ArticlePhoto::class);
    }
}
