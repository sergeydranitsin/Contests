<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $table;
    public $primaryKey = 'id';

    public $fillable = ['id', 'id_user', 'id_work', 'vote'];

    public function users(){
        return $this->belongsTo('App\User', 'id', 'id_user');
    }
}
