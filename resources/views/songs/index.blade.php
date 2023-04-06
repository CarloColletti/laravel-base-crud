@extends('layouts.app')

@section('title')
    Songs
@endsection

@section('main-content')
  <div class="container py-5">
    {{-- @include('songs._card') --}}
    @include('songs._table_song')
  </div>
@endsection