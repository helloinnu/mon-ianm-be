<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'device_id',
        'status',
        'latency_ms',
        'checked_at',
    ];

    /**
     * Relasi ke Client
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relasi ke Device
     */
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
