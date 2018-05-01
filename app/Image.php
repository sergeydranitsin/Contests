<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'id_image', 'id_work', 'id_creator', 'id_path', 'created_at', 'updated_at'
    ];
}
