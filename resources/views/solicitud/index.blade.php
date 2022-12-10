@extends('layouts.html_base')

@section('titulo')
Bandeja de Solicitudes
@endsection

@section('header')
<div class="container text-center">
    <div class="row">
        <div class="col">
            <h1>Bandeja de Solicitudes</h1>
        </div>
    </div>
    <div class="row mt-2 mb-5">
        <div class="col">
            <h4>Acá vas a poder ver el estado de las solicitudes de adopción</h4>
        </div>
    </div>
</div>
@endsection

@section('contenido')
    @empty($dueñx && $postulante)
        No tenés solicitudes pendientes.<br><br>
    @endempty

    ¿Quién soy yo? {{$usuario[0]}} y mi id es {{$usuario[1]}}<br>

    @if(isset($dueñx))
        Es dueñx.<br>
        @forelse ($dueñx as $enAdopcion)
            {{$enAdopcion}}<br>
        @empty
            Ninguna de tus mascotas está solicitada por el momento.<br>
        @endforelse
    @endif

    @if(isset($postulante))
        Es postulante.<br>
        @forelse ($postulante as $solicitud)
            {{$solicitud}}<br>
        @empty
            No has solicitado nunguna mascota hasta el momento.
        @endforelse
    @endif
@endsection