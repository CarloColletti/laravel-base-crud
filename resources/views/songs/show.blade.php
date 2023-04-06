@extends('layouts.app')

@section('title')
    Detail
@endsection

@section('main-content')
  <div class="container py-5">
    <div class="row">
      <ul>
        @foreach ($song->getAttributes() as $attr=>$value)
          <li><strong>{{ $attr }}: </strong>{{$value}}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection