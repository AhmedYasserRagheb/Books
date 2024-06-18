<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ["title", "auther"];

    // define relationship
    public function review(): HasMany
    {
        return $this->hasMany(Review::class);
    }
    // end relationship 

    public function scopeSearch(Builder $query, string $string): Builder
    {
        return $query->where("title", "LIKE", '%' . $string . '%')
        ->orWhere('auther', 'LIKE', '%' . $string . '%');
    }

    public function scopePopular(Builder $query): void
    {
        $query->withCount('review');
    }

    public function scopeHighestRate(Builder $query): void
    {
        $query->withAvg('review', 'rating');
    }

    public function scopeTopReviews(Builder $query): void
    {
        $query->popular()->highestRate()->limit(5)->orderBy('review_count', 'desc');
    }

    public function scopeTopRated(Builder $query): void
    {
        $query->highestRate()->popular()->limit(5)->orderBy('review_avg_rating', 'desc');
    }

}
