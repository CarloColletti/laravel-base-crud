@extends('layouts.app')

@section('title')
    Detail
@endsection

@section('main-content')
  <div class="container py-5">
    <div class="row">
      <div class="col-8">
        <ul>
          @foreach ($song->getAttributes() as $attr=>$value)
            <li><strong>{{ $attr }}: </strong>{{$value}}</li>
          @endforeach
        </ul>
      </div>

      <div class="col-4">
        <a href="{{ route('songs.index') }}" class="btn btn-outline-success ms-auto" type="submit">Torna alla lista</a>
      </div>
      
    </div>
  </div>
@endsection