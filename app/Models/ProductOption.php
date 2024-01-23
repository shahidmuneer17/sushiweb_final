<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    use HasFactory;

    protected $table = 'ProductOptions';
    protected $primaryKey = 'option_id';
    protected $fillable = [
        'prod_id',
        'option_name',
        'option_price',
    ];

    // Define relationships if any

    // For example, if you have a many-to-one relationship with products, you can define it like this:
    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'option_id');
    }
}
