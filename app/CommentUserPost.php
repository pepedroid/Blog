<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentUserPost extends Model
{
    protected $fillable = ["description"];

    /**
     * Relationship one to many
     */

    public function user(){
        return $this->hasOne(User::class);
    }

}
