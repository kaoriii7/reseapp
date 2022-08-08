<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Likes;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $reservations = Reservation::where('user_id', Auth::id())->get();
      $user = Auth::user();
      $text = 'ようこそ'. Auth::user()->name . 'さん！';
      $email = $request->email;
      $password = $request->password;

      return view('mypage', compact('reservations', 'user', 'text', 'email', 'password'));
    }

    public function delete(Request $request)
    {
      Reservation::where('user_id', Auth::id())->where('id', $request->reservation_id)->delete();
      return redirect('mypage');
    }

    public function getlogout()
    {
      Auth::logout();
      return view('index');
    }
}
