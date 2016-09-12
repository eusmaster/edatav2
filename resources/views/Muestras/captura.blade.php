@extends('layouts.app')

@section('content')
        <!--scripts  -->

<script src="http://www.google.com/jsapi"></script>
<script type="text/javascript">


    google.load("jquery", "1.2", {uncompressed: true});
</script>



<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
              Selecionar Campos

              <ul class="pull-right">  <a   class=" " id="agregarCampo" class="btn btn-info" href="#" ALING=RIGHT >Agregar Campo</a></ul>

            </div>

                    <div class="panel-body" id="contenedor">
                        <form action="{{ url('prueba3') }}" method="POST" class="form-horizontal" id="formulario">
                            {{ csrf_field() }}
                        <table class="table table-striped task-table" id="tabla">
                        <tr><td>{{Form::select('campo[]',$data ,null, array('class' =>'form-control','placeholder'=>'Seleccione el Estado'))  }}</td>
                        <td> <a href="#" class="eliminar">&times;</a></td>
                        </tr>

                        </table>
                        </div>
                        <div class="panel-heading">
                          Condiciones Personales</div>
                            <div class="panel-body" id="contenedor">
                       <table >
                                                   <tr>
                               <td> <label for="task-name" class="col-sm-3 control-label">Nacionalidad</label> </td><td>{{form::select('nacionalidad',['v' => 'Venezolano',
                                'e' => 'Extrangero'],null,array('class' => 'form-control','placeholder' => ''))}}</td>



                               <td> <label for="task-name" class="col-sm-3 control-label">Sexo</label> </td><td>{{form::select('sexo',['m' => 'Masculino',
                                'f' => 'Femenino'],null,array('class' => 'form-control','placeholder' => ''))}}</td>

                           </tr>
                          </table>
                       </div>

            </div>

        </div>
    </div>

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
              GeOGraFICA   <ul class="pull-right">  <a   class="" id="agregargeo" class="btn btn-info" href="#" ALING=RIGHT >Agregar Posición Geografica</a></ul>
              </div>
                <div class="panel-body">

                   {{Form::select('estados',$geoss,null, array('class' =>'form-control', 'id'=>'edo1','placeholder'=>'Seleccione el Estado')) }}
                   {{Form::select('municipios',['placeholder'=>'Municipio'],null, array('class' =>'form-control', 'id'=>'munic1')) }}
                   {{Form::select('parroquias',['placeholder'=>'Parroquia'],null, array('class' =>'form-control', 'id'=>'par1')) }}
                   {{Form::select('name',['placeholder'=>'Centro Electoral'],null, array('class' =>'form-control', 'id'=>'cen1')) }}

  <button  class="btn btn-default" id="add">

        agregar   <i class="fa fa-search" aria-hidden="true"></i>
 </button>
    </form>
                </div>


             </div>
             </div>
             </div>
             </div>


<script>
    $(document).ready(function() {

        var MaxInputs       = 8; //N�mero Maximo de Campos
        var contenedor       = $("#contenedor"); //ID del contenedor
        var AddButton       = $("#agregarCampo"); //ID del Bot�n Agregar
        var AddButton2       = $("#agregargeo");

        $(AddButton2).click(function (e){
          alert("tocando !");
        });



//var x = n�mero de campos existentes en el contenedor
        var x = $("#contenedor div").length + 1;
        var FieldCount = x-1; //para el seguimiento de los campos

        $(AddButton).click(function (e) {
            if(x <= MaxInputs) //max input box allowed
            {
                FieldCount++;
//agregar campo
                $(tabla).append('<tr><td>{{Form::select('campo[]',$data,null, array('class' =>'form-control','placeholder'=>'Seleccione el Estado'))  }}</td><td><a href="#" id="body" class="eliminar">&times;.</a></td></tr>');
                    //'<div><select name="campos" id="campo" placeholder='+'"hjkhfkgkhg"'+'/><a href="#" class="eliminar">&times;</a></div>');
                x++; //text box increment

            }
            return false;
        });

        $("body").on("click",".eliminar", function(e){ //click en eliminar campo
          alert(x);
            if( x > 1 ) {

                $(this).parent('div').remove(); //eliminar el campo
                x--;
            }
            return false;
        });
    });



</script>

<script>
// Script Geografico


$("#edo1").change(function(event){
    $.get("bic/"+event.target.value+"",function(response, state){
        $("#munic1").empty();
        $edo1=event.target.value;
        $("#munic1").append("<option value='0'>Seleccione el munic1ipio</option>");
        for (i=0;i<response.length;i++){
            $("#munic1").append("<option value='"+response[i].cod_mun+"'>"+response[i].mun+"</option>")
        }
    });
});

$("#munic1").change(function(event){
    $.get("bic/"+$edo1+"/"+event.target.value+"",function(response, state){
        $mun=event.target.value;
        $("#par1").empty();
        $("#par1").append("<option value='0'>Seleccione la par1roquia</option>");
        for (i=0;i<response.length;i++){

            $("#par1").append("<option value='"+response[i].cod_par+"'>"+response[i].par+"</option>")
        }
    });
});

$("#par1").change(function(event){
    $.get("bic/"+$edo1+"/"+$mun+"/"+event.target.value+"",function(response, state){
        //$cen1=event.target.value;
        $("#cen1").empty();
        $("#cen1").append("<option value='0'>Seleccione el centro</option>");
        for (i=0;i<response.length;i++){
            $("#cen1").append("<option value='"+response[i].cod_cen+"'>"+response[i].nombre+"</option>")
        }
    });
});

$("#add").click(function(event) {

var  $vector=$edo1
  dd(vector)


});



</script>


@endsection
