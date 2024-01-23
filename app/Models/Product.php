<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'Products';
    protected $primaryKey = 'prod_id';
    protected $fillable = [
        'prod_name',
        'composition',
        'allergenes',
        'SKU',
        'price',
        'text',
        'imgsrc',
        'subcat_id',
    ];

    // Define a relationship with Subcategory
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }

    // Define a relationship with ProductOption
    public function options()
    {
        return $this->hasMany(ProductOption::class, 'prod_id');
    }
}
