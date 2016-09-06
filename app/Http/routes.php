<?php
use App\Http\Requests\Request;
use App\Http\Requests;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('home/index','HomeController@index');
Route::get('home/id1/{id1}/id2/{id2}','HomeController@getId');
Route::get('home/showview','HomeController@showview');
// tercer video abajo:::

//peticiones post y get:
//Route::match(["get","post"], "home/form","HomeController@form");
route::any("home/form","HomeController@form");
Route::get('home/nombre/{nombre}', function ($nombre)
        {
   return "el valor del argumento nombre es: ".$nombre;
})->where(["nombre"=>"[a-zA-Z]+"]);

//Route::get("home/miformulario","HomeController@miFormulario");
//Route::get("home/validarmiformulario","HomeController@validarMiFormulario");


Route::group(['middleware' => ['web']], function () {

    Route::get('home/miformulario', [
        'uses'=> 'homeController@miFormulario',
        'as'=> 'home.miformulario'
    ]);
    Route::post('home/validarmiformulario', [
        'uses'=> 'homeController@validarMiFormulario',
        'as'=> 'home.validarmiformulario'
    ]);

});
Route::auth();

Route::get('/home', 'HomeController@index');
Route::delete('/task/{task}', 'TaskController@destroy');
Route::get('/tasks', 'TaskController@index');
Route::post('/task', 'TaskController@store');
Route::get('/test','HomeController@test');
Route::get('/bi','BIController@mostrarf');
Route::post('/bi2','BIController@prueba');
Route::get('/bic','BIController@mostrarc');
Route::post('/bic2','BIController@centro');
Route::get('/bic/{cod_edo}','BIController@getMun');
Route::get('bic/{cod_edo}/{cod_mun}','BIController@getparroquia');
Route::get('bic/{cod_edo}/{cod_mun}/{cod_par}','BIController@getCentro');

// RUTAS DE PRUEBA TEMPORALES:
Route::get('prueba','BIController@test'); // ojo con los ( y las {{{{{{ llaves !!!!!!!<------------
Route::post('prueba2','BIController@test2');
Route::post('prueba3','BIController@test3');
Route::get('/prueba4','MuestrasController@test');
