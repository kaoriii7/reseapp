@extends('layouts.after_login_header')

@section('title', 'Rese')

@section('head')
  <link rel="stylesheet" href="/css/done.css">
@endsection

@section('content')
<div class="container">
  <p>ご予約ありがとうございます</p>
  <button class="back-btn" type="button" onClick="history.back()">戻る</button>
</div>
@endsection
