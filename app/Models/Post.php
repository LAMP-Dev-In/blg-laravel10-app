<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];


    // Eager loading
    protected $with = ['category', 'author'];


    // Query builder
    public function scopeFilter(Builder $query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query
                    ->where('title', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%'));  
                    

        $query->when($filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug',$category)
            )
        );

            /* $query
                ->whereExists( fn($query) =>
                    $query->from('categories')
                      ->whereColumn('categories.id', 'posts.category_id')
                      ->where('categories.slug', $category) 

            ));*/
                   
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

}
