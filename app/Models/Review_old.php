<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;

class Review_old extends Model
{
    protected $table = 'review';
     protected $fillable = [
   
    ];
     public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
