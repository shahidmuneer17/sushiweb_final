<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restaurents;

class Zones extends Model
{
    use HasFactory;

    protected $table = 'zones';
    protected $primaryKey = 'id';
    protected $fillable = ['zone_id', 'zone_name', 'rest_id'];

    // Each zone has one restaurant
    public function restaurent()
    {
        return $this->hasOne(Restaurents::class);
    }
}
