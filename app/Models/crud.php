<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class crud extends Model
{
     protected $table = 'crud';
    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'stock',
        'color',
        'size',
    ];
}
