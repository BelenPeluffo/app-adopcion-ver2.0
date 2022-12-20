<div class="container">
    <div class="row">
        <div class="col-4 border py-3 px-3 my-3 mx-5">
            <form class="form" method="POST" 
                @if(isset($mascota))
                    action="{{route('mascotas.update',$mascota)}}"
                @else
                    action="{{route('mascotas.store')}}"
                @endif>
                
                @if(isset($mascota))
                    @csrf @method('PATCH')
                @else
                    @csrf
                @endif
                
                <!--CAMPO NOMBRE-->
                <div class="form-group">
                    <label class="form-label">Nombre</label> 
                    <input name="nombre" type="text" class="form-control" placeholder="¿Cuál es su nombre?"
                        @if(isset($mascota))
                            value="{{$mascota->nombre}}"
                        @else
                            value="{{old('nombre')}}"
                        @endif>
                        @error('nombre')
                            <small>{{$message}}</small>
                        @enderror
                </div>

                <!--CAMPO RAZA-->
                <div class="form-group">
                    <label class="label">Raza</label><br>
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input name="raza" type="radio" value="gatx" class="form-check-input"
                                @if(isset($mascota))
                                    @checked(old('raza',$mascota->raza)=='gatx')
                                @else
                                    {{old('raza')=="gatx" ? 'checked' :''}}
                                @endif> 
                            <label class="form-check-label">Gatx</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="raza" type="radio" value="perrx" class="form-check-input"
                                @if(isset($mascota))
                                    @checked(old('raza',$mascota->raza)=='perrx')
                                @else
                                    {{old('raza')=="perrx" ? 'checked' :''}}
                                @endif>
                            <label class="form-check-label">Perrx</label>
                        </div>
                        @error('raza')
                            <small>{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <!--CAMPO EDAD-->
                <div class="form-group">
                    <label>Edad</label>
                    <input name="edad" type="number" class="form-control" placeholder="¿Cuántos años tiene?"
                        @if(isset($mascota))
                            value="{{$mascota->edad}}"
                        @else
                            value="{{old('edad')}}"
                        @endif>
                        @error('edad')
                            <small>{{$message}}</small>
                        @enderror
                </div>

                <!--CAMPO SEXO-->
                <div class="form-group">
                    <label class="label">Sexo</label><br>
                    <div class="text-center">
                        <div class="form-check form-check-inline">
                            <input name="sexo" type="radio" value="hembra" class="form-check-input"
                                @if(isset($mascota))
                                    @checked(old('sexo',$mascota->sexo)=='hembra')
                                @endif>
                            <label class="form-check-label">Hembra</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input name="sexo" type="radio" value="macho" class="form-check-input"
                                @if(isset($mascota))
                                    @checked(old('sexo',$mascota->sexo)=='macho')
                                @endif>
                            <label class="form-check-label">Macho</label>
                        </div>
                        @error('sexo')
                            <small>{{$message}}</small>
                        @enderror
                    </div>
                </div>

                <!--CAMPO TAMAÑO-->
                <div class="form-group">
                    <label>Tamaño</label> 
                    <select name="tamanio" id="tamanio" class="form-control">
                        <option 
                            @if(isset($mascota))
                                @selected(old('tamaño',$mascota->tamaño) == 'pequeño')
                            @endif
                            value="pequeño">Pequeño</option>
                        <option 
                            @if(isset($mascota))
                                @selected(old('tamaño',$mascota->tamaño) == 'mediano')
                            @endif 
                            value="mediano">Mediano</option>
                        <option
                            @if(isset($mascota))
                                @selected(old('tamaño',$mascota->tamaño) == 'grande')
                            @endif
                            value="grande">Grande</option>
                    </select>
                    @error('tamanio')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <!--CAMPO PESO-->
                <div class="form-group">
                    <label>Peso</label> 
                    <input name="peso" type="number" class="form-control" aria-describedby="TamanioHelp" placeholder="¿Cuánto pesa, más o menos?"
                        @if(isset($mascota))
                            value="{{$mascota->peso}}"
                        @else
                            value="{{old('peso')}}"
                        @endif>
                    <small id="tamanioHelp" class="form-text text-muted">Si bien lo ideal es poner un peso aproximado, si no lo sabés no es necesario que lo pongas.</small>
                    @error('peso')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <!--CAMPO PELAJE-->
                <div class="form-group">
                    <label>Pelaje</label>
                    <select name="pelaje" class="form-control">
                        <option 
                            @if(isset($mascota))
                                @selected(old('pelaje',$mascota->pelaje) == 'corto')
                            @endif
                            value="corto">Corto</option>
                        <option 
                            @if(isset($mascota))
                                @selected(old('pelaje',$mascota->pelaje) == 'largo')
                            @endif
                            value="largo">Largo</option>
                    </select>
                    @error('pelaje')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <!--CAMPO ENERGÍA-->
                <div class="form-group">
                    <label>Energía</label> 
                    <select name="energia" class="form-control">
                        <option 
                            @if(isset($mascota))
                                @selected(old('energía',$mascota->energía)=='tranquilx')
                            @endif
                            value="tranquilx">Tranquilx</option>
                        <option
                            @if(isset($mascota))
                                @selected(old('energía',$mascota->energía)=='activx')
                            @endif
                            value="activx">Activx</option>
                        <option
                            @if(isset($mascota))
                                @selected(old('energía',$mascota->energía)=='energéticx')
                            @endif
                            value="energeticx">Energéticx</option>
                    </select>
                    @error('energia')
                        <small>{{$message}}</small>
                    @enderror
                </div>

                <!--CAMPO FOTO-->
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control-file">
                </div>
                
                <button type="submit" class="btn btn-primary">
                    @if(isset($mascota))
                        Actualizá su perfil
                    @else
                        Subí su perfil
                    @endif
                </button>
            </form>
        </div>
    </div>
</div>