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
          <th><center>Nombre</center></th>
         
          <th><center>Precio</center></th>
          <th><center>Imagen</center></th>

          <th><center>Acción</center></th>

        </tr>
        </thead>
        <tbody>
        @foreach ($all_subject as $producto)
        <tr>
          <td><center>{{$producto['nombre']}}</center></td>
          <td><center>{{$producto['precio']}}</center></td>
          <td><center><img src="{{$producto['urlImagen']}}" style="height: 70px; width: 70px;"></center></td>
          
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
