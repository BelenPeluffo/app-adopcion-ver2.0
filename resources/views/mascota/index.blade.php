@extends('layouts.html_base')

@section('titulo')
Mascotas en Adopción
@endsection

@section('header')
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h1>Estas mascotas están esperando por un hogar</h1>
        </div>
    </div>
    <div class="row my-5">
        <div class="col">
            <h4>¿Tenés una mascota que quisieras dar en adopción?</h4>
            <a href="{{route('mascotas.create')}}" class="btn btn-outline-dark">Subí su perfil</a>
        </div>
    </div>
</div>
@endsection

@section('contenido')

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col text-center">
                <p>-> acá debería estar el filtro de búsqueda <-</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($mascotas as $mascota)
            <div class="col text-center">
                <h4>{{ $mascota->nombre }}</h4>
                <!--TOGGLE-->
                <p>
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#{{$mascota->nombre}}">+</button>
                </p>
                <div class="collapse" id="{{$mascota->nombre}}">
                    <div class="table">
                        {{ $mascota->edad}}<br>
                        {{ $mascota->energía}}<br>
                        @auth
                        <a href="{{route('mascotas.edit',$mascota)}}" type="button" class="btn btn-secondary">Editar</a>
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    

@endsection