@foreach ($lista as $elemento)
    <option value="{{ $elemento->album }}">{{ $elemento->album }}</option>
@endforeach
