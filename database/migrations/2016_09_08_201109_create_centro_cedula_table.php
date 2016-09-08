<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCentroCedulaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relec2015', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cedulados_ced');
            $table->integer('cva_cod_cen')
            $table->foreing('cedulados_ced')->references('cedula')->on('cedulados')->onDelete('cascade');
            $table->foreing('cva_cod_cen')->references('cva')->on('cod_cen');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('relec2015');
    }
}
