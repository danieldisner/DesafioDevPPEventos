<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'description',
        'address',
        'address_link',
        'start_time',
        'price',
    ];

    protected $dates = [
        'start_time',
    ];
}
