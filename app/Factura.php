<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
        protected $table = 'factura';
        public $timestamps = false;

    protected $fillable = [
        'table', 'start_time', 'finish_time', 'id_employee_start', 'id_employee_finish', 'total'
    ];


    public function employee_start() {
        return $this->belongsTo('App\Empleado', 'id_employee_start');
    }
        public function employee_finish() {
        return $this->belongsTo('App\Empleado', 'id_employee_finish');
    }
}
