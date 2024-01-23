<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table = 'Subcategories';
    protected $primaryKey = 'subcat_id';
    protected $fillable = ['subcat_name', 'cat_id'];

    // Define relationships if any

    // For example, if you have a many-to-one relationship with categories, you can define it like this:
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    // If you have a one-to-many relationship with products, you can define it like this:
    public function products()
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'subcat_id');
    }
}
