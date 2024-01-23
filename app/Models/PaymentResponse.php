<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class PaymentResponse extends Model
{
    use HasFactory;

    protected $table = 'payment_response';
    
    protected $fillable = [
        'acquirerResponseCode', 'responseCode', 'amount', 'orderId', 's10transactionId', 'merchantId', 'transactionReference', 'currencyCode', 'paymentMethod', 'paymentMeanBrand', 'transactionDateTime', 'cardNumber', 'cardNetwork', 'cardCountry'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId', 'id');
    }
}
