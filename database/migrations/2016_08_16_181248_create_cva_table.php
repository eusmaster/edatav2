<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cva', function (Blueprint $table) {
           $table->primary('cod_cen'); 
           
            $table->integer('cod_cen')->unique();
            $table->smallinteger('cod_edo');
            $table->smallinteger('cod_mun');
            $table->smallinteger('cod_par');
            $table->string('nombre', 150);
            $table->string('direccion', 150);
            
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cva');
    }
}
