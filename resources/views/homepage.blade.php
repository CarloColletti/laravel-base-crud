@extends('layouts.app')

@section('title')
    Homepage
@endsection

@section('main-content')
    <div class="container py-5">
      <div class="row">
        @include('partials._card')
      </div>
    </div>
@endsection