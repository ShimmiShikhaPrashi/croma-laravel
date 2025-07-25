<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CrudDetails;

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
    public function crudDetails(){
        return $this->hasOne(CrudDetails::class);
    }
     public function crudDetailsHasMany(){
        return $this->hasMany(CrudDetails::class);
    }
}
