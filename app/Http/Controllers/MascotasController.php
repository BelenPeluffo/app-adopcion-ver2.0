<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MascotasController extends Controller
{
    /*
    Aplicación del MIDDLEWARE a ciertos métodos
     */
    public function __construct()
    {
        $this->middleware('auth',['only' => ['create','edit']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$mascotasDB = DB::table('mascota')->get();
        $mascotasDB=Mascota::get();
        $user=Auth::user();
        return view('mascota.index',[
            'mascotas'=>$mascotasDB,
            'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //HAY QUE PASAR A MÉTODO CON MODELOS
        return view('mascota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //genero el nuevo registro y redirijo a .index:
        //echo($request);       //DEBUG
        $nuevaMascota= new Mascota;
        $nuevaMascota->nombre = $request->input('nombre');
        $nuevaMascota->edad = $request->input('edad');
        $nuevaMascota->sexo = $request->input('sexo');
        $nuevaMascota->tamaño = $request->input('tamanio');
        $nuevaMascota->peso = $request->input('peso');
        $nuevaMascota->pelaje = $request->input('pelaje');
        $nuevaMascota->energía = $request->input('energia');
        $nuevaMascota->dueñx = auth()->user()->id;
        //En un PRIMER MOMENTO, EL ESTADO INICIAL ES "DISPONIBLE":
        $nuevaMascota->estado = "disponible";

        $nuevaMascota->save();
        
        //return redirect();
        /*
        $mascotasDB=Mascota::get();
        return view('mascota.index',['mascotas'=>$mascotasDB]);
        */
        return redirect()->route('mascotas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //Con JAVASCRIPT yo debería poder mostrar la info en un toggle
        $mascota=Mascota::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
        $mascota=Mascota::find($id);
        return view('mascota.edit',['mascota' => $mascota]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //QUÉ HAGO CON LOS DATOS NUEVOS?
        $Mascota= Mascota::find($id);
        $Mascota->nombre = $request->input('nombre');
        $Mascota->edad = $request->input('edad');
        $Mascota->sexo = $request->input('sexo');
        $Mascota->tamaño = $request->input('tamanio');
        $Mascota->peso = $request->input('peso');
        $Mascota->pelaje = $request->input('pelaje');
        $Mascota->energía = $request->input('energia');
        //Ésto es prematuro, deberá deducirse de quién esté loggeadx:
        $Mascota->dueñx = 36734473;
        //En un PRIMER MOMENTO, EL ESTADO INICIAL ES "DISPONIBLE":
        $Mascota->estado = "disponible";

        $Mascota->save();
        
        //return redirect();
        /*
        $mascotasDB=Mascota::get();
        return view('mascota.index',['mascotas'=>$mascotasDB]);
        */
        return redirect()->route('mascotas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //PARA ELIMINAR EL REGISTRO
        $mascota=Mascota::destroy($id);
    }
}
