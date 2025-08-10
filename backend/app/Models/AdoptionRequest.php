<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdoptionRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'adopter_name',
        'adopter_email',
        'adopter_phone',
        'adopter_address',
        'adopter_age',
        'adopter_occupation',
        'adopter_experience',
        'adopter_family_size',
        'adopter_housing_type',
        'adopter_other_pets',
        'adopter_reason',
        'adopter_commitment',
        'status',
        'notes',
        'approved_by',
        'approved_at',
        'rejection_reason',
    ];

    protected $casts = [
        'adopter_age' => 'integer',
        'adopter_experience' => 'boolean',
        'approved_at' => 'datetime',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'yellow',
            'approved' => 'blue',
            'rejected' => 'red',
            'completed' => 'green',
            default => 'gray'
        };
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('M d, Y');
    }
}
