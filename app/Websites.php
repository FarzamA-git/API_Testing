<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Websites extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description'
    ];
    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function post()
    {
        return $this->hasMany(Posts::class);
    }
    public function users(){
        return $this->belongsToMany(User::class,'userweb');
    }
}
