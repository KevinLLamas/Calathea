<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Mensaje;

class MensajeController extends Controller
{
    public function get_mensajes() {
        $mensajes = Mensaje::with('usuario')->get();
        return response()->json([
            'ok' => true,
            'data' => $mensajes
        ]);
    }

    public function save_mensaje(Request $request) {
        $mensaje = new Mensaje;
        $mensaje->contenido = $request->input('contenido');
        $mensaje->id_usuario = Session::get('id');
        $mensaje->save();

        return response()->json([
            'ok' => true,
            'data' => $mensaje->id
        ]);
    }
}