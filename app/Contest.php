<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'id', 'name', 'description', 'category', 'created_at', 'updated_at'
    ];
}
