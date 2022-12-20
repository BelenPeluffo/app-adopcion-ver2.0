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
    <div class="container my-4">
        <div class="row text-left">
            <div class="col">
                <b>Especificá tu búsqueda:</b>
            </div>
        </div>
        <div class="row text-center border rounded py-3">
            <div class="col">
                <!--para cuando pueda hacer el SWITCH
                <div class="custom-control custom-switch">
                    <label class="custom-control-label">Gatx</label>
                    <input type="checkbox" class="custom-control-input" id="gatx-perrx">
                    <label class="custom-control-label">Perrx</label>
                </div>
            -->
                <label>Raza</label>
                <select name="raza" class="form-control">
                    <option>-</option>
                    <option value="gatx">Gatx</option>
                    <option value="perrx">Perrx</option>
                </select>
            </div>
            <div class="col">
                <label>Edad:</label>
                <input type="number">
            </div>
            <div class="col">
                <label>Sexo</label>
                <select name="sexo" class="form-control">
                    <option>-</option>
                    <option value="macho">Macho</option>
                    <option value="hembra">Hembra</option>
                </select>
            </div>
            <div class="col">
                <label>Tamaño</label>
                <select name="tamanio" class="form-control">
                    <option>-</option>
                    <option value="pequeño">Pequeño</option>
                    <option value="mediano">Mediano</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
            <div class="col">
                <label>Pelaje</label>
                <select name="pelaje" class="form-control">
                    <option>-</option>
                    <option value="corto">Corto</option>
                    <option value="largo">Largo</option>
                </select>
            </div>
            <div class="col">
                <label>Energía</label>
                <select name="energia" class="form-control">
                    <option>-</option>
                    <option value="tranquilx">Tranquilx</option>
                    <option value="activx">Activx</option>
                    <option value="energeticx">Energéticx</option>
                </select>
            </div>
            <div class="col d-flex align-items-center justify-content-center">
                <button class="btn">Filtrar</button>
            </div>
        </div>
    </div>

    <!--MASCOTAS DISPONIBLES-->
    <div class="container my-5">
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