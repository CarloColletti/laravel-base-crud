@extends('layouts.app')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
@endsection

@section('title')
    New Song
@endsection

@section('main-content')
  <div class="container py-5 px-4">
    <div class="row">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>

    <form action="{{route('songs.store')}}" method="POST" class="row">
      @csrf

      <div class="col-4">
          <label for="title" class="form-label">Titolo: </label>
          <input type="text" class="form-controll" id="title" name="title">
      </div>

      <div class="col-4">
          <label for="album" class="form-label">Album: </label>
          <input type="text" class="form-controll" id="album" name="album">
      </div>

      <div class="col-4">
          <label for="author" class="form-label">Autore: </label>
          <input type="text" class="form-controll" id="author" name="author">
      </div>

      <div class="col-4">
          <label for="editor" class="form-label">Editore: </label>
          <input type="text" class="form-controll" id="editor" name="editor">
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-outline-success ms-auto">Salva</button>
      </div>
    </form>
  </div>
@endsection