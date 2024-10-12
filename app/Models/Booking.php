<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'datetime',
        'no_of_guest',
        'table_id',
        'make_as_read'
    ];
}
