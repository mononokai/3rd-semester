<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'rating',
        'comment',
    ];

    public function movie() {
        return $this->belongsTo(Movie::class);
    }
}
