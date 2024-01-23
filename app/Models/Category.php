<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    protected $primaryKey = 'cat_id';
    protected $fillable = ['cat_name'];

    // Define relationships if any

    // For example, if you have a one-to-many relationship with subcategories, you can define it like this:
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'cat_id');
    }
}
