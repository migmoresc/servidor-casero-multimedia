@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('contenido')

    @include('form_report')

    <ul class="flex-container home">
        <li class="flex-item home"><a href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.film')]) }}"
                tabindex="16">{{ __('messages.film') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.series')]) }}"tabindex="17">{{ __('messages.series') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.book')]) }}"tabindex="18">{{ __('messages.book') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.magazine')]) }}"tabindex="19">{{ __('messages.magazine') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.anime')]) }}"tabindex="20">{{ __('messages.anime') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.music')]) }}"tabindex="21">{{ __('messages.music') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.video')]) }}"tabindex="22">{{ __('messages.video') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.documentary')]) }}"tabindex="23">{{ __('messages.documentary') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.software')]) }}"tabindex="24">{{ __('messages.program') }}</a>
        </li>
        <li class="flex-item home"><a
                href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => __('messages.other')]) }}"tabindex="25">{{ __('messages.other') }}</a>
        </li>
        @if (Auth::user()->tipo == 0)
            <li class="flex-item home"><a href="{{ route('archivo.home.mostrar_por_tipo', ['tipo' => 'Eliminados']) }}"
                    tabindex="26">Eliminados</a>
            </li>
        @endif
    </ul>

@endsection

@section('js')
    {{-- <script>
        let tipo = "{{ $tipo }}";
        console.log(tipo);
    </script> --}}
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
