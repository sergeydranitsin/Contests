<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    public $primaryKey = "id";
    public $table;
    protected $fillable = [
        'id', 'name', 'description', 'category', 'created_at', 'updated_at'
    ];
    public function works(){
        return $this->hasMany('App\Work', 'id_contest', 'id');
    }
}
