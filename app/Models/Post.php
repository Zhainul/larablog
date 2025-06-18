<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'author_id', 'slug', 'body'];

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category() : BelongsTo 
    {
        return $this->belongsTo(Category::class);
    }
}
