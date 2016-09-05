$edo=0;
$mun=0;
$("#edo").change(function(event){
    $.get("bic/"+event.target.value+"",function(response, state){
        $("#munic").empty();
        $edo=event.target.value;
        $("#munic").append("<option value='0'>Seleccione el Municipio</option>");
        for (i=0;i<response.length;i++){
            $("#munic").append("<option value='"+response[i].cod_mun+"'>"+response[i].mun+"</option>")
        }
    });
});

$("#munic").change(function(event){
    $.get("bic/"+$edo+"/"+event.target.value+"",function(response, state){
        $mun=event.target.value;
        $("#par").empty();
        $("#par").append("<option value='0'>Seleccione la parroquia</option>");
        for (i=0;i<response.length;i++){
            $("#par").append("<option value='"+response[i].cod_par+"'>"+response[i].par+"</option>")
        }
    });
});

$("#par").change(function(event){
    $.get("bic/"+$edo+"/"+$mun+"/"+event.target.value+"",function(response, state){
        //$cen=event.target.value;
        $("#cen").empty();
        $("#cen").append("<option value='0'>Seleccione el Centro</option>");
        for (i=0;i<response.length;i++){
            $("#cen").append("<option value='"+response[i].cod_cen+"'>"+response[i].nombre+"</option>")
        }
    });
});

$("#cen").change(function(event) {
    $cen = event.target.value;
    $("#formulario").submit();



});