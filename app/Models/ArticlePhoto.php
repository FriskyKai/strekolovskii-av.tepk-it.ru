<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'article_id',
        'photo_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function article() {
        return $this->belongsTo(Article::class);
    }

    public function photo() {
        return $this->belongsTo(Photo::class);
    }
}
