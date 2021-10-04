<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','price','manufacturer','description','url'];
    function users(){
        return $this->belongsToMany('App\Models\User','reviews')->withPivot('review')->withPivot('create_date');
    }
    function images(){
        return $this->hasMany('App\Models\Image');
    }
}
