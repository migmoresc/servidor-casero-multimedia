@foreach ($lista as $elemento)
    <option value="{{ $elemento->coleccion }}">{{ $elemento->coleccion }}</option>
@endforeach
