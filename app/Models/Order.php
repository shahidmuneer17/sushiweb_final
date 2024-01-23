<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;
use App\Models\User;
use App\Models\Payment;
use App\Models\Restaurents;
use App\Models\PaymentResponse;


class Order extends Model
{
    use HasFactory;

    protected $table = 'Orders';
    protected $primaryKey = 'order_id';
    protected $fillable = [
        'order_number',
        'user_id',
        'order_date',
        'order_time',
        'total_order_price',
        'estimated_delivery_time',
        'delivery_method',
        'rest_id',
        'order_status',
        'payment_status',
        'payment_id',
        'timeslot',
    ];

    // Define relationships if any

    // For example, if you have a one-to-many relationship with order details, you can define it like this:
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class, 'order_id');
    }

    public function restaurent()
    {
        return $this->belongsTo(Restaurents::class, 'rest_id');
    }
    public function paymentResponse()
    {
        return $this->hasMany(PaymentResponse::class, 'orderId');
    }
}
