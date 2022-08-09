<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function create(Request $request)
    {
      Like::create([
        'user_id' => Auth::id(),
        'shop_id' => $request->input('shop_id'),
      ]);
      return redirect('like');
    }

    public function delete(Request $request)
    {
      $like = Like::where('shop_id', $request->input('shop_id'))->where('user_id', Auth::id())->delete();
      return redirect('like', compact(like));
    }
}
