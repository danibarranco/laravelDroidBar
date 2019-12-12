<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComandaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comanda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_employee')->unsigned();
            $table->bigInteger('id_product')->unsigned();
            $table->bigInteger('id_ticket')->unsigned();
            $table->Integer('units')->unsigned();
            $table->float("price", 4, 2);
            $table->boolean("served");
            
            $table->foreign('id_employee')->references('id')->on('empleado');
            $table->foreign('id_product')->references('id')->on('producto');
            $table->foreign('id_ticket')->references('id')->on('factura');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comanda');
    }
}
