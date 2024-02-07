@foreach ($lista as $elemento)
    <option value="{{ $elemento->lista }}">{{ $elemento->lista }}</option>
@endforeach
