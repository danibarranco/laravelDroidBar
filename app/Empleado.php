<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
       protected $table = 'empleado';

    protected $fillable = [
        'login', 'password' 
    ];

        public function empleados_factura() {
        return $this->hasMany('App\Factura');
    }
        public function empleados_comanda() {
        return $this->hasMany('App\Comanda');
        }

}
