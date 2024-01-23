<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'email'; // Assuming 'email' is the primary key
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
