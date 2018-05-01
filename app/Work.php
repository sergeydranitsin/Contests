<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'id', 'name', 'description', 'id_creator', 'raiting', 'is_verified', 'is_contest', 'created_at', 'updated_at'
    ];

}
