<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'new' => $this->new,
            'bestseller' => $this->bestseller,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category->name,
            'promotion' => $this->promotion ? $this->promotion->percent : null,
            'photo' => $this->photo->path,
        ];
    }
}
