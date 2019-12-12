<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer("table");
            $table->dateTime("start_time");
            $table->dateTime("finish_time");
            $table->bigInteger('id_employee_start')->unsigned();
            $table->bigInteger('id_employee_finish')->unsigned();
            $table->float("total", 5, 2);
            
            $table->foreign('id_employee_start')->references('id')->on('empleado');
            $table->foreign('id_employee_finish')->references('id')->on('empleado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factura');
    }
}
