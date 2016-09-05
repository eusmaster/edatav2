<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geo2015', function (Blueprint $table) {
           
            $table->primary(['edo_id', 'mun_id','par_id']);
            $table->smallinteger('edo_id');
            $table->smallinteger('mun_id');
            $table->smallinteger('par_id');
            $table->string('edo');
            $table->string('mun');
            $table->string('par');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('geo2015');
    }
}
