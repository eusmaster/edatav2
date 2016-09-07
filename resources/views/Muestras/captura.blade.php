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
                <div class="form-group">

                <a id="agregarCampo" class="btn btn-info" href="#">Agregar Campo</a>

                <div id="contenedor">
                    <div class="added">
                        <form action="{{ url('prueba3') }}" method="POST" class="form-horizontal" id="formulario">
                            {{ csrf_field() }}
                        <table class="table table-striped task-table" id="tabla">
                        <tr><td>{{Form::select('campo[]',$data ,null, array('class' =>'form-control','placeholder'=>'Seleccione el Estado'))  }}</td>
                        <td> <a href="#" class="eliminar">&times;</a></td>
                        </tr>

                        </table>
                       <table border="true">
                           <tr>
                               <td> <label for="task-name" class="col-sm-3 control-label">Nacionalidad</label> </td><td>{{form::select('nacionalidad',['v' => 'Venezolano',
                                'e' => 'Extrangero'],null,array('class' => 'form-control','placeholder' => ''))}}</td>



                               <td> <label for="task-name" class="col-sm-3 control-label">Sexo</label> </td><td>{{form::select('sexo',['m' => 'Masculino',
                                'f' => 'Femenino'],null,array('class' => 'form-control','placeholder' => ''))}}</td>

                           </tr>

                       </table>

                         <button type="submit" class="btn btn-default" id="alerta">
                                Buscar    <i class="fa fa-search" aria-hidden="true"></i> 
                        </button>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {

        var MaxInputs       = 8; //Número Maximo de Campos
        var contenedor       = $("#contenedor"); //ID del contenedor
        var AddButton       = $("#agregarCampo"); //ID del Botón Agregar

//var x = número de campos existentes en el contenedor
        var x = $("#contenedor div").length + 1;
        var FieldCount = x-1; //para el seguimiento de los campos

        $(AddButton).click(function (e) {
            if(x <= MaxInputs) //max input box allowed
            {
                FieldCount++;
//agregar campo
                $(tabla).append('<tr><td>{{Form::select('campo[]',$data,null, array('class' =>'form-control','placeholder'=>'Seleccione el Estado'))  }}</td><td><a href="#" class="eliminar">&times;.</a></td></tr>');
                    //'<div><select name="campos" id="campo" placeholder='+'"hjkhfkgkhg"'+'/><a href="#" class="eliminar">&times;</a></div>');
                x++; //text box increment

            }
            return false;
        });

        $("body").on("click",".eliminar", function(e){ //click en eliminar campo
            if( x > 1 ) {
                $(this).parent('div').remove(); //eliminar el campo
                x--;
            }
            return false;
        });
    });


  
</script>


@endsection
