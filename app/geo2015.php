<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class geo2015 extends Model
{
    //
    public $table = "geo2015";
    public static function municipios($cod_edo){
        return geo2015::where('cod_edo','=',$cod_edo)->get();

    }
}
