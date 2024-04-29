<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'status_id',
        'receive_method_id',
        'payment_type_id',
        'user_id',
        'address_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // Связи
    public function orderLists() {
        return $this->hasMany(OrderList::class);
    }

    public function status() {
        return $this->belongsTo(Status::class);
    }

    public function receiveMethod() {
        return $this->belongsTo(ReceiveMethod::class);
    }

    public function paymentType() {
        return $this->belongsTo(PaymentType::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function address() {
        return $this->belongsTo(Address::class);
    }
}
