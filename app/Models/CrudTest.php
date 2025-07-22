<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrudTest extends Model
{
     protected $table = 'crudtest';

    protected $fillable=([
        'first_name',
        'last_name'
    ]);
}
