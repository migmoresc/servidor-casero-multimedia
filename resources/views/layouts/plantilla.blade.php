<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <!-- favicon -->
    <!-- estilos -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/w3.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    @yield('css1')

    @if (!session()->has('dia'))
        <link rel="stylesheet" href="{{ asset('css/dia.css') }}">
    @else
        @if (session('dia') == 1)
            <link rel="stylesheet" href="{{ asset('css/dia.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('css/noche.css') }}">
        @endif
    @endif

</head>

<body>

    <div class="col-12 text-center text-left-s">
        @auth
            <a href="{{ route('usuario.home.principal') }}" tabindex="10">{{ __('messages.home') }}</a>
        @else
            <a href="{{ route('login') }}" tabindex="11">{{ __('messages.home') }}</a>
        @endauth

        @auth
            <p style="display:none;" id="path" data-path="{{ url('/') }}"></p>

            <div class="pos-abs pos-right pad-15 pos-rel-s text-right-s">
                @if (Auth::user()->config->idioma == 'es')
                    <a href="{{ route('config.guardar') }}?idioma=en" tabindex="12">English</a>
                @else
                    <a href="{{ route('config.guardar') }}?idioma=es" tabindex="12">Español</a>
                @endif

                @if (Auth::user()->config->dia_noche == 1)
                    <a href="{{ route('config.guardar') }}?dia=0" tabindex="13">{{ __('messages.night') }}</a>
                @else
                    <a href="{{ route('config.guardar') }}?dia=1" tabindex="13">{{ __('messages.day') }}</a>
                @endif
            </div>

            <h1 class="text-right m-t-8">{{ Auth::user()->username }}</h1>
            <div class="text-right m-t-8">
                <a href="{{ route('usuario.salir.salir') }}" tabindex="14">{{ __('messages.logout') }}</a>
            </div>
        @else
            {{-- {{ app()->getLocale() }} --}}
            <div class="pos-abs pos-right pad-15 pos-rel-s text-right-s">
                @if (App::getLocale() == 'es')
                    <a href="{{ route('config.guardar') }}?idioma=en" tabindex="12">English</a>
                @else
                    <a href="{{ route('config.guardar') }}?idioma=es" tabindex="12">Español</a>
                @endif

                @if (!session()->has('dia'))
                    <a href="{{ route('config.guardar') }}?dia=0" tabindex="13">{{ __('messages.night') }}</a>
                @else
                    @if (session('dia') == 1)
                        <a href="{{ route('config.guardar') }}?dia=0" tabindex="13">{{ __('messages.night') }}</a>
                    @else
                        <a href="{{ route('config.guardar') }}?dia=1" tabindex="13">{{ __('messages.day') }}</a>
                    @endif
                @endif
            </div>
        @endauth
    </div>
    @yield('contenido')

    <!-- js -->
    @yield('js')
</body>

</html>
