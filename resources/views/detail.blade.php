@extends('layouts.after_login_header')

@section('head')
    <link rel="stylesheet" href="/css/detail.css">
@endsection

@section('title', 'Rese')

@section('content')
<div class="container">
  <article class="wrap shop-wrap">
    <div class="shop-ttl">
      <a class="back-btn" href="/home"><</a>
      <h2>{{ $shop->name }}</h2>
      @if ($shop->liked(Auth::id()))
      <form class="form" action="/unlike" method="post">
      @csrf
        <!-- unlike -->
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <button type="submit">
          <i class="fa-solid fa-heart unlike"></i>
        </button>
      </form>
      @else
      <form class="form" action="/like" method="post">
      @csrf
        <!-- like -->
        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
        <button type="submit">
          <i class="fa-solid fa-heart"></i>
        </button>
      </form>
      @endif
    </div>
    <img src="{{ $shop->genre->image }}" alt="">
    <section class="shop-content">
      <p class="shop-tag">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
      <p class="shop-detail">{{ $shop->shop_detail }}</p>
    </section>
  </article>
  <div class="wrap reservation-wrap">
    <h2 class="reservation-ttl">予約</h2>
    <form class="form" action="/done" method="post">
      @csrf
      <div class="input-form">
        @error('date')
            <p class="error container__form--error">{{$message}}</p>
        @enderror
        <input class="date-form form-content" id="date_id" type="date" name="date" value="{{ old('date') }}">
        @error('time_id')
            <p class="error container__form--error">{{$message}}</p>
        @enderror
        <select class="form-content" id="time_id" name="time_id">
          <option value="">time</option>
          @foreach ($times as $time)
            <option value="{{$time}}" @if(old('time_id', $time_id ?? '') == $time) selected @endif>{{ $time }}</option>
          @endforeach
        </select>
        @error('person_id')
            <p class="error container__form--error">{{$message}}</p>
        @enderror
        <select class="form-content" id="person_id" name="person_id">
          <option value="">number</option>
          @foreach ($persons as $person)
          {{var_dump($persons)}}
            <option value="{{$person}}" @if(old('person_id', $person_id ?? '') == $person) selected @endif>{{ $person }}</option>
          @endforeach
        </select>
      </div>
      <div class="output-table">
        <table class>
          <tr>
            <th>Shop</th>
            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            <td>{{ $shop->name }}</td>
          </tr>
          <tr>
            <th>Date</th>
            <td id="output_date"></td>
          </tr>
          <tr>
            <th>Time</th>
            <td id="output_time"></td>
          </tr>
          <tr>
            <th>Number</th>
            <td id="output_num"></td>
          </tr>
        </table>
      </div>
      <div class="reserve-btn">
        <input class="btn" type="submit" value="予約する">
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">

  const inputDate = document.getElementById('date_id');
  const outputDate = document.getElementById('output_date');
  const inputTime = document.getElementById('time_id');
  const outputTime = document.getElementById('output_time');
  const inputNumber = document.getElementById('person_id');
  const outputNumber = document.getElementById('output_num');

  inputDate.addEventListener('input', updateDate);
  inputTime.addEventListener('input', updateTime);
  inputNumber.addEventListener('input', updateNumber);

  function updateDate(e) {
    outputDate.textContent = e.target.value;
  }
  function updateTime(e) {
    outputTime.textContent = e.target.value;
  }
  function updateNumber(e) {
    outputNumber.textContent = e.target.value;
  }

  // 日付の範囲指定？
  dayjs.locale('ja');
  const _nowStr = dayjs().format('YYYY-MM-DD');
  const _maxStr = dayjs().add(180, 'day').format('YYYY-MM-DD');
  const _formDate = document.getElementById('date_id');
  _formDate.attributes.min.value = _nowStr;
  _formDate.attributes.max.value = _maxStr;
</script>
@endsection
