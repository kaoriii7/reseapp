<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShopRequest;
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

      $likes = Like::where('user_id', Auth::id())->get();

      return view('index', compact('shops', 'areas', 'genres', 'area_id', 'genre_id', 'search_name', 'likes'));
    }

    public function detail($id, Request $request)
    {
      $shop = Shop::find($id);

      $times = [];
      for ($t = 11; $t <= 24; $t++) {
        $time = $t. ':00';
        array_push($times, $time);
        $time = $t. ':30';
        array_push($times, $time);
      }

      $persons = [];
      for ($p = 1; $p <=10; $p++) {
        $person = $p. '人';
        array_push($persons, $person);
      }

      $time_id = $request->input('time_id');
      $person_id = $request->input('person_id');

      return view('detail', compact('shop', 'times', 'persons', 'person', 'time_id', 'person_id'));
    }
}
