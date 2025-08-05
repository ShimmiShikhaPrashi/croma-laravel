<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
     protected $fillable = ['title', 'description', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
