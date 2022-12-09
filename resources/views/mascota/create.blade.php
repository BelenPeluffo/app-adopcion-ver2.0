@extends('layouts.html_base')

@section('titulo')
    Subí el Perfil de Adopción
@endsection

@section('header')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col text-center mx-5">
            <h1>Contanos un poco sobre la mascota que darás en adopción!</h1>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection

@section('contenido')
    @include('mascota.partials.formulario-mascotas')
@endsection