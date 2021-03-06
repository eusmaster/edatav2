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
  public  $vectordeprueba;

    public function __construct() {
    $this->middleware('auth');

    }

    public function almacenargeo($request)
    {
      if($request->ajax())
      {
        $vector[]=['cod_edo','=',$request->estados];
        dd($vector);
          return response()->json($vector);
      }

    }

    public function traercva($cond)
    {

        $consulta= DB::table('cva')->select('cod_cen')->where($cond)->get();


        return    $vector=$consulta;
    }

   /* Metodo que utiliza el JVASCRt para agregar los centros electorales a la consulta
    * en teoria pasa los codigos GEOGRAFICOS y devuelve un vector con codigos de centros electorales :D
    *algo que se requiere en las consultas por electores
    *
    *
    */



    public function fumexxx(Request $request,$cod_edo,$cod_mun,$cod_par,$cod_cen)
    {
      if($request->ajax())
      {
        if($cod_cen != 0)
        {
            $consul=DB::table('cva')->select("cod_cen")->where("cod_cen","=",$cod_cen)
            ->get();

        }else {
            if($cod_par!=0)
            {
              $consul=DB::table('cva')->select("cod_cen")
              ->where('cod_edo','=', $cod_edo)
              ->where('cod_mun','=', $cod_mun)
              ->where('cod_par','=', $cod_par)
              ->get();

            }else {
                  if ($cod_mun!=0) {
                    $consul=DB::table('cva')->select("cod_cen")
                    ->where('cod_edo','=', $cod_edo)
                    ->where('cod_mun','=', $cod_mun)
                    ->get();

            }else {
              $consul=DB::table('cva')->select("cod_cen")
              ->where('cod_edo','=', $cod_edo)
              ->get();
            }

            }
        }



      //  $consul=DB::table('cva')->where('cod_edo','=', $cod_edo)->get();

        return response()->json($consul);
      }
    }

    public function test()// pruebas geograficas! Down
    {
      /*
       se buscara hacer una consulta que retorne un vector de codigos de centros electorales necesarios
       para la consulta principla, ya que, las personas estan conectadas con su centro de votacion asi:
       ( ci<->cod_cen), por ente, si logramos hacer una consulta que traiga la centros de votacion obtendremos
       a las personas involucradas en la consulta principal.

      */
      // posible solucion :D <-----------------------------------------------------------------------
      // realizamos un vector global para almacenar los codigos de estados
      $vectordeprueba[]=10;
      $vectordeprueba[]=11;
      $vectordeprueba[]=13;
      dd($vectordeprueba);

       $conds[0]= [ ['cod_edo','=','2'] , ['cod_mun','=','3'], ['cod_par','=','2'] ];
        $conds[1]=  [ ['cod_edo','=','1'] , ['cod_mun','=','1'], ['cod_par','=','1']];
/*
        $consulta= DB::table('cva')->select('cod_cen')
        ->Where(function ($query) {
                  foreach (this->$conds as this->$cond) {
                $query->where([$cond])->get();
              }});

*/
            for ($i=0; $i <2 ; $i++) {
              # code...

            $consulta[]=$this->traercva($conds[$i]);

            }

          foreach ($consulta as $consulta) {
            $au= $consulta;
            foreach ($au as $au) {
              $vectorOr[]=$au->cod_cen;
            }
            }
        /*foreach ($cond as $cond)
        {
            $consulta= DB::table('geo2015')->select(cod_cen)
            ->where('cod_edo', [1, 2, 3] ,'cod_mun',[1,2,3])

                $aux[]=$consulta
        }->get();
        */

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
      //$centroinfo2[] = DB::table('cva')->select('nombre')
          //foreach ($vectorOr as $vectorOr) {
          $centroinfo2 = DB::table('cva')->select('nombre')
          ->WhereIn('cod_cen',$vectorOr)->get();
      //  }
       dd($centroinfo2,$vectorOr);


         return ($centroinfo2);


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
        $geo=  DB::table('geo2015')         // ojo aca modificacion rara! xD <--------------------
        ->select('edo', 'cod_edo')
        ->groupBy('cod_edo')
        ->get(anArray());
        $geoss=geo2015::lists('edo', 'cod_edo');
        return view('Muestras.captura',['data'=>$aux],compact('geoss'));


    }

    public function respuesta(Request $request)
    {
    // validacion pendiente! JSON!! en  la Vista

        $aux= $request->campo;
        $centros=$request->cod_centro;
          // seguridad por si no consigue ninguna cedula en la busqueda anterior ALGO Q RARA VEZ PASARA↓.
          $vectorcedulas[]=0;

        //$geo=$request->geografico;
        if($centros!=null)
        {
            //  $vectorcedulas[]=0;
          $cedulas= DB::table('re2015')->select('ci_cedulados')
          ->whereIn('cod_cen_cva',$centros)
          ->get();

          foreach ($cedulas as $cedulas) {
            $vectorcedulas[]=$cedulas->ci_cedulados;
          }


            // seguridad por si no consigue ninguna cedula en la busqueda anterior ALGO Q RARA VEZ PASARA.

    //  dd($vectorcedulas);



        }
        $test=["cedula","Primer_nombre"];

        $centroinfo = DB::table('cedulados')->select($aux)

            ->when($request->nacionalidad, function ($query) use ($request) {       // preguntamos para filtrar por Nacionalidad
                return $query->where('nacionalidad','=', $request->nacionalidad);
            })
            ->when($request->sexo, function ($query) use ($request) {       // preguntamos para filtrar por Sexo
                return $query->where('sexo','=', $request->sexo);
            })
            ->when($request->cod_centro, function ($query) use ($request, $vectorcedulas) {       // preguntamos para filtrar por Sexo
                return $query->whereIn('Cedula', $vectorcedulas);
            })



            ->get();
            dd($centroinfo);
        return $gogo;
        //$request->nacionalidad;
    }

}
