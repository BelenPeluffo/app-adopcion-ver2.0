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
<div class="container">
    <div class="row">
        <div class="col">
            @empty($dueñx && $postulante)
                <h3>No tenés solicitudes pendientes.</h3>
            @endempty
        </div>
    </div>

    <!--¿Quién soy yo? usuario[0]}} y mi id es usuario[1]}}<br>-->
    <div class="row">
        @if(isset($dueñx))
            <div class="col">
                <h3>Es dueñx.</h3>
                @forelse ($dueñx as $enAdopcion)
                    <div class="row px-3 mb-2 border">
                        <div class="col-2">
                            <!--{$enAdopcion}}-->
                            {{$enAdopcion->nombre}}
                        </div>
                        <div class="col">
                            Sexo: {{$enAdopcion->sexo}}<br>
                            Edad: {{$enAdopcion->edad}}<br>
                        </div>
                        <div class="col">
                            Acá irían los postulantes.
                        </div>
                    </div>
                @empty
                    <div class="row">
                        <div class="col">
                            No tenés ninguna mascota solicitada por el momento.
                        </div>
                    </div>
                @endforelse
            </div>
        @endif
    </div>

    <div class="row">
        @if(isset($postulante))
            <div class="col">
                <h3>Es postulante.</h3>
                @forelse ($postulante as $solicitud)
                    <div class="row">
                        <div class="col">
                            {{$solicitud}}
                        </div>
                    </div>
                @empty
                    <div class="row">
                        <div class="col">
                            No has solicitado nunguna mascota hasta el momento.
                        </div>
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
@endsection