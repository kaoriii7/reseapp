<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
