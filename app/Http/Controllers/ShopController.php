<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Area;
use App\Models\Genre;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function index(Request $request)
    {
      $shops = Shop::all();
      $areas = Area::all();
      $genres = Genre::all();

      $area_id = $request->input('area_id');
      $genre_id = $request->input('genre_id');
      $search_name = $request->input('search_name');

      $query = Shop::query();

      if ($area_id)  {
        $shops = $query->where('area_id', $area_id)->get();
      }
      if ($genre_id)  {
        $shops = $query->where('genre_id', $genre_id)->get();
      }
      if ($search_name) {
        $shops = $query->where('name', 'like', '%'.$search_name.'%')->get();
      }

      $likequery = Like::query();
      $likes = $likequery->where('user_id', Auth::id())->get();
      var_dump($likes);

      return view('index', compact('shops', 'areas', 'genres', 'area_id', 'genre_id', 'search_name', 'likes'));
    }

    public function detail($id, Request $request)
    {
      $shop = Shop::find($id);
      $times = [
        '17:00',
        '17:30',
        '18:00',
        '18:30',
        '19:00',
        '19:30',
        '20:00',
        '20:30',
        '21:00',
        '21:30',
      ];
      $persons = [
        '1人',
        '2人',
        '3人',
        '4人',
        '5人',
        '6人',
        '7人',
        '8人',
        '9人',
        '10人',
      ];

      $time_id = $request->input('time_id');
      $person_id = $request->input('person_id');

      return view('detail', compact('shop', 'times', 'persons', 'time_id', 'person_id'));
    }
}
