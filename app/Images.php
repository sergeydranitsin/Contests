<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable = [
        'id_image','id_work','created_at','updated_at'
    ];
}
