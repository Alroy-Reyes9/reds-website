<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'service',
        'message',
        'status',
        'type', // 'contact' or 'booking'
        'preferred_date',
        'preferred_time',
        'address',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    // Scopes
    public function scopeContacts($query)
    {
        return $query->where('type', 'contact');
    }

    public function scopeBookings($query)
    {
        return $query->where('type', 'booking');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
