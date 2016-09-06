<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\cva;
use App\geo2015;
use App\Http\Requests;
use Zend\Form\Element;

class MuestrasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function test()
    {
    	
		  $consulta= DB::table('geo2015')->where (
            [ ['cod_edo','=','2'] , ['cod_mun','=','3'], ['cod_par','=','50']])
                                        ->orWhere( function ($query) {

                                         $query->where( [ ['cod_edo', '=', '1'] , ['title', '<>', 'Admin'] ])
                                        
            ->get();

    	 /*$centroinfo = DB::table('geo2015')

        ->where('cod_edo','=','2');


        $centroinfo2 = DB::table('geo2015')
        ->where('cod_edo','=','3');
        

        $total[]=$centroinfo ;
        $total[]=$centroinfo2;
       	
       	$centroinfo=$centroinfo->find('cod_edo','=','5')->get();
        

        //$total[1]=$total[1]->where('cod_edo','=',4);
        */
         var_dump($consulta);
        

    }





}
