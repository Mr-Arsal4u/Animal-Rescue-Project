<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'qualifications',
        'experience_years',
        'bio',
        'image',
        'status',
        'working_hours',
        'address',
    ];

    protected $casts = [
        'working_hours' => 'array',
        'experience_years' => 'integer',
    ];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return asset('images/default-doctor.svg');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
