@extends('layouts.app')

@section('content')

<br><br><br>

  <div class="container">

     <main class="py-4">
        
<div class="card text-center">
  <div class="card-header">
   <strong> votre demande est prise en charge</strong> 
  </div>
  <div class="card-body">
    <h2 class="card-title">L'heure exacte pour prendre votre commande</h2><center><br>
    <div class="alert alert-success" role="alert" style="width: 40%; ">
         <h2>{{$date_retour_finale}}</h2> 
</div></center>
    <p class="card-text">Si vous avez des questions contactez-nous.</p>
    <a href="{{url('/Contact') }}" class="btn btn-primary">Contactez-nous</a>
  </div>
  <div class="card-footer text-muted">Pour plus d'informations sur votre demande utilisé le numéro suivant : 
   <strong> {{$id_last_demande}}</strong>
  </div>
</div>
</main>
  </div>

@endsection 