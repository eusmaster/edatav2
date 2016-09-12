
        var MaxInputs       = 8; //N�mero Maximo de Campos
        var contenedor       = $("#contenedor"); //ID del contenedor
        var AddButton       = $("#agregarCampo"); //ID del Bot�n Agregar

//var x = n�mero de campos existentes en el contenedor
        var x = $("#contenedor div").length + 1;
        var FieldCount = x-1; //para el seguimiento de los campos

        $(AddButton).click(function (e) {
            if(x <= MaxInputs) //max input box allowed
            {
                FieldCount++;
//agregar campo
                $(tabla).append('<tr><td>{{Form::select('campo[]',$data,null, array('class' =>'form-control','placeholder'=>'Seleccione el Estado'))  }}</td><td><a href="#" class="eliminar">&times;.</a></td></tr>'));
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
