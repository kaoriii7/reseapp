<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'shop_detail',
      'area_id',
      'genre_id',
    ];

    public function area()
    {
      return $this->belongsTo(Area::class);
    }

    public function genre()
    {
      return $this->belongsTo(Genre::class);
    }

    public function likes()
    {
      return $this->hasMany(Like::class);
    }

    // public function is_liked_by_auth_user()
    // {
    //   $id = Auth::id();
    //   $like_users = array();

    //   foreach ($this->likes as $like) {
    //     array_push($like_users, $like->user_id);
    //   }

    //   if(in_array($id, $like_users)) {
    //     return true;
    //   } else {
    //     return false;
    //   }
    // }
  }
