<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCenCedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relectoral2015', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedulados_ced');
            $table->integer('cva_cod_cen');
            $table->foreign('cedulados_ced')->references('cedula')->on('cedulados')->onDelete('cascade');
            $table->foreign('cva_cod_cen')->references('cva')->on('cod_cen');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relectoral2015');
    }
}
