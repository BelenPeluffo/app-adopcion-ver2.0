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

    <!--FILTRO-->
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col text-center">
                <p>-> acá debería estar el filtro de búsqueda <-</p>
            </div>
        </div>
    </div>

    <!--MASCOTAS DISPONIBLES-->
    <div class="container">
        <div class="row">
            @foreach ($mascotas as $mascota)
            <div class="col text-center">
                <h4>{{ $mascota->nombre }}</h4>
                <!--TOGGLE-->
                <p>
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#{{$mascota->nombre}}">+</button>
                </p>
                <div class="collapse my-2" id="{{$mascota->nombre}}">
                    <table class="table">
                        @if(isset($user))
                            <!--user->categoria }}<br>-->
                        @endif
                        <tbody>
                            <tr>
                                <th>Edad</th>
                                <td>{{$mascota->edad}}</td>
                            </tr>
                            <tr>
                                <th>Sexo</th>
                                <td>{{$mascota->sexo}}</td>
                            </tr>
                            <tr>
                                <th>Tamaño</th>
                                <td>{{$mascota->tamaño}}</td>
                            </tr>
                            <tr>
                                <th>Peso</th>
                                <td>{{$mascota->peso}}</td>
                            </tr>
                            <tr>
                                <th>Pelaje</th>
                                <td>{{$mascota->pelo}}</td>
                            </tr>
                            <tr>
                                <th>Energía</th>
                                <td>{{$mascota->energía}}</td>
                            </tr>
                        </tbody>
                    </table>
                    @auth
                        @if($mascota->dueñx==$user->id)
                            <a href="{{route('mascotas.edit',$mascota)}}" type="button" class="btn btn-secondary">Editar</a>
                        @elseif ($user->categoria=='transitorio' or $user->categoria=='permanente')
                            <form method="POST" action="{{route('solicitudes.store',$mascota)}}">
                                @csrf
                                <input name="mascota" type="number" value="{{$mascota->id}}" hidden>
                                <input name="dueñx" type="number" value="{{$mascota->dueñx}}" hidden>
                                <button type="submit" class="btn btn-secondary">Adoptar</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
            @endforeach
        </div>
    </div>
    

@endsection