<?php
/**
 * @author Valerio
 * 29/01/2021
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Campos de la tabla que pueden ser alterados
    protected $fillable = ["first_name","second_name","last_name","img","genre","born_date"];

/**
 * Relationship one to one
 */
 public function user(){
   return $this->belongsTo(User::class);
 }
}// class
