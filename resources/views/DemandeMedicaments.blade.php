@extends('layouts.app')

@section('content')
<br><br>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css'>
  <div class="container py-3">
    <div class="row">
        <div class="mx-auto col-sm-9">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0"><center>Créer une nouvelle demande</center></h4>
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" method="POST" action="{{ route('demandeMedicaments.store') }}" enctype="multipart/form-data" >
                               @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ville ou Région</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="listeVille">
                                           <option value="null">-- choisir une ville -- </option>
                                          @foreach($resultat as $ligne)
                                           <option>{{$ligne->ville}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Choisissez votre Pharmacie</label>
                                    <div class="col-lg-9">
                                         <select class="form-control js-example-basic-single" id="listeAdresse" name="id_pharmacie">
    </select>
                                    </div>
                                </div>
                                <div class="form-group row" title="Une image de votre quarte d'identité nationale">
                                    <label class="col-lg-3 col-form-label form-control-label">Photo de la carte d'identité nationale ( CIN ) </label>
                                    <div class="col-lg-9">
                                       <div class="custom-file">
          <label class="custom-file-label" id="namecin" for="cininput">Sélectionner une image</label>
          <input type="file" accept="image/*" class="custom-file-input" id="cininput" name="cin" required="true">
          <i style="display: none;" id="msgcin1">Formats valides : jpg, png, svg.</i>
          <i style="display: none;" id="msjFilecin1">L'image ne doit pas dépasser : 4 Mo </i>
            </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image de votre ordonnance</label>
                                    <div class="col-lg-9">
                                        <div class="custom-file">
          <label class="custom-file-label" id="nameFile1" for="customFile1">Sélectionner une image</label>
          <input type="file" accept="image/*" class="custom-file-input" id="customFile1" name="ordonnance" required="true">
          <i style="display: none;" id="msjFile1">Formats valides : jpg, png, svg.</i>
          <i style="display: none;" id="msjFilePeso1">L'image ne doit pas dépasser : 4 Mo</i>
            </div>
                                    </div>
                                </div>
                                <br>
                                <center>
                                 <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="return validationform()" class="btn btn-primary">
                                    {{ __('Envoyer la demande') }}
                                </button>
                            </div>
                        </div></center>                                
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.15.0/lodash.min.js'></script>
<script >
$(".js-example-basic-single").select2();

$(".remote-loading").select2({
  ajax: {
    url: "https://jsonplaceholder.typicode.com/users",
    processResults: function(data) {
      var results = []
      data.forEach(function(i) {
        results.push({
          id: i.name,
          text: i.name
        })
      });

      return {results: results}
    },
    delay: 1000,
  },
});

$("#listeVille" ).change(function() {
  $('#listeAdresse option').remove();
  @foreach($listeAdresse as $ligne)
    if('{{$ligne->ville}}' == $("#listeVille" ).val()){
      $('#listeAdresse').append(new Option('{{$ligne->adresse}}', '{{$ligne->id}}'));
}
  @endforeach
});

// Primero capturamos la imagen, o archivo.
    var archivo = document.getElementById('customFile1');

    archivo.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length){
            return;
        }
        createImage(files[0]);
    });
    
    // Esta funcion practicamente se explica sola.

    function createImage(file) {
        var exten = file.type;
        var peso = file.size;
        // Si quieres agregar una extención más para validar solo agregala.
        if(exten == 'image/jpeg' || exten == 'image/png' || exten == 'image/svg')
        {
            // Si quieres cambiar el peso máximo para la imagen solo edita los números.
            if(peso > 6000000)
            {
                colorInputImagen();
                siPesoExede();
            }else{
                siTodoBien(file.name)
            }
        }else{
            colorInputImagen()
            siFormatoError();
        }
    };
    
    // Funciones que se utilizaran para los colores y los mensajes.

    function colorInputImagen(){
        document.getElementById('nameFile1').style.cssText="border: solid 1px red;"
        setTimeout(() => {
        document.getElementById('nameFile1').style.cssText="border: solid 1px #DFDFDF;"
        },3000)
    };

    function siFormatoError(){
        document.getElementById('msjFile1').style.cssText="color: red; display: block";
        document.getElementById('msjFilePeso1').style.cssText="display: none";
        document.getElementById('nameFile1').innerHTML = '';
        document.getElementById('customFile1').value = '';
    };

    function siPesoExede(){
        document.getElementById('customFile1').value = '';
        document.getElementById('nameFile1').innerHTML = '';
        document.getElementById('msjFile1').style.cssText="display: none";
        document.getElementById('msjFilePeso1').style.cssText="display: block; color: red";
    };

    function siTodoBien(nombre){
        document.getElementById('nameFile1').innerHTML = nombre;
        document.getElementById('msjFile1').style.cssText="display: none";
        document.getElementById('msjFilePeso1').style.cssText="display: none";
    }


    // Primero capturamos la imagen, o archivo.
    var archivo2 = document.getElementById('cininput');

    archivo2.addEventListener('change', function(e) {
        var file = e.target.files[0];
        var files = e.target.files || e.dataTransfer.files;
        if (!files.length){
            return;
        }
        createImage2(files[0]);
    });
    
    // Esta funcion practicamente se explica sola.

    function createImage2(file) {
        var exten = file.type;
        var peso = file.size;
        // Si quieres agregar una extención más para validar solo agregala.
        if(exten == 'image/jpeg' || exten == 'image/png' || exten == 'image/svg')
        {
            // Si quieres cambiar el peso máximo para la imagen solo edita los números.
            if(peso > 6000000)
            {
                colorInputImagen2();
                siPesoExede2();
            }else{
                siTodoBien2(file.name)
            }
        }else{
            colorInputImagen2(); 
            siFormatoError2();
        }
    };
    
    // Funciones que se utilizaran para los colores y los mensajes.

    function colorInputImagen2(){
        document.getElementById('namecin').style.cssText="border: solid 1px red;"
        setTimeout(() => {
        document.getElementById('namecin').style.cssText="border: solid 1px #DFDFDF;"
        },3000)
    };

    function siFormatoError2(){
        document.getElementById('msgcin1').style.cssText="color: red; display: block";
        document.getElementById('msjFilecin1').style.cssText="display: none";
        document.getElementById('namecin').innerHTML = '';
        document.getElementById('customFile1').value = '';
    };

    function siPesoExede2(){
        document.getElementById('customFile1').value = '';
        document.getElementById('namecin').innerHTML = '';
        document.getElementById('msgcin1').style.cssText="display: none";
        document.getElementById('msjFilecin1').style.cssText="display: block; color: red";
    };

    function siTodoBien2(nombre){
        document.getElementById('namecin').innerHTML = nombre;
        document.getElementById('msgcin1').style.cssText="display: none";
        document.getElementById('msjFilecin1').style.cssText="display: none";
    }


    function validationform(){
        var selectedCountry = $('#listeVille').children("option:selected"). val();
        if(selectedCountry == "null"){
            alert('Merci de sélection une ville ou une région'); 
            return false ; 
        }
        return true ; 
    }
</script>
@endsection 