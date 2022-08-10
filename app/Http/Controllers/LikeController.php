<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request)
    {
      if (!Like::where('user_id', Auth::id())) {
        Like::create([
          'user_id' => Auth::id(),
          'shop_id' => $request->shop_id,
        ]);
        return back();
      } else {
        Like::find($request->id)->delete();
        return back();
      }
    }
}
