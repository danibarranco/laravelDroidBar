<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
            protected $table = 'comanda';
            public $timestamps = false;

    protected $fillable = [
        'id_employee', 'id_product', 'id_ticket', 'units', 'price', 'served'
    ];


    public function employee() {
        return $this->belongsTo('App\Empleado', 'id_employee');
    }
        public function product() {
        return $this->belongsTo('App\Producto', 'id_product');
    }
        public function ticket() {
        return $this->belongsTo('App\Factura', 'id_ticket');
    }
}
