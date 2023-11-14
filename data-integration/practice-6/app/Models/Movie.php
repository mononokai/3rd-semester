<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'director',
        'description',
        'release_date',
    ];

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function scopeWithAvgRating(Builder $query): Builder {
        return $query->withAvg('reviews', 'rating');
    }

    public function scopeWithReviewsCount(Builder $query): Builder {
        return $query->withCount('reviews');
    }
}
