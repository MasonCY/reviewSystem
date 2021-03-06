<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    function products(){
        return $this->belongsToMany('App\Models\Product','reviews')->withPivot('id','review','create_date','likes','dislikes','added_review','rating')->withTimestamps();
    }
    function reviews(){
        return $this->belongsToMany('App\Models\Review')->withPivot('islike');
    }
    function follows(){
        return $this->hasMany('App\Models\Follow');
    }
}
