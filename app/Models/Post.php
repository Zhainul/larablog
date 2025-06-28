<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $with = ['user', 'category'];
    protected $fillable = ['title', 'author_id', 'slug', 'body'];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category() : BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }

    #[Scope]
    protected function filter(Builder $query, array $filters) : void
    {
        if (isset($filters['search']) && (!isset($filters['category']) && !isset($filters['user']))) {
            $query->when($filters['search'] ?? false, fn($query, $search) => 
                $query->where('title', 'like', '%'.$search.'%')->orWhere('body', 'like', '%'.$search.'%')->orWhereHas('category', fn($query) => $query->where('name', 'like', '%'.$search.'%'))->orWhereHas('user', fn($query) => $query->where('name', 'like', '%'.$search.'%'))
            );
        }else{
            $query->when($filters['search'] ?? false, fn($query, $search) => 
                $query->where('title', 'like', '%'.$search.'%')
            );

            $query->when($filters['category'] ?? false, fn($query, $category) => 
                $query->whereHas('category', fn($query) => 
                    $query->where('slug', $category)
                )
            );

            $query->when($filters['user'] ?? false, fn($query, $username) => 
                $query->whereHas('user', fn($query) => 
                    $query->where('username', $username)
                )
            );
        }
    }
}
