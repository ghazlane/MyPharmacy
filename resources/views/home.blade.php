
@extends('layouts.app')

@section('content')


  <!-- Header - set the background image for the header in the line below -->
  <header class="py-5 bg-image-full" style="background-image: url('{{asset('/images/img1.jpg')}}');  height: 300px;" >
    
  </header>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Ma pharmacie</h1>
      <p class="lead">Ma pharmacie est la solution qui vous permet d'avoir des informations sur la queu des pharmacies au maroc.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    </div>
  </section>

  <!-- Image Section - set the background image for the header in the line below -->
  <section class="py-5 bg-image-full" style="background-image: url({{asset('/images/img2.jpg')}}); height: 400px;">
    <!-- Put anything you want here! There is just a spacer below for demo purposes! -->
    <div style="height: 200px;"></div>
  </section>

  <!-- Content section -->
  <section class="py-5">
    <div class="container">
      <h1>Pharmacie en ligne</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, suscipit, rerum quos facilis repellat architecto commodi officia atque nemo facere eum non illo voluptatem quae delectus odit vel itaque amet.</p>
    </div>
  </section>







  <!-- Page Content -->
  <div class="container">

    

    <!-- Page Features -->
    <div class="row text-center">

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('/images/card1.png')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Coronavirus</h4>
            <p class="card-text">Genre de virus à ARN responsable d'infections respiratoires et digestives chez plusieurs espèces de mammifères dont l'être humain.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('/images/card2.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Institut Pasteur</h4>
            <p class="card-text">L’institut Pasteur est une fondation française privée à but non lucratif qui se consacre à l'étude de la biologie, des micro-organismes, des maladies et des vaccins.</p>
          </div>
          <div class="card-footer">
            <a href="http://www.pasteur.ma/" class="btn btn-primary">Plus d'info!</a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('/images/card3.png')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Pharmacies au maroc</h4>
            <p class="card-text">Le maroc dispose d'environ 12000 pharmacies d’officines couvrant l’ensemble du
territoire marocain</p>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('/images/card4.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">Conspmmation et produictivité</h4>
            <p class="card-text">65 % des médicaments consommés en unités au Maroc sont fabriqués
localement.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Plus d'info !</a>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>

@endsection 
