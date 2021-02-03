<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use App\User;
use App\Like;

class Post extends Model
{
    protected $fillable = ['body'];

    public function likedBy(User $user){
      return $this->likes->contains('user_id', $user->id);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function likes(){
      return $this->hasMany(Like::class);
    }

}
