
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                Búsqueda Individual
            </div>

            <div class="panel-body">
                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>Informacion Personal</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="bg-primary"><div>Cedula</div></td>

                                <td class="table-text"><div>{{$persona[0]->Cedula }}
                                    </div></td>

                                <td class="bg-primary"><div>Primer Nombre</div></td>

                                <td class="table-text"><div>{{$persona[0]->Primer_Nombre }}

                                        <td class="bg-primary"><div>Segundo Nombre</div></td>

                                        <td class="table-text"><div>{{$persona[0]->Segundo_Nombre }}
                                            </tr>
                                                <tr>
                                                    <td class="bg-primary"><div>Nacionalidad</div></td>

                                                    <td class="table-text"><div>{{$persona[0]->Nacionalidad }}

                                                            <td class="bg-primary"><div>Primer Apellido</div></td>

                                                            <td class="table-text"><div>{{$persona[0]->Primer_Apellido }}
                                                                </div></td>

                                                            <td class="bg-primary"><div>Segundo Apellido</div></td>

                                                            <td class="table-text"><div>{{$persona[0]->Segundo_Apellido }}
                                                                </div></td>

                                                </tr> 
                                                <tr>
                                                    <td class="bg-primary"><div>Segundo Apellido</div></td>

                                                    <td class="table-text"><div>{{$persona[0]->Sexo }}
                                                        </div></td>       
                                                    <td class="bg-primary"><div>Fecha de Nacimento</div></td>

                                                    <td class="table-text"><div>{{$persona[0]->fechanac }}
                                                        </div></td>       
                                                    <td class="bg-primary"><div>Email</div></td>

                                                    <td class="table-text"><div>{{$persona[0]->email }}
                                                        </div></td>
                                                </tr>
                                                          
                            @if ($centro[0]== null)
                            <tbody>
                           <th>No registrado en el CNE</th>
                            </tbody>
                            
                            @else
                        </tbody>
                        <th>Informacion de Centro Electoral</th>
                        <tbody> <tr>
                                <td class="bg-primary"><div>Codigo de centro</div></td>

                                <td class="table-text"><div>{{$centro[0]->cod_cen }}
                                    </div></td>

                                <td class="bg-primary"><div>Nombre del Centro</div></td>

                                <td class="table-text"><div>{{$centro[0]->nombre }}

                                        <td class="bg-primary"><div>Direccion</div></td>

                                        <td class="table-text"><div>{{$centro[0]->direccion }}
                                            </tr></tbody>
                                         
                        <tbody> 
                        
                                <td class="bg-primary"><div>Estado</div></td>

                                <td class="table-text"><div>{{$geo[0]->edo }}
                                    </div></td>

                                <td class="bg-primary"><div>Municipio</div></td>

                                <td class="table-text"><div>{{$geo[0]->mun }}

                                        <td class="bg-primary"><div>Parroquia</div></td>

                                        <td class="table-text"><div>{{$geo[0]->par}}
                                            </tr>
                                        @endif
                                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    @endsection