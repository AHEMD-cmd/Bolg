<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'facebook', 'youtube', 'about', 'img'];

    public function user(){

        return $this->belongsTo(User::class);
    }
}
