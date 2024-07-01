@extends('layouts.plantilla')

@section('titulo')
    Principal
@endsection

@section('contenido')
{{-- <x-listar-post>
    <x-slot:titulo>
        header
    </x-slot:titulo>
    Hola
</x-listar-post> --}}

    <x-listar-posts :posts="$posts" />
@endsection