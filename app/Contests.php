<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contests extends Model
{
    protected $fillable = [
        'id','name','category','created_at','updated_at'
    ];
}
