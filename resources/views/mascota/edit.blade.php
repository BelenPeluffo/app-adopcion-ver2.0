@extends('layouts.html_base')

@section('titulo')
    Editá el Perfil de tu Mascota
@endsection

@section('header')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col text-center mx-5">
            <h1>Editá los datos de tu mascota</h1>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection

@section('contenido')
    @include('mascota.partials.formulario-mascotas')
@endsection
