<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoneCoordinate extends Model
{
    use HasFactory;

    protected $table = 'zone_coordinates';
    protected $primaryKey = 'id';
    protected $fillable = ['zone_id', 'lat', 'lng'];
}
