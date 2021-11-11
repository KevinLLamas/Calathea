<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Mensaje extends Model
{
    protected $table = 'mensaje';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function usuario(){
    	return $this->hasOne('App\Models\Usuario', 'id', 'id_usuario');
    }

}