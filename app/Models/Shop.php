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

    public function like()
    {
      return $this->hasOne(Like::class);
    }

    public function liked($user_id)
    {
      return Like::where('user_id', $user_id)->where('shop_id', $this->id)->first();
    }
}
