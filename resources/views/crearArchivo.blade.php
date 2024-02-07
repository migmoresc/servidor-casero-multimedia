@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('css1')
    <style>
        form .{{ $tipo }} {
            display: block;
        }

        form label,
        form input {
            margin: 8px;
            width: 90%;
        }

        h2 {
            font-size: 32px;
            margin-bottom: 16px;
        }
    </style>
@endsection

@section('contenido')

    <div class="p-l-16 ancho-100 f-l">
        <h1>{{ $tipo }}</h1>
        <p class=""><a href="{{ $ruta }}" tabindex="15">{{ __('messages.back') }}</a></p>
    </div>

    <div class="centrado top-60 p-b-32">

        @if (isset($mensaje))
            <h2 tabindex="16">{{ $mensaje }}</h2>
        @endif

        <form class="formulario p-16"
            action="{{ route('archivo.home.crear_datos_tipo', ['tipo' => $tipo, 'accion' => __('messages.create')]) }}"
            method="post" enctype="multipart/form-data">

            @csrf

            {{-- para peliculas --}}
            @if ($tipo == 'Peliculas')
                <label for="saga" class="Peliculas " tabindex="17">*{{ __('messages.sage') }}:</label>
                <input id="saga" list="sagas" class="Peliculas" name="saga" onchange="obtenerInfo(this)"
                    maxlength="50" autocomplete="on" value="{{ old('saga') }}" tabindex="18"
                    @if ($tipo == 'Peliculas') required @endif>
                <datalist id="sagas">
                    @include('listas.saga')
                </datalist>

                @error('saga')
                    <p class="error" tabindex="19">{{ $message }}</p>
                @enderror

                <label for="nombre_pelicula" class="Peliculas" tabindex="20">{{ __('messages.film_name') }}:</label>
                <input id="nombre_pelicula" type="text" class="Peliculas" name="nombre_pelicula" maxlength=""
                    autocomplete="on" value="{{ old('nombre_pelicula') }}" tabindex="21"
                    @if ($tipo == 'Peliculas') required @endif>
                @error('nombre_pelicula')
                    <p class="error">{{ $message }}</p tabindex="22">
                @enderror

                <label for="orden_pelicula" class="Peliculas" tabindex="23">{{ __('messages.order') }}:</label>
                <input id="orden_pelicula" type="number" class="Peliculas" name="orden_pelicula" maxlength=""
                    autocomplete="on" value="{{ old('orden') }}" min="1" max="127" tabindex="24">
                @error('orden')
                    <p class="error">{{ $message }}</p tabindex="25">
                @enderror
            @endif

            {{-- para  series --}}

            @if ($tipo == 'Series')
                <label for="nombre_serie" class="Series" tabindex="26">{{ __('messages.serie_name') }}:</label>
                <input id="nombre_serie" list="series" class="Series" name="nombre_serie" onchange="obtenerInfo(this)"
                    maxlength="255" autocomplete="on" value="{{ old('nombre_serie') }}" tabindex="27"
                    @if ($tipo == 'Series') required @endif>
                <datalist id="series">
                    @include('listas.series')
                </datalist>
                @error('nombre_serie')
                    <p class="error">{{ $message }}</p tabindex="28">
                @enderror

                <label for="numero_temporada_serie" class="Series" tabindex="29">{{ __('messages.temp_number') }}:</label>
                <input id="numero_temporada_serie" type="number" min="1" max="127" class="Series"
                    name="numero_temporada_serie" maxlength="" autocomplete="on"
                    value="{{ old('numero_temporada_serie') }}" tabindex="30" required>
                @error('numero_temporada_serie')
                    <p class="error">{{ $message }}</p tabindex="31">
                @enderror

                <label for="numero_episodio_serie" class="Series"
                    tabindex="32">{{ __('messages.chapter_number') }}:</label>
                <input id="numero_episodio_serie" type="number" min="1" max="32767" class="Series"
                    name="numero_episodio_serie" maxlength="" autocomplete="on"
                    value="{{ old('numero_episodio_serie') }}" tabindex="33" required>
                @error('numero_episodio_serie')
                    <p class="error">{{ $message }}</p tabindex="34">
                @enderror
            @endif

            {{-- para libros --}}

            @if ($tipo == 'Libros')
                <label for="coleccion" class="Libros" tabindex="35">{{ __('messages.book_colection') }}:</label>
                <input id="coleccion" list="colecciones" class="Libros" name="coleccion" onchange="obtenerInfo(this)"
                    maxlength="255" autocomplete="on" value="{{ old('coleccion') }}" tabindex="36"
                    @if ($tipo == 'Libros') required @endif>
                <datalist id="colecciones">
                    @include('listas.colecciones')
                </datalist>
                @error('coleccion')
                    <p class="error">{{ $message }}</p tabindex="37">
                @enderror

                <label for="nombre_libro" class="Libros" tabindex="38">{{ __('messages.book_name') }}:</label>
                <input id="nombre_libro" type="text" class="Libros" name="nombre_libro" maxlength="255"
                    autocomplete="on" value="{{ old('nombre_libro') }}" tabindex="39"
                    @if ($tipo == 'Libros') required @endif>
                @error('nombre_libro')
                    <p class="error">{{ $message }}</p tabindex="40">
                @enderror

                <label for="orden_libro" class="Libros" tabindex="41">{{ __('messages.order') }}:</label>
                <input id="orden_libro" type="number" class="Libros" name="orden_libro" maxlength=""
                    autocomplete="on" value="{{ old('orden') }}" min="1" max="127" tabindex="42">
                @error('orden')
                    <p class="error">{{ $message }}</p tabindex="43">
                @enderror
            @endif

            {{-- para revistas --}}
            @if ($tipo == 'Revistas')
                <label for="nombre_revista" class="Revistas" tabindex="44">{{ __('messages.magazine_name') }}:</label>
                <input id="nombre_revista" list="revistas" class="Revistas" name="nombre_revista" maxlength="24"
                    autocomplete="on" value="{{ old('nombre_revista') }}" tabindex="45" onchange="obtenerInfo(this)"
                    required>
                <datalist id="revistas">
                    @include('listas.revistas')
                </datalist>
                @error('nombre_revista')
                    <p class="error">{{ $message }}</p tabindex="46">
                @enderror

                <label for="numero" class="Revistas" tabindex="47">{{ __('messages.magazine_number') }}:</label>
                <input id="numero" type="number" class="Revistas" name="numero" maxlength="24" autocomplete="on"
                    value="{{ old('numero') }}" tabindex="48" required>
                @error('numero')
                    <p class="error">{{ $message }}</p tabindex="49">
                @enderror

                {{-- <label for="genero_1" class="Revistas" tabindex="50">{{ __('messages.genre') }}:</label>

                @error('tema')
                    {{ $message }}
                @enderror --}}
            @endif

            {{-- para  animes --}}
            @if ($tipo == 'Animes')
                <label for="nombre_anime" class="Anime" tabindex="54">{{ __('messages.anime_name') }}:</label>
                <input id="nombre_anime" list="animes" class="Anime" name="nombre_anime" maxlength="32"
                    autocomplete="on" value="{{ old('nombre_anime') }}" onchange="obtenerInfo(this)" tabindex="55"
                    required>
                <datalist id="animes">
                    @include('listas.animes')
                </datalist>
                @error('nombre_anime')
                    <p class="error">{{ $message }}</p tabindex="56">
                @enderror

                <label for="numero_temporada_anime" class="Anime"
                    tabindex="57">{{ __('messages.temp_number') }}:</label>
                <input id="numero_temporada_anime" type="number" min="1" max="127" class="Anime"
                    name="numero_temporada" maxlength="" autocomplete="on" value="{{ old('numero_temporada') }}"
                    tabindex="58">
                @error('numero_temporada')
                    <p class="error">{{ $message }}</p tabindex="59">
                @enderror

                <label for="numero_episodio_anime" class="Anime"
                    tabindex="60">{{ __('messages.chapter_number') }}:</label>
                <input id="numero_episodio_anime" type="number" min="1" max="32767" class="Anime"
                    name="numero_episodio" maxlength="" autocomplete="on" value="{{ old('numero_tepisodio') }}"
                    tabindex="61">
                @error('numero_episodio')
                    <p class="error">{{ $message }}</p tabindex="62">
                @enderror
            @endif

            {{-- para musica --}}
            @if ($tipo == 'Musica')
                <label for="artista" class="Musica" tabindex="63">{{ __('messages.artista') }}:</label>
                <input id="artista" list="artistas" class="Musica" name="artista" maxlength="24" autocomplete="on"
                    value="{{ old('artista') }}" tabindex="64">
                <datalist id="artistas">
                    @include('listas.artistas')
                </datalist>
                @error('artista')
                    <p class="error">{{ $message }}</p tabindex="65">
                @enderror

                <label for="album" class="Musica" tabindex="66">{{ __('messages.album') }}:</label>
                <input id="album" list="albums" class="Musica" name="album" onchange="obtenerInfo(this)"
                    maxlength="24" autocomplete="on" value="{{ old('album') }}" tabindex="67" required>
                <datalist id="albums">
                    @include('listas.albums')
                </datalist>
                @error('album')
                    <p class="error">{{ $message }}</p tabindex="68">
                @enderror

                <label for="nombre_cancion" class="Musica" tabindex="69">{{ __('messages.song_name') }}:</label>
                <input id="nombre_cancion" type="text" class="Musica" name="nombre_cancion" maxlength="24"
                    autocomplete="on" value="{{ old('nombre_cancion') }}" tabindex="70" required>
                @error('nombre_cancion')
                    <p class="error">{{ $message }}</p tabindex="71">
                @enderror

                <label for="numero_cancion" class="Musica" tabindex="72">{{ __('messages.song_number') }}:</label>
                <input id="numero_cancion" type="text" class="Musica" name="numero_cancion" maxlength="24"
                    autocomplete="on" value="{{ old('numero_cancion') }}" tabindex="73" required>
                @error('numero_cancion')
                    <p class="error">{{ $message }}</p tabindex="74">
                @enderror
            @endif

            {{-- para videos --}}
            @if (in_array($tipo, ['Videos', 'Video']))
                <label for="lista" class="Videos" tabindex="75">{{ __('messages.video_list') }}:</label>
                <input id="lista" list="listas" class="Videos" name="lista" onchange="obtenerInfo(this)"
                    maxlength="32" autocomplete="on" value="{{ old('lista') }}" tabindex="76" required>
                <datalist id="listas">
                    @include('listas.listas')
                </datalist>
                @error('lista')
                    <p class="error">{{ $message }}</p tabindex="77">
                @enderror

                <label for="nombre_video" class="Videos" tabindex="78">{{ __('messages.video_name') }}:</label>
                <input id="nombre_video" type="text" class="Videos" name="nombre_video" maxlength="255"
                    autocomplete="on" value="{{ old('nombre_video') }}" tabindex="79" required>
                @error('nombre_video')
                    <p class="error">{{ $message }}</p tabindex="80">
                @enderror
            @endif

            {{-- para documentales --}}
            @if ($tipo == 'Documentales')
                <label for="nombre_documental" class="Documentales"
                    tabindex="81">{{ __('messages.documentary_name') }}:</label>
                <input id="nombre_documental" type="text" class="Documentales" name="nombre_documental"
                    maxlength="56" autocomplete="on" value="{{ old('nombre_documental') }}" tabindex="82" required>
                @error('nombre_documental')
                    <p class="error">{{ $message }}</p tabindex="83">
                @enderror
            @endif

            {{-- para software --}}
            @if ($tipo == 'Software')
                <label for="nombre_software" class="Software" tabindex="84">{{ __('messages.software_name') }}:</label>
                <input id="nombre_software" type="text" class="Software" name="nombre_software" maxlength="50"
                    autocomplete="on" value="{{ old('nombre_software') }}" tabindex="85" required>
                @error('nombre_software')
                    <p class="error">{{ $message }}</p tabindex="86">
                @enderror
            @endif

            {{-- para otros --}}
            @if ($tipo == 'Otros')
                <label for="nombre_otro" class="Otros" tabindex="87">{{ __('messages.info') }}:</label>
                <input id="nombre_otro" type="text" class="Otros" name="nombre_otro" maxlength="255"
                    autocomplete="on" value="{{ old('nombre_otro') }}" tabindex="88" required>
                @error('nombre_otro')
                    <p class="error">{{ $message }}</p tabindex="89">
                @enderror
            @endif

            {{-- generico --}}
            <label for="privado" class="Peliculas Documentales Videos Series Libros Animes Musica Software"
                tabindex="90">{{ __('messages.private') }}:</label>
            {{-- <input type="hidden" name="privado" value="0" /> --}}
            <input id="privado" type="checkbox"
                class="Peliculas Documentales Videos Series Libros Animes Revistas Musica m-l-16" name="privado"
                value="1" tabindex="91" style="width:auto">
            @error('privado')
                <p class="error">{{ $message }}</p tabindex="92">
            @enderror

            @if (!in_array($tipo, ['Documentales', 'Software', 'Otros']))
                <label for="genero_1" class="Peliculas Documentales Videos Series Libros Animes Musica"
                    tabindex="93">{{ __('messages.genre') }}:</label>
                <input id="genero_1" list="generos_1"
                    class="Peliculas Documentales Videos Series Libros Animes Revistas Musica" name="genero_1"
                    maxlength="24" autocomplete="on" value="{{ old('genero_1') }}" tabindex="94">
                <datalist id="generos_1">
                    @include('generos.lista')
                </datalist>
                @error('genero_1')
                    <p class="error">{{ $message }}</p tabindex="95">
                @enderror

                <label for="genero_2" class="Peliculas Series Libros Animes Musica"
                    tabindex="96">{{ __('messages.genre') }}:</label>
                <input id="genero_2" list="generos_2" class="Peliculas Series Libros Animes Musica" name="genero_2"
                    maxlength="24" autocomplete="on" value="{{ old('genero_2') }}" tabindex="97">
                <datalist id="generos_2">
                    @include('generos.lista')
                </datalist>
                @error('genero_2')
                    <p class="error">{{ $message }}</p tabindex="98">
                @enderror

                <label for="genero_3" class="Peliculas Series Libros Animes"
                    tabindex="99">{{ __('messages.genre') }}:</label>
                <input id="genero_3" list="generos_3" class="Peliculas Series Libros Animes" name="genero_3"
                    maxlength="24" autocomplete="on" value="{{ old('genero_3') }}" tabindex="100">
                <datalist id="generos_3">
                    @include('generos.lista')
                </datalist>
                @error('genero_3')
                    <p class="error">{{ $message }}</p tabindex="101">
                @enderror
            @endif

            <label for="file" class="file" tabindex="102">*{{ __('messages.file') }}:</label>
            <input id="file" type="file" class="file" name="file" value="{{ old('file') }}"
                tabindex="103" required
                accept="@if (in_array($tipo, ['Peliculas', 'Series', 'Animes', 'Videos', 'Documentales'])) video/* @elseif ($tipo == 'Musica') audio/* @elseif ($tipo == 'Libros' || $tipo == 'Revistas') application/pdf,.epub,.zip,.rar @elseif ($tipo == 'Software') .exe,.zip,.rar,.7zip @endif"
                style="border-bottom:0px;">

            @error('file')
                <p class="error">{{ $message }}</p tabindex="104">
            @enderror

            <button class="block m-a" id="button_create" type="submit"
                tabindex="105">{{ __('messages.upload') }}</button>
        </form>
    </div>

@endsection

@section('js')
    <script>
        let tipo = "{{ $tipo }}";
    </script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/info.js') }}"></script>
@endsection
