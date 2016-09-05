<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\cva;
use App\geo2015;
use App\Http\Requests;
use Zend\Form\Element;


class BIController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function mostrarf() {
        return view('bi.solic');
    }
    // mostrar centro individual:
     public function mostrarc() {
                $geo=  DB::table('geo2015')
                ->select('edo', 'cod_edo')
                ->groupBy('cod_edo')
                ->get(anArray());

         $geoss=geo2015::lists('edo', 'cod_edo');

                 return  view('bi.solicc',compact('geoss'));
                    // return  $geo;
              }
        public function getMun(Request $request, $cod_edo)
        {
            if($request->ajax())
            {
                //$mun= geo2015::municipios($cod_edo);
                $mun= geo2015::where('cod_edo','=',$cod_edo)
                    ->groupBy('cod_mun')
                    ->get();
                return response()->json($mun);
            }
        }
        public function getparroquia(Request $request,$cod_edo,$cod_mun)
        {
            if($request->ajax())
            {
                //$mun= geo2015::municipios($cod_edo);

                $par= geo2015::where('cod_edo','=',$cod_edo)
                    ->where('cod_mun','=',$cod_mun)
                    ->groupBy('cod_par')
                    ->get();
                return response()->json($par);
            }
        } public function getCentro(Request $request,$cod_edo,$cod_mun,$cod_par)
        {
            if($request->ajax())
            {
                //$mun= geo2015::municipios($cod_edo);

                $cva= cva::where('cod_edo','=',$cod_edo)
                    ->where('cod_mun','=',$cod_mun)
                    ->where('cod_par','=',$cod_par)
                    ->groupBy('cod_cen')
                    ->get();
                return response()->json($cva);
            }
        }


        public function centro(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $centro = DB::table('cva')->where('cod_cen', '=', $request->name)
                ->join('geo2015', function ($join) {
            $join->on('cva.cod_edo', '=', 'geo2015.cod_edo')->On('cva.cod_mun', '=', 'geo2015.cod_mun')->On('cva.cod_par', '=', 'geo2015.cod_par');
        })
                       
                // ->join('geo2015', 'cva.cod_edo', '=', 'geo2015.edo_id')
              /*  ('geo2015', 'cva.cod_mun', '=', 'geo2015.mun_id'),
                 ('geo2015', 'cva.cod_par', '=', 'geo2015.par_id')*/
                 ->get();
         return view('bi.mostrarc',['centro'=>$centro]);
        }
        
        
    public function buscar(int $ci) {

        return view('bi.mostrar', [
            'cedulado' => $this->cedulados->Buscar($ci),
        ]);
    }

    public function prueba(Request $request) {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $users = DB::table('cedulados')->where('Cedula', '=', $request->name)->get();

        if ($users == NULL) {
            return redirect('/bi');
        } else {

            $users2 = DB::table('re2015')->where('ci_cedulados', '=', $request->name)->get();
            if ($users2 == null) {

                $centroinfo = new cva;
                $ubicacion = new geo2015;
                return view('bi.mostrar', [
                    'persona' => $users, 'centro' => $centroinfo, 'geo' => $ubicacion
                ]);
            } else {



                $centroinfo = DB::table('cva')->where('cod_cen', '=', $users2[0]->cod_cen_cva)->get();
                $ubicacion = DB::table('geo2015')->where('cod_edo', '=', $centroinfo[0]->cod_edo)
                                ->where('cod_mun', '=', $centroinfo[0]->cod_mun)
                                ->where('cod_par', '=', $centroinfo[0]->cod_par)->get();
            }
            return view('bi.mostrar', [
                'persona' => $users, 'centro' => $centroinfo, 'geo' => $ubicacion
            ]);
        }
    }

    public function buscarcentro(Request $request) {
        $centroinfo = DB::table('cva')->where('cod_cen', '=', $request->cod_cen)->get();

        return view('bi.mostrarc', [
            'centro' => $centroinfo,
        ]);
    }



    // RUTAS DE PRUEBA TEMPORALES:
    public function test()
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
    public function test2(Request $request)
    {

        /*for ($i=0;$i<5;$i++)
        {

           $aux[]= $request->intereses;
        };*/
        $aux= $request->intereses;

        $centroinfo = DB::table('cva')->select($aux)->where('cod_edo', '=', 5)->get();
        return $centroinfo;

            //view('Muestras.captura',['centro' =>$centroinfo]);
    }

    public function test3(Request $request)
    {
       $aux= $request->campo;

        $centroinfo = DB::table('cedulados')->select($aux);

        $centroinfo->where('cedula','=','24674966');
         







        return $centroinfo;
    }
}
