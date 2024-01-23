<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Zone;


class Restaurents extends Model
{
    use HasFactory;

    protected $table = 'restaurents';
    protected $primaryKey = 'id';
    protected $fillable = ['restaurent_name'];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }

    // Each restaurant has many orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Each restaurant has many users
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
