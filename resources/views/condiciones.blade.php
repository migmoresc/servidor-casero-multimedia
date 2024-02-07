@extends('layouts.plantilla')

@section('titulo', 'Centro multimedia')

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('css/registro.css') }}"> --}}
@endsection

@section('contenido')

    <p>{{ $texto }}</p>
    <button onclick="window.close()">{{ __('messages.close') }}</button>

@endsection
