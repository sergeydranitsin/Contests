<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $table;
    public $primaryKey = 'id';
    protected $fillable = [
        'id', 'name', 'description', 'id_creator', 'raiting', 'is_verified', 'is_contest', 'created_at', 'updated_at'
    ];

    public function users()
    {
        return $this->belongsTo('App/User', 'id', 'id_creator');
    }

    public function images()
    {
        return $this->hasMany('App\Image', 'id_work', 'id');
    }

    public function contests()
    {
        return $this->belongsTo('App/Contest', 'id', 'id_contest');
    }
}
