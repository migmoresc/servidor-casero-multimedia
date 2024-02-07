@extends('layouts.plantilla')

@section('css1')
    <link rel="stylesheet" href="{{ asset('css/eliminados.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        h1,
        p,
        li,
        h2,
        h3 {
            font-size: 24px;
        }
    </style>
@endsection

@section('contenido')
    <a href="{{ route('usuario.home.principal') }}">{{ __('messages.back') }}</a>

    <div id="visionado">
        <span id="cerrar">Cerrar</span>
        <div id="reproductor" class="video">
            <video width="320" height="240" controls>
                <source src="" type="video/mp4">
            </video>
        </div>
        <iframe id="obj_lectura" src="" type="" width="1600" height="500"></iframe>
        <audio id="audio" controls src=""></audio>
    </div>

    <ul class="">
        @foreach (json_decode($listado) as $tipo)
            <li class="m-0"><span>{{ $tipo->tipo }}</span>
                <ul>
                    @if (in_array($tipo->tipo, ['Documentales', 'Software', 'Otros']))
                        @foreach ($tipo->lista as $lista)
                            <li class="m-1" data-path="{{ $lista->path }}" data-tipo="{{ $tipo->tipo }}"><span
                                    class="eliminar">X</span><span class="descargar">-></span>{{ $lista->nombre }}
                            </li>
                        @endforeach
                    @else
                        @foreach ($tipo->lista as $nombre => $lista)
                            <li class="m-1">{{ $nombre }}</li>
                            @if (in_array($tipo->tipo, ['Peliculas', 'Libros', 'Revistas', 'Musica', 'Videos']))
                                @foreach ($lista as $elem)
                                    <li class="m-2" data-path="{{ $elem->path }}" data-tipo="{{ $tipo->tipo }}">
                                        <span class="eliminar">X</span><span class="descargar">-></span>{{ $elem->nombre }}
                                    </li>
                                @endforeach
                            @elseif(in_array($tipo->tipo, ['Series', 'Animes']))
                                @foreach ($lista as $temporada => $episodios)
                                    <li class="m-2">Temporada {{ $temporada }}</li>
                                    <script></script>
                                    @foreach ($episodios as $episodio)
                                        <li class="m-3" data-path="{{ $episodio->path }}"
                                            data-tipo="{{ $tipo->tipo }}">
                                            {{ $episodio->numero_episodio }}</li>
                                    @endforeach
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </ul>
            </li>
        @endforeach
    </ul>
@endsection


@section('js')
    <script src="{{ asset('js/verAdmin.js') }}"></script>
@endsection
