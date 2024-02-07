@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('contenido')
    <h1>crear usuario</h1>
    <form method="POST" action="{{ route('usuario.registrarse.guardar') }}" autocomplete="on">
        @csrf

        <label for="username_input" tabindex="1">Nombre de usuario:</label>
        <input tabindex="2" type="text" name="username" id="username_input" maxlength="20" value="{{ old('username') }}"
            autocomplete="username">

        @error('username')
            {{ $message }}
        @enderror

        <label for="email_input" tabindex="3">Dirección email:</label>
        <input type="email" name="email" id="email_input" tabindex="4" maxlength="30" value="{{ old('email') }}"
            autocomplete="email">

        @error('email')
            {{ $message }}
        @enderror

        <label for="password_input" tabindex="5">Contraseña:</label>
        <input type="password" name="password" id="password_input" tabindex="6" maxlength="20"
            value="{{ old('password') }}" autocomplete="current-password">

        @error('password')
            {{ $message }}
        @enderror

        <label for="condiciones" tabindex="7">Acepta las condiciones para poder registrarte.</label>
        <input type="checkbox" name="condiciones" id="condiciones" value="True" tabindex="8">

        @error('condiciones')
            {{ $message }}
        @enderror
        {{-- 
            <label for="cod_invitacion_input" tabindex="7">Código de invitación:</label>
        <input type="text" name="cod_invitacion" id="cod_invitacion_input" tabindex="8" maxlength="6" autocomplete="on">
         --}}
        <input type="submit" value="Registrarse" tabindex="9">

    </form>
@endsection
