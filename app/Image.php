<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table;
    public $primaryKey = 'id';
    protected $fillable = [
        'id', 'id_work', 'id_creator', 'id_path', 'created_at', 'updated_at'
    ];
    public function works(){
        return $this->belongsTo('App/Work', 'id_contests', 'id');
    }
}
