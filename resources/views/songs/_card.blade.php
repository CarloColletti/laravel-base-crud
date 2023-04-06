@foreach ($songs as $song)
  <div class="col-4">
    <div class="d-flex flex-column align-items-center">
      <div>
        <img src="{{ $song->poster }}" class="image-fluid" alt="album-image">
      </div>
      <h3 class="fs-5">
        Titolo della canzone: {{ $song->title }}
      </h3>
      <h4 class="fs-5">
        titolo dell'album: {{$song->album}}
      </h4>
      <p class="fs-5">
        Durata: {{ $song->lenght }}
      </p>
    </div>
  </div>
@endforeach