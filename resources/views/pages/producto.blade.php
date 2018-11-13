@extends('adminlte::page')


@section('title', 'AdminLte')


@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">Productos Registrados</h3>
      <p>      </p>
      <a href="{{URL::action('ProductoController@agregarproductos')}}"><button class="btn btn-success"> <i class="fas fa-plus-circle"></i> Nuevo Pedido</button></a>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
         
          <th>Precio</th>
          <th>Imagen</th>

          <th>Acción</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($all_subject as $producto)
        <tr>
          <td>{{$producto['nombre']}}</td>
          <td>{{$producto['precio']}}</td>
          <td>{{$producto['urlImagen']}}</td>
          
          <td>Borrar | Editar</td>
         
        </tr>
        @endforeach
        </tbody>
        <!--<tfoot>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>CSS grade</th>
        </tr>
        </tfoot>-->
      </table>
    </div>
    <!-- /.box-body -->
 






@stop
