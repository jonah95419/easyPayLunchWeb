@extends('pages.admin1')





@section('content')
<section class="content-header">
      <h1>
        Clientes Registrados
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="http://localhost/easyPayLunchWeb-master/public/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

<div class="box">
    
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nombre</th>
          <!--<th>Dirección</th>-->
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
          <td>{{$cliente['imagen']}}</td>
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

