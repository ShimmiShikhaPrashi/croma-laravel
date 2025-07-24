<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class crud extends Model
{
    use SoftDeletes;
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
