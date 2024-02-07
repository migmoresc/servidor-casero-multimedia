@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('css1')
    <link rel="stylesheet" href="{{ asset('css/listado.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenido')
    <div class="p-l-16 ancho-100 f-l">
        <a href="{{ URL::previous() }}">{{ __('messages.back') }}</a>
        <h1 class="m-t-32 t-a-c">{{ $nombre }}</h1>
    </div>
    @if (in_array($tipo, ['Series', 'Animes', 'Peliculas', 'Videos', 'Documentales']))
        <div class="visionado ancho-100 m-t-16">
            <div style="display:none">
                <span class="dato_1"></span>
                <span class="dato_2"></span>
            </div>
            <div class="video m-a">
                <div id="cerrar-visionado" class="d-i-b" onclick="cerrarVisionado()">X</div>
                <video class="video" controls>
                    <source src="" type="video/mp4">
                </video>
            </div>
        </div>
    @elseif(in_array($tipo, ['Libros', 'Revistas']))
        <iframe id="obj_lectura" class="visionado ancho-100 m-t-16" src="" type="" width="1600"
            height="500"></iframe>
    @elseif($tipo == 'Musica')
        <audio class="visionado ancho-100 m-t-16" id="audio" controls src=""></audio>
    @endif


    <ul class="ancho-100 f-l m-t-32 t-a-c p-l-16">
        @if (in_array($tipo, ['Peliculas', 'Libros', 'Series', 'Musica', 'Animes', 'Revistas']))
            <p class="m-b-16">{{ __('messages.order') }}</p>
        @endif

        @if ($listado != null)
            @if ($tipo == 'Peliculas')
                @foreach ($listado as $elemento)
                    <li class="li_episodios m-b-16 " data-path="{{ $elemento->file_path }}"><button
                            class="delete m-r-8">eliminar</button>{{ $elemento->nombre_pelicula }}</li>
                @endforeach
            @endif

            {{-- <h1>{{ $tipo }}</h1> --}}
            @if ($tipo == 'Series' || $tipo == 'Animes')
                @foreach ($listado as $temp => $episodios)
                    <li class="m-b-8">
                        {{ __('messages.season') }} {{ $temp }}
                        <ul class="p-t-16">
                            @foreach ($episodios as $episodio)
                                <li class="li_episodios m-b-16" data-path="{{ $episodio->file_path }}">
                                    <button class="delete m-r-8">eliminar</button>{{ __('messages.chapter') }}
                                    {{ $episodio->numero_episodio }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif

            @if ($tipo == 'Libros')
                @foreach ($listado as $elemento)
                    <li class="li_lecturas" data-path="{{ $elemento->file_path }}">
                        <button class="delete m-r-8">eliminar</button>{{ $elemento->nombre_libro }}
                    </li>
                @endforeach
            @endif

            @if ($tipo == 'Revistas')
                @foreach ($listado as $elemento)
                    <li class="li_lecturas" data-path="{{ $elemento->file_path }}">
                        <button class="delete m-r-8">eliminar</button>{{ $elemento->numero }}
                    </li>
                @endforeach
            @endif

            @if ($tipo == 'Musica')
                @foreach ($listado as $elemento)
                    <li class="li_audios" data-path="{{ $elemento->file_path }}">
                        @if (@isset($elemento->nombre_cancion))
                            <button class="delete m-r-8">eliminar</button>{{ $elemento->nombre_cancion }}
                        @else
                            <button class="delete m-r-8">eliminar</button>{{ $elemento->numero_cancion }}
                        @endif
                    </li>
                @endforeach
            @endif

            @if ($tipo == 'Videos')
                @foreach ($listado as $elemento)
                    <li class="li_episodios" data-path="{{ $elemento->file_path }}">
                        @if (@isset($elemento->nombre_video))
                            <button class="delete m-r-8">eliminar</button>{{ $elemento->nombre_video }}
                        @else
                            <button class="delete m-r-8">eliminar</button>{{ $elemento->numero_video }}
                        @endif
                    </li>
                @endforeach
            @endif
            {{-- {{ __('messages.chapter') }} {{ $elemento->numero_episodio }} --}}
        @else
            <p>{{ __('messages.nothing') }}</p>
        @endif
    </ul>
@endsection

@section('js')
    <script>
        let tipo = "{{ $tipo }}";
    </script>
    <script src="{{ asset('js/ver.js') }}"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
@endsection
