<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Solicitud;
use App\Models\User;
use Illuminate\Http\Request;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //POR EL MOMENTO, TENEMOS ÉSTO:

        $usuarix=auth()->user()->id;
        
        $solicitudesDueñx = Solicitud::select('users.nombre','solicitudes.idPostulante','mascotas.*','solicitudes.id')
                            ->join('users', function ($join) {
                                $join->on('users.id','=','solicitudes.idDueñx')
                                    ->where('users.id','=',auth()->user()->id);
                            })
                            ->join('mascotas', function($join) {
                                $join->on('mascotas.id','=','solicitudes.idMascota');
                            })
                            ->get();
        
        $usersPostulantes = [];
        
        foreach ($solicitudesDueñx as $solicitud) {
            array_push($usersPostulantes, User::find($solicitud->idPostulante));
        }
        
        $solicitudesPostulante= Solicitud::select('users.nombre','solicitudes.idDueñx','mascotas.*','solicitudes.id')
                            ->join('users',function ($join) {
                                $join->on('users.id','=','solicitudes.idPostulante')
                                    ->where('users.id','=',auth()->user()->id);
                            })
                            ->join('mascotas', function($join) {
                                $join->on('mascotas.id','=','solicitudes.idMascota');
                            })
                            ->get();
        
        $usersDueñxs = [];

        foreach ($solicitudesPostulante as $solicitud) {
            array_push($usersDueñxs, User::find($solicitud->idDueñx));
        }

        return view('solicitud.index',[
            'dueñx' => $solicitudesDueñx,
            'postulante' => $solicitudesPostulante,
            'postulantes' => $usersPostulantes,
            'dueñxs' => $usersDueñxs
            //'usuario' => [auth()->user()->email,$usuarix]       //debug
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $nuevaSolicitud=new Solicitud;
        $nuevaSolicitud->idMascota=$request->input('mascota');
        $nuevaSolicitud->idPostulante=auth()->user()->id;
        $nuevaSolicitud->idDueñx=$request->input('dueñx');

        $nuevaSolicitud->save();

        return redirect(route('solicitudes.index'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //echo('estamos bien');       //DEBUG

        $solicitudAEliminar = Solicitud::find($id);
        $solicitudAEliminar->delete();

        return redirect(route('mascotas.index'));
    }
}
