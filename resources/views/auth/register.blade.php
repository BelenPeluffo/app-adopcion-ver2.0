@extends('layouts.html_base')

@section('head')
    @parent
    @once
        <!--CARGAR EL RECURSO JS CON VITE:...-->
        @vite(['resources/js/app.js','resources/css/app.css'])
        <!--ÉSTO ESCONDE LOS CAMPOS CONDICIONALES:-->
        <script>
            //QUIZÁS CON LOS BOTONES DEL HEADER YA NO SEA NECESARIO ESTE SCRIPT...
            $(document).ready(function(){
                $('.particular').hide();
            })
        </script>
    @endonce
@endsection

@section('titulo')
    Registro de Usuarix
@endsection

@section('header')
<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col text-center mx-5">
            <h1>Registrate para<br>
                <div class="d-inline" id="darEnAdopcion">dar en adopción</div>
                o <div class="d-inline" id="adoptar">adoptar</div></h1>
        </div>
        <div class="col-3"></div>
    </div>
</div>
@endsection

@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-8 border py-3 px-3 my-3 mx-5">

                <!--EL NUEVO CON BREEZE:-->
                <form class="form" method="POST" action="{{route('register')}}">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="form-label">Nombre</label> 
                                <input name="nombre" type="text" class="form-control" placeholder="¿Cuál es tu nombre?" required autofocus><br>
                            </div>
                            <!--PARA DAR EN ADOPCIÓN-->
                            <div class="form-group adopcion">
                                <label>Categoría</label>
                                <select name="categoria" id="categoria" class="form-control">
                                    <option value="opcion" selected>Elegí una opción</option>
                                    <option value="particular">Particular</option>
                                    <option value="refugio">Refugio</option>
                                </select>
                            </div>
                            <!--PARA ADOPTAR / "PARTICULAR"-->

                            <div class="form-group particular">
                                <label class="etiqueta">¿Buscás adoptar de forma transitoria o permanente?</label>
                                <select name="categoria" id="particular" class="form-control">
                                    <option value="transitorio">Transitoria</option>
                                    <option value="permanente">Permanente</option>
                                </select>
                            </div>
                            <div class="form-group particular">
                                <label class="etiqueta">¿Cuáles son las condiciones de tu vivienda?</label>
                                <select name="tipoDeVivienda" id="vivienda" class="form-control">
                                    <option value="con patio">Con patio</option>
                                    <option value="sin patio">Sin patio</option>
                                </select>
                            </div>
                            <!--/"PARTICULAR"-->
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label>Número de contacto</label>
                                <input name="numeroDeTelefono" type="text" id="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email de contacto</label>
                                <input name="email" type="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!--CONTRASEÑA:-->
                        <div class="col form-group">
                            <label>Contraseña</label><br>
                            <input name="password" type="password"class="form-control" required>
                        </div>
                        <!--CONFIRMACIÓN DE CONTRASEÑA:-->
                        <div class="col form-group">
                            <label>Confirmá tu contraseña</label>
                            <input name="password_confirmation" type="password" class="form-control" required>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <button type="submit" class="btn btn-primary">Subí tu perfil</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection