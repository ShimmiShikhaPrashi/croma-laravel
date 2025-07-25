<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudDetails extends Model
{
    protected $table = 'crud_details';
    protected $fillable = [
        'crud_id',
        'title',
        'description',
    ];
  
}
