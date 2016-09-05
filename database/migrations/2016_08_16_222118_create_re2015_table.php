<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRe2015Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re2015', function (Blueprint $table) {
           
            $table->primary('ci_cedulados');
            $table->integer('ci_cedulados')->unique();
            $table->integer('cod_cen_cva');
            $table->index('cod_cen_cva');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('re2015');
    }
}
