<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'location',
        'status',
        'start_date',
        'package_id',
        'device_id',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];
}
