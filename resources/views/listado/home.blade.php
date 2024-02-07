@extends('layouts.plantilla')

@section('css1')
    <style>
        h1,
        p,
        li,
        h2,
        h3 {
            font-size: 24px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/listado.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('contenido')
    <div class="p-l-16 ancho-100 f-l">
        <a href="{{ route('usuario.home.principal') }}">{{ __('messages.back') }}</a>
        <a class="p-l-16"
            href="{{ route('archivo.home.mostrar_form_datos_tipo', ['tipo' => $tipo, 'accion' => __('messages.create')]) }}">{{ __('messages.create') }}</a>
    </div>
    @include('form_report')

    @if ($tipo == 'Documentales' || $tipo == 'Documentaries')
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
    @endif
    <ul class="flex-container home">
        @if (count($listado) == 0)
            <h1>{{ __('messages.nothing') }}</h1>
        @else
            @foreach ($listado as $elemento)
                @if ($elemento->saga != null)
                    <li class="flex-item">
                        <a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.film'), 'nombre' => $elemento->id]) }}">{{ $elemento->saga }}</a>
                    </li>
                @endif
                @if ($elemento->nombre_serie != null)
                    <li class="flex-item">
                        <a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.series'), 'nombre' => $elemento->id]) }}">{{ $elemento->nombre_serie }}</a>
                    </li>
                @endif
                @if ($elemento->coleccion != null)
                    <li class="flex-item">
                        <a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.book'), 'nombre' => $elemento->id]) }}">{{ $elemento->coleccion }}</a>
                    </li>
                @endif
                @if ($elemento->nombre_revista != null)
                    <li class="flex-item">
                        <a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.magazine'), 'nombre' => $elemento->id]) }}">{{ $elemento->nombre_revista }}</a>
                    </li>
                @endif
                @if ($elemento->nombre_anime != null)
                    <li class="flex-item">
                        <a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.anime'), 'nombre' => $elemento->id]) }}">{{ $elemento->nombre_anime }}</a>
                    </li>
                @endif
                @if ($elemento->album != null)
                    <li class="flex-item"><a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.music'), 'nombre' => $elemento->id]) }}">{{ $elemento->album }}</a>
                    </li>
                @endif
                @if ($elemento->lista != null)
                    <li class="flex-item"><a
                            href="{{ route('archivo.home.mostrar_por_tipo_y_nombre', ['tipo' => __('messages.video'), 'nombre' => $elemento->id]) }}">{{ $elemento->lista }}</a>
                    </li>
                @endif
                @if ($elemento->nombre_documental != null)
                    <li class="li_episodios m-b-16" data-path="{{ $elemento->file_path }}">
                        <button class="delete m-r-8">eliminar</button>{{ $elemento->nombre_documental }}
                    </li>
                @endif
                @if ($elemento->nombre_software != null)
                    <li class="m-b-16" data-path="{{ $elemento->file_path }}">

                        @if ($elemento->file_path != null)
                            <button class="delete m-r-8">eliminar</button><a
                                href="{{ route('archivo.home.software.descargar', ['path' => $elemento->file_path]) }}">{{ $elemento->nombre_software }}</a>
                        @else
                            {{ $elemento->nombre_software }}
                        @endif
                    </li>
                @endif
                @if ($elemento->nombre_otro != null)
                    <li class="" data-path="{{ $elemento->file_path }}">
                        @if ($elemento->file_path != null)
                            <button class="delete m-r-8">eliminar</button><a
                                href="{{ route('archivo.home.otros.descargar', ['path' => $elemento->file_path]) }}">{{ $elemento->nombre_otro }}</a>
                        @else
                            {{ $elemento->nombre_otro }}
                        @endif
                    </li>
                @endif
            @endforeach
        @endif

    </ul>
@endsection

@section('js')
    <script>
        let tipo = "{{ $tipo }}";
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/ver.js') }}"></script>
    <script src="{{ asset('js/eliminar.js') }}"></script>
@endsection
