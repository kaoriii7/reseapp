@extends('layouts.after_login_header')

<style>
  .container {
    display: flex;
    padding: 0 100px;
    justify-content: space-between;
  }
  a, input, select {
    cursor: pointer;
  }
  .wrap {
    width: 47%;
  }
  img {
    width: 100%;
  }
  .fa-heart {
    color: red;
    font-size: 40px;
    cursor: pointer;
  }
</style>

@section('title', 'Rese')

@section('head')
    <link rel="stylesheet" href="css/detail.css">
@endsection

@section('content')
<div class="container">
  <article class="wrap shop-wrap">
    <div class="shop-ttl">
      <a href="/home"><</a>
      <h2>{{ $shop->name }}</h2>
      <i class="fa-solid fa-heart"><input type="hidden"></i>
    </div>
    <img src="{{ $shop->genre->image }}" alt="">
    <section class="shop-content">
      <p class="shop-tag">#{{ $shop->area->name }} #{{ $shop->genre->name }}</p>
      <p class="shop-detail">{{ $shop->shop_detail }}</p>
    </section>
  </article>
  <div class="wrap reservation-wrap">
    <h2>予約</h2>
  <form action="/done" method="post">
      @csrf
      <div class="input-form">
        <input id="date_id" type="date" name="date" min="" max="">
        <select id="time_id" name="time_id">
          <option value="">time</option>
          @foreach ($times as $time)
            <option>{{ $time }}</option>
          @endforeach
        </select>
        <select id="person_id" name="person_id">
          <option value="">person</option>
          @foreach ($persons as $person)
            <option>{{ $person }}</option>
          @endforeach
        </select>
        @error('date')
            <p class="container__form--error">{{$message}}</p>
        @enderror
        @error('time_id')
            <p class="container__form--error">{{$message}}</p>
        @enderror
        @error('person_id')
            <p class="container__form--error">{{$message}}</p>
        @enderror
      </div>
      <table>
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
      <input type="submit" value="予約する">
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