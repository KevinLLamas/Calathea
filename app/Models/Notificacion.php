<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Notificacion extends Model
{
    protected $table = 'notificacion';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function id_reservacion(){
    	return $this->hasOne('App\Models\Reservacion', 'id', 'id_reservacion');
    }
}