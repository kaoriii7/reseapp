<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Shop;


class LikeController extends Controller
{
    public function like(Request $request)
    {
      if (Shop::where('like_id',$request->input('like_id'))->exists())
      {
        $like = Like::all();
        Shop::create([
          'like_id' => $request->input('like_id'),
          'name' => $request->input('name'),
          'shop_detail' => $request->input('shop_detail'),
          'area_id' => $request->input('area_id'),
          'genre_id' => $request->input('genre_id'),
        ]);
        return redirect('/home', compact('like'));
      } else {
        Shop::where('like_id',$request->input('like_id'))
        ->where('id', $request->shop_id)
        ->delete();
      return redirect('/home');
      }
    }
}
