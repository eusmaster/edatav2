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
            <tr><td>{{Form::select('campo[]',$data ,null, array('class' =>'form-control','placeholder'=>'Seleccione el campo solicitado'))  }}</td>
              <td> <a href="#" class="eliminar">&times;</a></td>
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
          Condiciones Personales</div>

          <div class="panel-body" id="contenedor">
            <table >
              <tr>
                <td> <label for="task-name" class="col-sm-3 control-label">Nacionalidad</label> </td><td>{{form::select('nacionalidad',['v' => 'Venezolano',
                  'e' => 'Extranjero'],null,array('class' => 'form-control','placeholder' => ''))}}</td>



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
                <form action="{{ url('prueba#') }}" method="POST" class="form-horizontal" id="fume">
                GeOGraFICA   <ul class="pull-right">  <a   class="" id="add" class="btn btn-info" href="#" ALING=RIGHT >Agregar Posición Geografica</a></ul>
              </div>
              <div class="panel-body">



                  {{Form::select('estados',$geoss,null, array('class' =>'form-control', 'id'=>'edo1','placeholder'=>'Seleccione el estado para continuar')) }}
                  {{Form::select('municipios',['placeholder'=>'Municipio'],null, array('class' =>'form-control', 'id'=>'munic1')) }}
                  {{Form::select('parroquias',['placeholder'=>'Parroquia'],null, array('class' =>'form-control', 'id'=>'par1')) }}
                  {{Form::select('name',['placeholder'=>'Centro Electoral'],null, array('class' =>'form-control', 'id'=>'cen1')) }}
                  <table id="geotabla">

                  </table>


                  <button  class="btn btn-default" id="add">

                    HABLA!  <i class="fa fa-search" aria-hidden="true"></i>
                  </button>

                  <button  class="btn btn-default" id="add">

                    BUSCAR   <i class="fa fa-search" aria-hidden="true"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>



        <script>
        $(document).ready(function() {

          var MaxInputs       = 8; //N�mero Maximo de Campos
          var contenedor       = $("#contenedor"); //ID del contenedor
          var AddButton       = $("#agregarCampo"); //ID del Bot�n Agregar
          var add      =$("#add");
          var geotabla= $("#geotabla");
          $edo1=0;
          $mun1=0;
          $par1=0;
          $cen1=0;

          //var x = n�mero de campos existentes en el contenedor
          var x = $("#contenedor div").length + 1;
          var FieldCount = x-1; //para el seguimiento de los campos

          $(AddButton).click(function (e) {
            if(x <= MaxInputs) //max input box allowed
            {
              FieldCount++;
              //agregar campo
              $(tabla).append('<tr><td>{{Form::select('campo[]',$data,null, array('class' =>'form-control','placeholder'=>'Seleccione el campo solicitado'))  }}</td><td><a href="#" id="body" class="eliminar">&times;.</a></td></tr>');
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
            $("#par1").empty();
            $("#cen1").empty();$cen=0;$par=0;$mun=0;
            $("#cen1").append("<option value='0'>Seleccione el centro</option>");
            $("#par1").append("<option value='0'>Seleccione la parroquia</option>");
            $("#munic1").append("<option value='0'>Seleccione el municipio</option>");
            for (i=0;i<response.length;i++){
              $("#munic1").append("<option value='"+response[i].cod_mun+"'>"+response[i].mun+"</option>")
            }
          });
        });

        $("#munic1").change(function(event){
          $.get("bic/"+$edo1+"/"+event.target.value+"",function(response, state){
            $mun=event.target.value;
            $("#par1").empty();$cen=0;$par=0
            $("#cen1").empty();
            $("#cen1").append("<option value='0'>Seleccione el centro</option>");
            $("#par1").append("<option value='0'>Seleccione la parroquia</option>");
            for (i=0;i<response.length;i++){

              $("#par1").append("<option value='"+response[i].cod_par+"'>"+response[i].par+"</option>")
            }
          });
        });

        $("#par1").change(function(event){
          $.get("bic/"+$edo1+"/"+$mun+"/"+event.target.value+"",function(response, state){
            $par=event.target.value;
            $("#cen1").empty();$cen=0;
            $("#cen1").append("<option value='0'>Seleccione el centro</option>");
            for (i=0;i<response.length;i++){
              $("#cen1").append("<option value='"+response[i].cod_cen+"'>"+response[i].nombre+"</option>")
            }

          });
        });
        $("#cen1").change(function(event){
          $cen=event.target.value;
        });


        $("#add").click(function(event) {

          if(!$edo1==0)
          {

            $.get("prueba/"+$edo1+"/"+$mun+"/"+$par+"/"+$cen,function(response, state){

              $(geotabla).empty();
              $(geotabla).append('<p>Se han agregado '+response.length+' Centros electorales a la consulta.</p>');
                for (i=0;i<response.length;i++)
                {


                  $(formulario).append("<input type='hidden' name='cod_centro[]' value='"+response[i].cod_cen+"'>")

                }

          });

        }else {
          alert('debe selecionar una posicion geografica, al finalizar clickear "Agregar Pocision Geografica"')
        }



        });



        </script>


        @endsection
