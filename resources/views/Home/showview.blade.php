@extends ('layouts.home')
@section('title','titulo del sitio web')
@section('description', 'descripcion del sitio web')
@section('keywords', 'palabras, clave, del , sitio')

@section('content')

<h1> TUTORIAL LARAVEL 5</H1>
{{$msg}}
<br>
@foreach ($array as $index => $val)
<p>{{$index}}={{$val}}</p>
@endforeach

@stop