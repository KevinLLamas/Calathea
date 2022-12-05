<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Session;
use App\Models\Usuario;
use App\Models\Notificacion;
class UserController extends Controller
{
    public function login(Request $request) {
        $correo = $request->input('correo');
        $contrasena = hash('SHA256', $request->input("contrasenia"));
        $usuario = Usuario::where('correo', $correo)->first();
        if(empty($contrasena))
        {
            return response()->json([
                'ok'=> false, 
                'message'=>'Ingrese una contraseña.'
            ]);
        }
        if($usuario != null){
            if($usuario->password == $contrasena){
                Session::flush();
                Session::put([
                    'id'=>$usuario->id,
                    'nombre'=> $usuario->nombre,
                    'correo'=> $usuario->correo,
                ]);
                Session::save();
                
                return response()->json([
                    'ok'=> true,
                    'usuario' => $usuario, 
                    'message'=>'Ingreso Correctamente.'
                ]);
            }
            else{
                return response()->json([
                    'ok'=> false, 
                    'message'=>'Contraseña Incorrecta.'
                ]);
            }
        }
        else{
            return response()->json([
                'ok'=> false, 
                'message'=>'Correo Invalido.'
            ]);
        }

    }
    public function get_notificaciones(){
        return Notificacion::with('reservacion')->get();
    }
    public function logout() {
        Session::flush();
        return redirect('/');
    }
    private function update_session() {
        $correo = $departamento = Session::get('correo');
        $usuario = Usuario::with('departamento')->where('correo', $correo)->first();
        if($usuario != null){
                Session::flush();
                Session::put([
                    'id'=>$usuario->id,
                    'nombre'=> $usuario->nombre,
                    'apellido'=> $usuario->apellido,
                    'correo'=> $usuario->correo,
                    'rol'=>$usuario->rol,
                    'departamento'=>$usuario->departamento,
                    'path_foto'=>$usuario->path_foto,
                    'nombre_foto'=>$usuario->nombre_foto,
                ]);
                Session::save();
                
                return response()->json([
                    'ok'=> true,
                    'usuario' => $usuario, 
                    'message'=>'Se Actualizo la Informacion.'
                ]);
        }
        else{
            return response()->json([
                'ok'=> false, 
                'message'=>'Correo Invalido.'
            ]);
        }

    }

    public function cerrar_sesion(){
        Session::flush();
        return redirect('/');
    }

    private function correo_valido($correo, $id){

        $busq = Usuario::where('correo', $correo)->count();
        if($busq > 0){
            if($id === ''){
                return false;
            }
            else{
                $busq = Usuario::where('correo', $correo)->where('id', $id)->count();
                if($busq == 1){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        else
            return true;            
    }

    public function register(Request $request) {
        $contrasenia = hash('SHA256', $request->input("contrasenia"));

        if($this->correo_valido($request->input('correo'), '') == false){
            return response()->json([
                'ok'=> false, 
                'message'=>'Imposible agregar. Correo ya existe.'
            ]);
        }

        $user = new Usuario();
        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->correo = $request->input('correo');
        $user->contrasenia = $contrasenia;
        $user->id_departamento = $request->input('id_departamento');
        $user->rol = $request->input('rol');
        $user->save();

        $idUser = $user->id;
        return response()->json([
            'ok'=> true,
            'usuario' => $idUser, 
            'message'=>'Usuario agregado correctamente.'
        ]);
    }

    public function update(Request $request) {

        if($this->correo_valido($request->input('correo'), $request->input('id')) == false){
            return response()->json([
                'ok'=> false, 
                'message'=>'Imposible agregar. Correo ya existe.'
            ]);
        }
        
        $user = Usuario::find($request->input('id'));
        $user->nombre = $request->input('nombre');
        $user->apellido = $request->input('apellido');
        $user->correo = $request->input('correo');
        $user->id_departamento = $request->input('id_departamento');
        $user->rol = $request->input('rol');
        $user->save();

        $idUser = $user->id;
        return response()->json([
            'ok'=> true,
            'usuario' => $idUser, 
            'message'=>'Usuario editado correctamente.'
        ]);
    }

    public function delete(Request $request) {
        $user = Usuario::find($request->input('id'));
        if($user != null)
            $user->delete();
        
        return response()->json([
            'ok'=> true, 
            'message'=>'Usuario eliminado correctamente.'
        ]);
    }

    public function update_password(Request $request) {
        $contrasenia = hash('SHA256', $request->input("contrasenia"));
        $nueva_contrasenia = hash('SHA256', $request->input("nueva_contrasenia"));
        $user = Usuario::find($request->input('id'));
        if(strcmp($contrasenia, $user->contrasenia) == 0){
            $user->contrasenia = $nueva_contrasenia;
            $user->save();
            return response()->json([
                'ok'=> true,
                'message'=>'Cambio la contraseña.'
            ]);
        }
        else{
            return response()->json([
                'ok'=> false,
                'message'=>'Contraseña no coincide.'
            ]);
        }
    }

    public function get_departamento_usuarios(Request $request) {
        $id_departamento = $request->input('id_departamento');
        $users = Usuario::where('id_departamento', $id_departamento)->get();
        return response()->json([
            'ok' => true,
            'data' => $users
        ]);
    }

    public function get_usuarios() {
        $users = Usuario::with('departamento')->get();
        return response()->json([
            'ok' => true,
            'data' => $users
        ]);
    }

    public function get_departamento_usuarios_session() {
        $departamento = Session::get('departamento');
        $users = Usuario::where('id_departamento', $departamento->id)->get();
        return response()->json([
            'ok' => true,
            'data' => $users
        ]);
    }

    public function getSession() {
        return session()->all();
    }

    public function save_files(Request $request)
    {
        $id_usuario = $request->input('id_usuario');
        $files = $request->file('files');

        $usuario = Usuario::find($id_usuario);

        if($id_usuario > 0){
            $carpeta_nombre = "usuario-$id_usuario";
            foreach ($files as $key => $file) {
                $file_ext = $file->getClientOriginalExtension();
                if($file_ext == 'pdf' || $file_ext == 'png' || $file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'xls' || $file_ext == 'PDF' || $file_ext == 'PNG' || $file_ext == 'JPG' || $file_ext == 'JPEG' || $file_ext == 'XLS'){
                    $fileName = $file->getClientOriginalName();
                    $file->storeAs($carpeta_nombre, $fileName, 'usuarios');

                    $usuario->path_foto = "$carpeta_nombre/$fileName";
                    $usuario->nombre_foto = "$fileName";
                    $usuario->save();
                }
                else{
                    return response()->json([
                        'status'=>false,
                        'message'=>"La extensión del archivo: ".$file->getClientOriginalName()." es incorrecta.",
                    ], 200);
                }
            }
            return response()->json([
                'status' => true,
                'message' => 'Archivo Guardado Con Exito'
            ]);
        }
        return response()->json([
            'status' => false,
            'data' =>''
        ]); 
    }
}