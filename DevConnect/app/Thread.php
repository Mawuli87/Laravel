<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    use CommentableTrait;
   // protected $guarded = [];//this means we want to insert all columns values
    protected $fillable=['subject','type','thread','user_id'];

    public function User(){
        return $this->belongsTo(User::class);
    }

    // public function comments(){
    //     return $this->morphMany(Comment::class,'commentable')->latest();
    // }
}
