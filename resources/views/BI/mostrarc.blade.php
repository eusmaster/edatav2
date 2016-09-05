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
                        <thead> CENTRO ELECTORAL
                        <tbody> <tr>
                                <td class="bg-primary"><div>Codigo de centro</div></td>

                                <td class="table-text"><div>{{$centro[0]->cod_cen }}
                                    </div></td>
                                <tr>
                                <td class="bg-primary"><div>Nombre del Centro</div></td>

                                <td class="table-text"><div>{{$centro[0]->nombre }}</div>
                                </tr>
                                <tr>
                                        <td class="bg-primary"><div>Direccion</div></td>

                                        <td class="table-text"><div>{{$centro[0]->direccion }}</div>
                                                </tr>
                                                <tr>

                                                <td class="bg-primary"><div>Estado</div></td>

                                                <td class="table-text"><div>{{$centro[0]->edo }}
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                <td class="bg-primary"><div>Municipio</div></td>

                                                <td class="table-text"><div>{{$centro[0]->mun }}</div>
                                                </tr>    <tr>
                                                        <td class="bg-primary"><div>Parroquia</div></td>

                                                        <td class="table-text"><div>{{$centro[0]->par}}</div>
                                                                </tr>
                                                           
                                                                </tbody>
                                                                </table>
                                                            </div>
                                                    </div>

                                            </div>
                                    </div>
</div>
                                    @endsection