<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table;
    public $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'first_name', 'second_name', 'moderator', 'created_at', 'updated_at', 'social_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function works(){
        return $this->belongsTo('App/Work', 'id_creator', 'id');
    }

    public function votes(){
        return $this->belongsTo('App/Vote', 'id_user','id');
    }
}
