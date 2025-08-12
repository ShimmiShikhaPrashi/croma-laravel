<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\Author;

class Book_old extends Model
{
    protected $table = 'book'; 

    protected $fillable = [
        'name',
        'author_id',
        'review_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
     public function BookBelongstoAuthor()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
     public function BookHasManyReview()
    {
        return $this->hasMany(Review::class);
    }

}
