<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_email',
        'client_phone',
        'pet_name',
        'pet_type',
        'pet_breed',
        'pet_age',
        'consultation_type',
        'symptoms_description',
        'emergency_contact',
        'preferred_date',
        'preferred_time',
        'additional_notes',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'pet_age' => 'integer',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopeCancelled($query)
    {
        return $query->where('status', 'cancelled');
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'confirmed' => 'blue',
            'completed' => 'green',
            'cancelled' => 'red',
            default => 'gray'
        };
    }

    public function getFullDateTimeAttribute()
    {
        return $this->preferred_date->format('M d, Y') . ' at ' . $this->preferred_time;
    }
}
