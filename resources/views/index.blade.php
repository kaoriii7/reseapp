@extends('layouts.after_login_header')

@section('title', 'Rese')

@section('head')
    <link rel="stylesheet" href="css/shop.css">
@endsection

@section('content')
<div class="container">
  <form action="" method="get">
   <div class="search-form">
    <select name="area_id">
      <option value="">All areas</option>
      @foreach ($areas as $area)
        @if ($area->id == $area_id)
          <option value="{{ $area->id }}" selected>{{ $area->name }}</option>
        @else
          <option value="{{ $area->id }}">{{ $area->name }}</option>
        @endif
      @endforeach
    </select>
    <select name="genre_id">
      <option value="">All genres</option>
      @foreach ($genres as $genre)
        @if ($genre->id == $genre_id)
          <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
        @else
          <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endif
      @endforeach
    </select>
    <input type="search" placeholder="Search..." name="search_name" value="@if (isset($search_name)) {{ $search_name }} @endif">
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
          <i class="fa-solid fa-heart"><input type="hidden"></i>
        </div>
    </section>
  </article>
  @endforeach
</div>
@endsection