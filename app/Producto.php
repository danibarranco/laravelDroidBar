<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
           protected $table = 'producto';

    protected $fillable = [
        'name', 'price', 'target' 
    ];
    
        public function productos() {
        return $this->hasMany('App\Comanda');
    }
}
