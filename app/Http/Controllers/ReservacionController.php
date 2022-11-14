<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Reservacion;
use App\Models\Paquete;

class ReservacionController extends Controller
{
    public function get_reservaciones() {
        $reservaciones = DB::table('reservacion')
        ->join('paquete', 'reservacion.id_paquete', '=', 'paquete.id')
        ->select('reservacion.id', 'reservacion.nombre_persona as title', 'reservacion.fecha as date', 'paquete.color as color')
        ->get();

        return $reservaciones;
    }

    public function get_paquetes() {
        $paquetes = Paquete::All();
        return response()->json([
            'ok' => true,
            'data' => $paquetes
        ]);
    }

    public function get_reservacion(Request $request) {
        $reservacion = Reservacion::find($request->input("id"));
        return response()->json([
            'ok' => true,
            'data' => $reservacion
        ]);
    }

    public function add_reservacion(Request $request) {
        $reservacion = new Reservacion;
        $reservacion->nombre_persona = $request->input("nombre_persona");
        $reservacion->fecha = $request->input("fecha");
        $reservacion->id_paquete = $request->input("id_paquete");
        $reservacion->correo = $request->input("correo");
        $reservacion->save();

        return response()->json([
            'ok' => true,
            'data' => $reservacion
        ]);
    }

    public function mover_reservacion(Request $request){
        $reservacion = Reservacion::find($request->input("id"));
        $reservacion->fecha = $request->input("fecha");
        $reservacion->save();
        return response()->json([
            'ok' => true,
            'data' => $reservacion
        ]);
    }

    public function editar_reservacion(Request $request){
        $id = $request->input("id");
        $reservacion = Reservacion::find($request->input("id"));
        $reservacion->nombre_persona = $request->input("nombre_persona");
        $reservacion->fecha = $request->input("fecha");
        $reservacion->id_paquete = $request->input("id_paquete");
        $reservacion->correo = $request->input("correo");
        $reservacion->es_confirmada = $request->input("es_confirmada");
        $reservacion->save();
        return response()->json([
            'ok' => true,
            'data' => $reservacion
        ]);
    }

    public function eliminar_reservacion(Request $request){
        $reservacion = Reservacion::find($request->input("id"));
        $reservacion->delete();
        return response()->json([
            'ok' => true
        ]);
    }

    public function redireccion($fecha, $nombre, $correo, $paquete, $horario){
		return \View::make('reservacion')
        ->with(compact('fecha'))
        ->with(compact('nombre'))
        ->with(compact('correo'))
        ->with(compact('paquete'))
        ->with(compact('horario'));
	}

}