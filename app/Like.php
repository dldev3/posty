<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{

    use softDeletes;

    protected $fillable = [
      'user_id'
    ];
}
