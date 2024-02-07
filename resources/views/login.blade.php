@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
@endsection

@section('contenido')

    <div class="centrado formulario col-11 col-s-8 col-m-6 col-l-4 col-xl-4">
        <form id="form" action="{{ route('usuario.entrar.autenticar') }}" method="post">
            @csrf
            <div class="login">
                <div class="m-8 h-40">
                    <label id="username_label" class="ancho-xs-100 ancho-s-40 ancho-m-40 ancho-l-40 ancho-xl-40 float-left"
                        for="username" tabindex="14">{{ __('messages.username') }}:</label>
                    <input class="ancho-xs-100 ancho-s-60 ancho-m-60 ancho-l-60 ancho-xl-60 float-left" type="text"
                        name="username" id="username" maxlength="20" value="miguel" autocomplete="username" tabindex="15"
                        onfocus="limpiarValor(this)">
                    {{-- {{ old('username') }} --}}
                </div>

                @error('username')
                    <div class="m-8 h-40 c-red p-8">
                        {{ $message }}
                    </div>
                @enderror
                {{-- <br> --}}
                <div class="m-8 h-40">
                    <label class="ancho-xs-100 ancho-s-40 ancho-m-40 ancho-l-40 ancho-xl-40 float-left" for="password"
                        tabindex="16">{{ __('messages.password') }}:</label>
                    <input class="ancho-xs-90 ancho-s-50 ancho-m-50 ancho-l-50 ancho-xl-50 float-left" type="password"
                        name="password" id="password" maxlength="20" value="miguel" tabindex="17"
                        onfocus="limpiarValor(this)">
                    <span class="ancho-10 float-left" id="show_password"
                        onclick="togglePassword(this,'{{ url('storage/icons/show.png') }}','{{ url('storage/icons/hide.png') }}')"><img
                            class="icono" src="{{ url('storage/icons/show.png') }}"
                            alt="{{ __('messages.show_password') }}" tabindex="18" />
                    </span>
                </div>

                @error('password')
                    <div class="m-8 h-40 c-red p-8">
                        {{ $message }}
                    </div>
                @enderror

                @error('fail_login')
                    <div class="m-8 h-40 c-red p-8">
                        {{ __('messages.fail_login') }}
                    </div>
                @enderror
            </div>
            <div class="oculto">
                <div class="m-8 h-40">
                    <label class="ancho-xs-100 ancho-s-50 ancho-m-50 ancho-l-50 ancho-xl-50 float-left" for="email"
                        tabindex="19">{{ __('messages.email') }}:</label>
                    <input class="ancho-xs-100 ancho-s-50 ancho-m-50 ancho-l-50 ancho-xl-50 float-left" type="email"
                        name="email" id="email" autocomplete="email" tabindex="20">
                </div>

                @error('email')
                    <div class="m-8 h-40 c-red p-8">
                        {{ $message }}
                    </div>
                @enderror

                <div class="m-8 h-40">
                    <label class="ancho-xs-100 ancho-s-50 ancho-m-50 ancho-l-50 ancho-xl-50 float-left" for="codigo"
                        tabindex="21">{{ __('messages.invite_code') }}:</label>
                    <input class="ancho-xs-100 ancho-s-50 ancho-m-50 ancho-l-50 ancho-xl-50 float-left" type="text"
                        name="codigo" id="codigo" tabindex="22">
                </div>

                @error('codigo')
                    <div class="m-8 h-40 c-red p-8">
                        {{ $message }}
                    </div>
                @enderror

                <div class="m-8 h-40">
                    <label class="ancho-xs-100 ancho-s-80 ancho-m-80 ancho-l-80 ancho-xl-80 float-left" for="condiciones"
                        tabindex="23">{!! __('messages.accept_conditions', [
                            'conditions' =>
                                '<a href="' .
                                route('usuario.condiciones.mostrar') .
                                '" target="_blank" tabindex="24">' .
                                __('messages.condition') .
                                '</a>',
                        ]) !!}</label>
                    <input class="ancho-xs-100 ancho-s-10 ancho-m-10 ancho-l-10 ancho-xl-10 float-left" type="checkbox"
                        name="condiciones" id="condiciones" value="True" tabindex="25">
                </div>
                <br>

                @error('condiciones')
                    <div class="m-8 h-40 c-red p-8">
                        {{ $message }}
                    </div>
                @enderror

            </div>
            <div class="botones text-center">
                <button id="button_login" type="submit" tabindex="26">{{ __('messages.login') }}</button>
                <button id="button_registro" type="button" class="oculto"
                    tabindex="28">{{ __('messages.register') }}</button>
                <button id="button_mostrar_registro" type="button" tabindex="27">{{ __('messages.register') }}</button>
            </div>
        </form>

        <script>
            let atras = "{{ __('messages.back') }}";
            let entrar = "{{ __('messages.login') }}";
            // console.log(atras);
        </script>
    </div>
    {{-- <button onclick="window.location.href='{{ route('usuario.registrarse.mostrar') }}'">Registrarse</button>
    <button onclick="window.location.href='{{ route('usuario.entrar.mostrar') }}'">Entrar</button> --}}

@endsection

@section('js')
    <script src="{{ asset('js/registro.js') }}"></script>
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.site_key') }}"></script>


    @if ($errors->any())
        @if (!$errors->first('fail_login'))
            <script>
                document.getElementById("button_mostrar_registro").click();
            </script>
        @else
            {{-- <div class="">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul> 
        </div> --}}
        @endif
    @endif
@endsection
