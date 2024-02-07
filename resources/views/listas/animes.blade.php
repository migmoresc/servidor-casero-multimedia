@foreach ($lista as $elemento)
    <option value="{{ $elemento->nombre_anime }}">{{ $elemento->nombre_anime }}</option>
@endforeach
