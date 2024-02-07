@foreach ($artistas as $elemento)
    <option value="{{ $elemento->artista }}">{{ $elemento->artista }}</option>
@endforeach
