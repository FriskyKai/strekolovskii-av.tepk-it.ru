<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'article_id'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function products() {
        return $this->hasMany(Product::class);
    }

    public function slider() {
        return $this->belongsTo(Slider::class);
    }

    public function articlePhotos() {
        return $this->hasMany(ArticlePhoto::class);
    }
}
