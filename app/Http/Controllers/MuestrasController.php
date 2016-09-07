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

    public function test()// pruebas geograficas! Down ?
    {


       $cond[0]= [ ['cod_edo','=','2'] , ['cod_mun','=','3'], ['cod_par','=','2'] ];
        $cond[1]=  [ ['cod_edo','=','1'] , ['cod_mun','=','1'], ['cod_par','=','1']];

        foreach ($cond as $cond)
        {
            $consulta= DB::table('geo2015')->where('cod_edo', [1, 2, 3] ,'cod_mun',[1,2,3])
                ->get();
        }


//funciona pero aun no veo el metodo recursivo para aplicarlo. standby ?
        /*
		  $consulta= DB::table('geo2015')->where (
            [ ['cod_edo','=','2'] , ['cod_mun','=','3'], ['cod_par','=','2'] ]);


              $consulta2=DB::table('geo2015')->where (
                  [ ['cod_edo','=','1'] , ['cod_mun','=','1'], ['cod_par','=','1']]) ->union($consulta)->get();

*/

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

    public function enviardata() // METODO A MODIFICAR SOLO PRUEBAS ANTES TEST EN EL CONTROLADOR BI
    {
        /*$aux= ['cod_edo','cod_mun','cod_par'];
        $aux[]='nombre';
        $centroinfo = DB::table('cva')->select($aux)->where('cod_edo', '=', 5)->get();
            */
        $columns = DB::getSchemaBuilder()->getColumnListing('cedulados');

        for ($i=0; $i<13 ;$i++)
        {

            $aux[]=array($columns[$i] => $columns[$i]);
        }

        return view('Muestras.captura',['data'=>$aux]);


    }

    public function respuesta(Request $request)
    {
        $aux= $request->campo;
        //$geo=$request->geografico;
        $test=["cedula","Primer_nombre"];

        $centroinfo = DB::table('cedulados')->select($aux)

            ->when($request->nacionalidad, function ($query) use ($request) {       // preguntamos para filtrar por Nacionalidad
                return $query->where('nacionalidad','=', $request->nacionalidad);
            })
            ->when($request->sexo, function ($query) use ($request) {       // preguntamos para filtrar por Sexo
                return $query->where('sexo','=', $request->sexo);
            })





            ->get();





        return $centroinfo;
        //$request->nacionalidad;
    }





}
