<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'breed',
        'story',
        'timeline',
        'location',
        'adopted_by',
        'adoption_date',
        'stats',
        'before_image',
        'after_image',
        'featured',
        'status',
    ];

    protected $casts = [
        'stats' => 'array',
        'featured' => 'boolean',
        'adoption_date' => 'date',
    ];

    public function getBeforeImageUrlAttribute()
    {
        if ($this->before_image) {
            return asset('storage/' . $this->before_image);
        }
        return asset('images/default-before.svg');
    }

    public function getAfterImageUrlAttribute()
    {
        if ($this->after_image) {
            return asset('storage/' . $this->after_image);
        }
        return asset('images/default-after.svg');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }
}
