<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Reservacion extends Model
{
    protected $table = 'reservacion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function paquete(){
    	return $this->hasOne('App\Models\Paquete', 'id', 'id_paquete');
    }
}