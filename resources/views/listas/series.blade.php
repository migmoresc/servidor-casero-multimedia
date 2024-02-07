@foreach ($lista as $elemento)
    <option value="{{ $elemento->nombre_serie }}">{{ $elemento->nombre_serie }}</option>
@endforeach
