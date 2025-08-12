<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Author_old extends Model
{
    
     protected $table = 'author';
    protected $fillable = [
        
    ];
     public function authorHasManyBook()
    {
        return $this->hasMany(Book::class);
    }
}
