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
        ->select('reservacion.id', 'reservacion.nombre_persona as title', 'reservacion.fecha as date', 'reservacion.es_confirmada', 'reservacion.correo', 'paquete.color as color')
        ->get();

        return $reservaciones;
    }

    public function get_reservaciones_cliente() {
        $reservaciones = DB::table('reservacion')
        ->join('paquete', 'reservacion.id_paquete', '=', 'paquete.id')
        ->select('reservacion.id', 'reservacion.es_confirmada', 'reservacion.nombre_persona as title', 'reservacion.fecha as date', 'reservacion.correo', 'paquete.color as color', 'paquete.horario')
        ->get();

        foreach($reservaciones as $r){
            $r->title = "Res ".$r->horario;
        }

        return $reservaciones;
    }

    public function get_paquetes() {
        $paquetes = Paquete::All();
        return response()->json([
            'ok' => true,
            'data' => $paquetes
        ]);
    }

    public function get_paquete(Request $request) {
        $paquete = Paquete::where('id', $request->input("id_paquete"))->get();
        return response()->json([
            'ok' => true,
            'data' => $paquete
        ]);    
    }

    public function get_paquete_dia(Request $request) {
        $fecha = $request->input("fecha");
        $tipo = $request->input("tipo");

        $reservaciones = DB::table('reservacion')
        ->join('paquete', 'reservacion.id_paquete', '=', 'paquete.id')
        ->select('reservacion.id', 'reservacion.nombre_persona as title', 'reservacion.fecha as date', 'reservacion.id_paquete', 'paquete.color as color', 'paquete.horario', 'paquete.descripcion')
        ->where('reservacion.fecha', $fecha)
        ->get();

        if (count($reservaciones)< 2){ 
            $date = date('l', strtotime($fecha));
            switch ($date) {
                case 'Monday':
                    $dia = 'Lunes';
                    break;
                case 'Tuesday':
                    $dia = 'Martes';
                    break;
                case 'Wednesday':
                    $dia = 'Miercoles';
                    break;
                case 'Thursday':
                    $dia = 'Jueves';
                    break;
                case 'Friday':
                    $dia = 'Viernes';
                    break;
                case 'Saturday':
                    $dia = 'Sabado';
                    break;
                case 'Sunday':
                    $dia = 'Domingo';
                    break;
                default:
                    # code...
                    break;
            }
            
            if(count($reservaciones) == 0){
                $paquetes = Paquete::where('descripcion', 'like', '%'.$dia.'%')->get();
                return response()->json([
                    'ok' => true,
                    'data' => $paquetes
                ]);
            }else{
                if($tipo == 'Edicion'){
                    $paquetes = Paquete::where('descripcion', 'like', '%'.$dia.'%')->get();
                }else if($tipo == 'Nuevo'){
                    $paquetes = Paquete::where('descripcion', 'like', '%'.$dia.'%')->where('id', '!=', $reservaciones[0]->id_paquete)->get();
                }
                
            }

            return response()->json([
                'ok' => true,
                'data' => $paquetes
            ]);
        }else{
            return response()->json([
                'ok' => false,
                'data' => 'Está fecha no tiene cupos disponibles'
            ]);
        }
    }

    public function get_reservacion(Request $request) {
        $reservacion = Reservacion::find($request->input("id"));

        $reservacion = DB::table('reservacion')
        ->join('paquete', 'reservacion.id_paquete', '=', 'paquete.id')
        ->select('reservacion.id', 'reservacion.es_confirmada', 'reservacion.nombre_persona as nombre_persona', 'reservacion.fecha as date', 'reservacion.correo', 'reservacion.id_paquete', 'paquete.color as color', 'paquete.horario', 'paquete.descripcion')
        ->where('reservacion.id', $request->input("id"))
        ->first();

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

    public function redireccion($fecha, $paquete, $horario){
		return \View::make('reservacion')
        ->with(compact('fecha'))
        ->with(compact('paquete'))
        ->with(compact('horario'));
	}

}