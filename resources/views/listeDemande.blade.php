@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
* {box-sizing: border-box;}

.img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}

</style>
</head>
<body>

<div class="container">
  <p>Type something in the input field to search the table for first names, last names or emails:</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Date demande</th>
        <th>Etat demande</th>
        <th>Heure</th>
        <th>Ordonnance</th>
        <th>Cin</th>
        <th>Opération</th>
      </tr>
    </thead>
    <tbody id="myTable">
     @foreach($listeDemande as $ligne)
      <tr>
        <td>{{$ligne->date_demande}}</td>
        <td><center>
          @if($ligne->etat_demande == 'Prête')
          <button type="button" class="btn btn-success btn-sm">Prête</button>
          
          @else 
          <button type="button" class="btn btn-info btn-sm">En cours</button>
          @endif
          </center>
        </td>              
        <td>{{$ligne->heure_retour}}</td>
        <!-- <td> <a href="{{url('viewCin/'.$ligne->cin) }}">cin</a></td>-->
        
        <!--{{ asset('file/cin/'.$ligne->cin) }}-->
        <td><a data-toggle="modal" data-target=".bd-example-modal-lg2" href="#" onclick="changeImageOrdonnance('{{$ligne->ordonnance}}')">Ordonnance</a></td>
        <td><a data-toggle="modal" data-target=".bd-example-modal-lg" href="#" onclick="changeImageCin('{{$ligne->cin}}')">CIN</a></td>
        <td><center>
          <button type="button" class="btn btn-outline-danger" style="padding: 4px;">
            <a href="{{url('deleteDemande').'/'.$ligne->id_demande}}" onclick="return confirm('Voulez-vous vraiment supprimer cette demande');" style=" color: red;" title="supprimer la demande" ><i class="far fa-trash-alt"></i></a> 
          </button>

          <button style="padding: 4px;margin-left: 10px;" type="button" class="btn btn-outline-success">
            <a href="{{url('validateDemande').'/'.$ligne->id_demande}}"  onclick="return confirm('Voulez-vous vraiment valider cette demande');"  style="color: green;" title="Valider la demande"><i class="fas fa-check-circle"></i></a></button>
        </center>
      </td>
      </tr>
    @endforeach
    </tbody>
  </table>
 

</div>

<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="img-magnifier-container" style="margin: auto;">
          <img id="myimage" src="{{ asset('file/cin/'.$ligne->cin) }}">
      </div>
    </div>
  </div>
</div>


<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="img-magnifier-container" style="margin: auto;">
          <img id="myimage2" src="{{ asset('file/cin/'.$ligne->cin) }}" >
      </div>
    </div>
  </div>
</div>


<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/

</script>

<script type="text/javascript">
  function changeImageCin($image){
    //alert('hello'); 
    $('#myimage').attr("src", ''); 
    $nouvelleImgae = '{{ asset('file/cin/') }}' + '/' + $image; 
   // alert($nouvelleImgae); 
    $('#myimage').attr("src", $nouvelleImgae); 
    magnify("myimage", 3);
  }
   function changeImageOrdonnance($image){
    //alert('hello'); 
    $('#myimage2').attr("src", ''); 
    $nouvelleImgae = '{{ asset('file/ordonnance/') }}' + '/' + $image; 
   // alert($nouvelleImgae); 
    $('#myimage2').attr("src", $nouvelleImgae);
    magnify("myimage2", 3);
  }
</script>


<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</body>
</html>

 
@endsection 