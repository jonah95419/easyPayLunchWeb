

@extends('adminlte::page')
@section('title', 'AdminLte')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="container" align="center">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="card card-default">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-12">
                            <strong>Agregar Productos</strong>
                        </div>
                    </div>
                </div>

                <div align="center" class="card-body" style="width:400px">
                    <form id="addProducto" class="" method="POST" action="{{url('ProductoController@agregarproductos')}}">
                        <div class="form-group">
                            <label for="Nombre" class="col-md-12 col-form-label">Nombre</label>

                            <div class="col-md-12">
                                <input id="Nombre" type="text" class="form-control" name="Nombre" value="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Precio" class="col-md-12 col-form-label">Precio</label>

                            <div class="col-md-12">
                                <input id="Precio" type="text" class="form-control" name="Precio" value="" required autofocus>
                        </div>
                        </div>

                        

                        <div id="div_file">
                           <p id="texto"> Add Archivo</p> 
                        <input type="file" name="fichero" value="" id="fichero" >
                        </div>
                        <br>

                    <div class="hidden" id="progreso">
                        <div class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0"
                          aria-valuemin="0" aria-valuemax="100" id="barra-de-progreso" style="width:0%">
                            <span class="sr-only">70% Complete</span>
                          </div>
                        </div>
                    </div>


                         <br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <button type="button" class="btn btn-primary btn-block desabled" id="agregarProducto">
                                    Agregar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://www.gstatic.com/firebasejs/5.5.6/firebase.js"></script>

<script>
    var config = {   apiKey: "{{ config('services.firebase.apikey') }}",

    authDomain: "{{ config('services.firebase.authDomain') }}",
    databaseURL: "{{ config('services.firebase.databaseURL') }}",
    storageBucket: "{{ config('services.firebase.storageBucket') }}",
};
firebase.initializeApp(config);


var database = firebase.database();

window.onload=inicializar;
var fichero;
var storageRef;
var imagenesFBRef;

var image_url='';

var downloadURL;


function inicializar(){
    fichero=document.getElementById("fichero");
    fichero.addEventListener("change",subirImagenAfirebase, false);
    storageRef=firebase.storage().ref();

    imagenesFBRef=firebase.database().ref().child("Establecimiento/jbuywbeijwnvkj/producto");

}


function subirImagenAfirebase(){
    var imagenASubir=fichero.files[0];
    var uploadTask=storageRef.child('Imagenes_Producto/'+imagenASubir.name).put(imagenASubir);
    document.getElementById("progreso").className="";

uploadTask.on('state_changed',
    function (snapshot){
        var barraProgreso=(snapshot.bytesTransferred/ snapshot.totalBytes)*100;
       document.getElementById("barra-de-progreso").style.width=barraProgreso+ "%";
       
    },
    function (error){
        alert("hubo un error");

    },
    function (){
         downloadURL=uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
         console.log("File available at", downloadURL);
          self.image_url=downloadURL;
          document.getElementById("progreso").className="hidden";
        });
        
    });
}

// Add Data
$('#agregarProducto').on('click', function(){

    var values = $("#addProducto").serializeArray();
    var Nombre = values[0].value;
    var Precio  = values[1].value;
    var Url_Image=self.image_url;
    

    firebase.database().ref('Establecimiento/jbuywbeijwnvkj/producto').push({
        
        nombre: Nombre,
        precio: Precio,
        urlImagen:Url_Image,
    });

    // Reassign lastID value
    
    $("#addProducto input").val("");
});

</script>
@stop