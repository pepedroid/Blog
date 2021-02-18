<?php

namespace App;

/**
 * @author Valerio
 */
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // campos de la tabla que pueden ser alterados
    protected $fillable = ["title","subTitle","description","img","user_id"];

    // Relations one to one
    public function user(){
        return $this->belongsTo(User::class);
    }// user 1 . 1

    /**
     * RELATIONS ONE TO MANY
     */
    public function comments(){
        return  $this->hasMany(CommentUserPost::class);
    }

    /**
     * RELATIONS MANY TO MANY
     */

    public function likes(){
        return $this->belongsToMany(LikeUserPost::class);
    }

}// class
