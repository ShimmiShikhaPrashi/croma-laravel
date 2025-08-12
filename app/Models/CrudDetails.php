<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\crud;

class CrudDetails extends Model
{
    protected $table = 'crud_details';
    protected $fillable = [
        'crud_id',
        'title',
        'description',
    ];

    //    public function crudDetailsBelongsTo(){
    //     return $this->belongsTo(crud::class);
    // }
  
}
