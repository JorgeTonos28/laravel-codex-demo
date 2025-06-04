<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'department',
        'extension',
        'people_count',
        'room_id',
        'event_name',
        'public_type',
        'date',
        'time',
        'needs_janitor',
        'is_canceled',
    ];

    protected $casts = [
        'date' => 'date',
        'time' => 'datetime:H:i',
        'needs_janitor' => 'boolean',
        'is_canceled' => 'boolean',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
