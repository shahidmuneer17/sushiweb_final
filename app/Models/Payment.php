<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\PaymentResponse;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'Payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'payment_id',
        'order_id',
        'payment_method',
        'payment_amount',
        'payment_status',
        'payment_process_id',
    ];

    // Define relationships if any

    // For example, if you have a one-to-many relationship with order details, you can define it like this:
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function paymentResponse()
    {
        return $this->belongsTo(PaymentResponse::class, 'payment_process_id');
    }
}
