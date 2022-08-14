<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ShopRequest;

class ReservationController extends Controller
{
  public function create(ShopRequest $request)
  {
    $reservation = Reservation::all();
    Reservation::create([
      'shop_id' => $request->input('shop_id'),
      'user_id' => Auth::id(),
      'date' => $request->input('date'),
      'time' => $request->input('time_id'),
      'person' => $request->input('person_id'),
    ]);

    return view('done', compact('reservation'));
  }

  public function done()
  {
    return view('done');
  }
}
