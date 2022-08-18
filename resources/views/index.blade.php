@extends('layouts.after_login_header')

@section('head')
    <link rel="stylesheet" href="css/shop.css">
@endsection

@section('title', 'Rese')

@section('content')
<div class="container">
  <form action="/home" method="get">
   <div class="search-form">
    <select name="area_id" class="form_box area_form">
      <option value="">All areas</option>
      @foreach ($areas as $area)
        @if ($area->id == $area_id)
          <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
        @else
          <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endif
      @endforeach
    </select>
    <p class="bar">|</p>
    <select name="genre_id" class="form_box genre_form">
      <option value="">All genres</option>
      @foreach ($genres as $genre)
        @if ($genre->id == $genre_id)
          <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
        @else
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endif
      @endforeach
    </select>
    <p class="bar">|</p>
    <input type="search" class="form_box name_form" placeholder="Search..." name="search_name" value="@if (isset($search_name)) {{ $search_name }} @endif">
    <button type="submit">search</button>
   </div>
  </form>
  @foreach ($shops as $shop)
  <article class="card">
    <div class="img">
      <img src="{{ $shop->genre->image }}" alt="">
    </div>
    <section class="card-content">
        <h3 class="card-ttl">{{ $shop->name }}</h3>
        <p class="card-tag">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
        <div class="btn-wrap">
          <a href="/detail/{{ $shop->id }}"><button class="btn">詳しくみる</button></a>
          @if(isset($shop->like->shop_id) && (Auth::id() == $shop->like->user_id))
            @if ($shop->like->shop_id == $shop->id)
            <form action="/unlike" method="post">
              {{var_dump($shop->id)}}
            @csrf
              <!-- unlike -->
              <input type="hidden" name="shop_id" value="{{ $shop->id }}">
              <button type="submit">
              <i class="fa-solid fa-heart unlike"></i>
              </button>
            </form>
          @endif
            @else
            <form action="/like" method="post">
              {{var_dump($shop->id)}}
            @csrf
              <!-- like -->
              <input type="hidden" name="shop_id" value="{{ $shop->id }}">
              <button type="submit">
              <i class="fa-solid fa-heart"></i>
              </button>
            </form>
            @endif
        </div>
    </section>
  </article>
  @endforeach
</div>
@endsection