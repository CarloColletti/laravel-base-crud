@extends('layouts.app')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
@endsection

@section('title')
    Modifica dati canzone
@endsection

@section('main-content')
  <div class="container py-5 px-4">
    <h1 class="py-4">Modifica canzone: {{$song->title}}</h1>
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

    <form action="{{route('songs.update', $song)}}" method="POST" class="row">
      @csrf
      @method('PUT')
      <div class="col-4">
        <label for="title" class="form-label">Titolo: </label>
        <input type="text" class="form-controll @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') ?? $song->title }}">
        @error('title')
        <div class="invalid-tooltip">
          {{$message}}
        </div>    
        @enderror
      </div>

      <div class="col-4">
        <label for="album" class="form-label">Album: </label>
        <input type="text" class="form-controll @error('album') is-invalid @enderror" id="album" name="album" value="{{ old('album') ?? $song->album }}">
        @error('album')
          <div class="invalid-tooltip">
            {{$message}}
          </div>
        @enderror
      </div>

      <div class="col-4">
        <label for="author" class="form-label">Autore: </label>
        <input type="text" class="form-controll @error('author') is-invalid @enderror" id="author" name="author" value="{{ old('author') ?? $song->author }}">
        @error('author')
          <div class="invalid-tooltip">
            {{$message}}
          </div>
        @enderror
      </div>

      <div class="col-4">
        <label for="editor" class="form-label">Editore: </label>
        <input type="text" class="form-controll @error('editor') is-invalid @enderror" id="editor" name="editor" value="{{ old('editor') ?? $song->editor }}">
        @error('editor')
          <div class="invalid-tooltip">
            {{$message}}
          </div>
        @enderror
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-outline-success ms-auto">Salva</button>
      </div>
    </form>
  </div>
@endsection