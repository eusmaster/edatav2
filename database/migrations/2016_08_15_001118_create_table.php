<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cedulados', function (Blueprint $table) {
            $table->primary('cedula');
            $table->integer('cedula')->unique();
            $table->char('nacionalidad');
            $table->string('pn',20);$table->string('sn',30);
            $table->string('pa',30);$table->string('sa',30);
            $table->char('sexo');
            $table->integer('leeescribe')->nullable();
            $table->integer('objecion')->nullable();
            $table->integer('edo_civil');
            $table->date('fechanac');
            $table->integer('bio')->nullable();
            $table->string('email',100)->nullable();
           
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cedulados');
    }
}
