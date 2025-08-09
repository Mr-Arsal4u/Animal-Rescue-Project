<?php

namespace App\Models;

use App\AnimalStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'breed',
        'description',
        'age',
        'size',
        'energy',
        'image',
        'status',
    ];

    protected $casts = [
        'status' => AnimalStatus::class,
        'age' => 'integer',
    ];

    public function getStatusColorAttribute(): string
    {
        return $this->status->getColor();
    }

    public function getStatusLabelAttribute(): string
    {
        return $this->status->getLabel();
    }

    public function getImageUrlAttribute(): ?string
    {
        if ($this->image) {
            return asset('storage/' . $this->image);
        }
        return null;
    }
}
