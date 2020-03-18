@extends('layouts.app')

@section('content')


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
                            <form class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ville</label>
                                    <div class="col-lg-9">
                                        <select class="form-control" id="listeVille">
                                           <option>-- choisir une ville -- </option>
                                          @foreach($resultat as $ligne)
                                           <option>{{$ligne->ville}}</option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Choisissez votre Pharmacie</label>
                                    <div class="col-lg-9">
                                         <select class="form-control js-example-basic-single" id="listeAdresse">
                                          
     
    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Numéro de la carte d'identité nationale ( CIN ) </label>
                                    <div class="col-lg-9">
                                       <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile" name="cin">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Ordonnance</label>
                                    <div class="col-lg-9">
                                        <div class="custom-file">
  <input type="file" class="custom-file-input" id="customFile" name="ordonnance">
  <label class="custom-file-label" for="customFile">Choose file</label>
</div>
                                    </div>
                                </div>

                                
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
</script>
@endsection 