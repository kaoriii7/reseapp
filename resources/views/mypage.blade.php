@extends('layouts.after_login_header')

@section('title', 'Rese')

@section('head')
  <link rel="stylesheet" href="/css/mypage.css">
@endsection

@section('content')
<div class="container">
  <p class="user-name">{{ $text }}</p>
  <div class="content-wrap">
    <div class="reservation-wrap wrap">
      <h2 class="ttl">予約状況</h2>
      @foreach ($reservations as $key=>$reservation)
      <form action="{{ route('mypage.delete') }}" method="get">
        <div class="reservation-card card">
          <div class="reservation-card__ttl">
            <h3><i class="fa-solid fa-clock fa-lg"></i>予約{{$key+1}}</h3>
            <div class="delete-btn">
              <input type="hidden" name="reservation_id" value="{{ $reservation->id }}">
              <button type="submit" class="x-btn">
                <i class="fa-regular fa-circle-xmark"></i>
              </button>
            </div>
          </div>
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
    <div class="like-wrap wrap">
      <h2 class="ttl">お気に入り店舗</h2>
      <div class="card-wrap">
      @foreach ($likes as $like)
        <article class="like-card card">
          <div class="img">
            <img src="{{ $like->shop->genre->image }}" alt="">
          </div>
          <section class="card-content">
              <h3 class="like-card__ttl">{{ $like->shop->name }}</h3>
              <p class="card__tag">#{{ $like->shop->area->name }} #{{ $like->shop->genre->name }}</p>
              <div class="btn-wrap">
                <a href="/detail/{{ $like->shop->id }}"><button class="detail-btn">詳しくみる</button></a>
                <form action="/unlike" method="post">
                @csrf
                  <!-- <p>unlike</p> -->
                  <input type="hidden" name="shop_id" value="{{ $like->shop->id }}">
                  <button type="submit">
                  <i class="fa-solid fa-heart unlike"></i>
                  </button>
                </form>
              </div>
          </section>
        </article>
      @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
