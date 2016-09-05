@extends ('layouts.home')
@section('title','Formulario')
@section('description', 'validacion')
@section('keywords', 'palabras, clave, del , sitio')

@section('content')


<h1>MI FORMULARIO</h1>

<form method="post" action="{{url('home/validamiformulario')}}">
    <div class="form-group">
        <label for="nombre">nombre: </label>
        <input type="text" name="nombre" class="form-control" value="{{Request::old('nombre')}}" />
        <div class="text-danger">{{$errors->formulario->first('nombre')}}</div>
    </div>
    {{csrf_field()}}
    <button type="submit" class="btn btn-primary">Enviar</button>
    
    
    
</form>
@stop
