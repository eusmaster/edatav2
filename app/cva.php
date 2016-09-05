<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cva extends Model
{
    //
    public $table = "cva";
    public function estado() {
    return $this->hasOne('laravel\geo2015');
    }
}
