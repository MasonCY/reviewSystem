<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'likes',
        'dislikes',
        'added_review',
        'review',
        'rating',
        'create_date'
    ];
    function users(){
        return $this->belongsToMany('App\Models\User')->withPivot('islike');
    }
}
