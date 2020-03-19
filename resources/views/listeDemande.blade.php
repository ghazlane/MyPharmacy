@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap Table - Filter control</title>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>


</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">


<table id="table" 
       data-toggle="table"
       data-search="true"
       data-filter-control="true" 
       data-show-export="false"
       data-click-to-select="false"
       data-toolbar="#toolbar">
  <thead>
    <tr>
      <th data-field="prenom" data-filter-control="input" data-sortable="true">Date demande</th>
      <th data-field="date" data-filter-control="input" data-sortable="true">Etat demande</th>
      <th data-field="examen" data-filter-control="input" data-sortable="true">Heure retour</th>
      <th data-field="cin" data-sortable="true">Cin</th>
      <th data-field="ordonnance" data-sortable="true">Ordonnance</th>
      <th data-field="operation" data-sortable="true">Opération</th>
    </tr>
  </thead>
  <tbody>
    @foreach($listeDemande as $ligne)
      <tr>
        <td>{{$ligne->date_demande}}</td>
        <td>{{$ligne->etat_demande}}</td>
        <td>{{$ligne->heure_retour}}</td>
        <td>{{$ligne->cin}}</td>
        <td>ordonnace</td>
        <td>{{$ligne->id_demande}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>
<script type="text/javascript">
  //exporte les données sélectionnées
var $table = $('#table');
    $(function () {
        $('#toolbar').find('select').change(function () {
            $table.bootstrapTable('refreshOptions', {
                exportDataType: $(this).val()
            });
        });
    })

    var trBoldBlue = $("table");

  $(trBoldBlue).on("click", "tr", function (){
      $(this).toggleClass("bold-blue");
  });
</script>
</body>
</html>


@endsection 