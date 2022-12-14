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

    <!--SECCIÓN USER COMO DUEÑX DE MASCOTA-->
    <div class="row">
        @if(isset($dueñx))
            <div class="col">
                <h3>Tus mascotas</h3>
                @forelse ($dueñx as $enAdopcion)
                    <div class="row px-3 mb-2 border">
                        <div class="col-2">
                            {{$enAdopcion->nombre}}
                        </div>
                        <div class="col">
                            Sexo: {{$enAdopcion->sexo}}<br>
                            Edad: {{$enAdopcion->edad}}<br>
                        </div>
                        <div class="col text-center">
                            <h5>User solicitante</h5>
                            @foreach ($postulantes as $userPostulante)
                                @if ($userPostulante->id == $enAdopcion->idPostulante)
                                    {{$userPostulante->nombre}}<br>
                                    {{$userPostulante->numeroDeTelefono}}<br>
                                    {{$userPostulante->email}}
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-1 d-flex align-items-center">
                            <form method="POST" action="{{route('solicitudes.destroy',$enAdopcion->id)}}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn">Aceptar</button>
                            </form>
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

    <!--SECCIÓN USER COMO POSTULANTE DE ADOPCIÓN-->
    <div class="row">
        @if(isset($postulante))
            <div class="col">
                <h3>Tus pedidos de adopción</h3>
                @forelse ($postulante as $solicitud)
                    <div class="row px-3 mb-2 border">
                        <div class="col-2">
                            {{$solicitud->nombre}}
                        </div>
                        <div class="col">
                            Sexo: {{$solicitud->sexo}}<br>
                            Edad: {{$solicitud->edad}}<br>
                        </div>
                        <div class="col text-center">
                            <h5>User dueñx</h5>
                            @foreach ($dueñxs as $userDueñx)
                                @if ($userDueñx->id == $solicitud->idDueñx)
                                    {{$userDueñx->nombre}}
                                    @break
                                @endif
                            @endforeach
                        </div>
                        <div class="col-1 d-flex align-items-center">
                            <form method="post" action="{{route('solicitudes.destroy',$solicitud->id)}}">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn">Cancelar</button>
                            </form>
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