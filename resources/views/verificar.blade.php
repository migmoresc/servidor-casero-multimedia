@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/registro.css') }}">
@endsection

@section('contenido')

    <div class="centrado">
        <h1>{{ __('messages.activate_instructions') }}</h1>
    </div>

@endsection
