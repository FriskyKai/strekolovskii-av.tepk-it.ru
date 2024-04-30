<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role_code' => $this->role->code,
            'role_name' => $this->role->name,
            'address' => $this->address ? $this->address->name : null,
        ];
    }
}
