<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user->surname . ' ' . $this->user->name,
            'product' => $this->product->name,
            'price' => $this->product->price,
            'count' => $this->count,
        ];
    }
}
