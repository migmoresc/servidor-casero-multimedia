@foreach ($lista as $elemento)
    <option value="{{ $elemento->nombre_revista }}">{{ $elemento->nombre_revista }}</option>
@endforeach
