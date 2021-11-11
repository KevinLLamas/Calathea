<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function departamento(){
    	return $this->hasOne('App\Models\Departamento', 'id', 'id_departamento');
    }

    public function tareas(){
        return $this->belongsToMany('App\Models\Tarea','tarea_usuario','id_usuario','id_tarea')->withPivot('estado')->wherePivotIn('estado',['Asignado','Terminada']);
        //return $this->belongsToMany('Tabla relacionada','Tabla_intermedia','id Tabla actual(tabla intermedia)','id Tabla relacionada(tabla intermedia)');
    }

}