<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'status' => $this->status->name,
            'receive_method' => $this->receiveMethod->name,
            'payment_type' => $this->paymentType->name,
            'user' => $this->user->surname . ' ' . $this->user->name,
            'address' => $this->address->name,
        ];
    }
}
