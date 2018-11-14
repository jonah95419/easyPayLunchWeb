@extends('adminlte::page')


@section('title', 'Clientes')


@section('content_header')
    <h1>Tablero</h1>
@stop


@section('content')


<div class="box">
    <div class="box-header">
      <h3 class="box-title">Clientes Registrados</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <!--<th>DirecciÃ³n</th>-->
          <th>Imagen</th>
          <th>Correo</th>
          <th>TokenUser</th>
          <th>Acción</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($all_subject as $cliente)
        <tr>
          <td>{{$cliente['nombre']}}</td>
        <td><img src="{{$cliente['imagen']}}" style="height: 50px; width: 50px;"></td>
          <td>{{$cliente['mail']}}</td>
          <td>{{$cliente['tokenUser']}}</td>
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
