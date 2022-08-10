@extends('layouts.after_login_header')
<style>
  .container {
    padding: 0 100px;
  }
  .user-name {
    font-size: 24px;
    margin-bottom: 50px;
  }
  .content-wrap {
    display: flex;
  }
  .ttl {
    font-size: 20px;
  }
  .reservation-wrap {
    width: 40%;
  }
  .like-wrap {
    width: 50%;
  }
</style>
@section('title', 'Rese')

@section('content')
<div class="container">
  <p class="user-name">{{ $text }}</p>
  <div class="content-wrap">
    <div class="reservation-wrap">
      <h2 class="ttl">予約状況</h2>
      @foreach ($reservations as $reservation)
      <form action="{{ route('mypage.delete') }}" method="get">
        <div class="reservation-card">
          <h3>予約</h3>
          <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
          <button type="submit" class="btn">delete</button>
          <table>
            <tr>
              <th>Shop</th>
              <td>{{ $reservation->shop->name }}</td>
            </tr>
            <tr>
              <th>Date</th>
              <td>{{ $reservation->date }}</td>
            </tr>
            <tr>
              <th>Time</th>
              <td>{{ $reservation->time }}</td>
            </tr>
            <tr>
              <th>Number</th>
              <td>{{ $reservation->person }}</td>
            </tr>
          </table>
        </div>
      </form>
      @endforeach
    </div>
    <div class="like-wrap">
      <h2 class="ttl">お気に入り店舗</h2>
      @foreach ($likes as $like)
      {{var_dump($likes)}}
      <div class="like-shop">
        <p>{{ $like->shop->name }}</p>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection