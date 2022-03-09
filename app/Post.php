<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ["deleted_at"];

    protected $fillable = ['id', 'img', 'title', 'content', 'category_id', 'slug', 'user_id'];

    public function category(){

        return $this->belongsTo(Category::class);
    }

    public function tags(){

        return $this->belongsToMany(Tag::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


   

}
