<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ma pharmacie</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css'>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css'>
  <link rel="stylesheet" type="text/css" href="{{asset('css/footer.css')}}">
</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" style="color : #4EF334;" href="{{ url('Accueil') }}"><img src="{{asset('logo/logo.png')}}" alt="" style="width: 35px; height: 35px; padding:0 ; margin: 0;"> &nbsp;Ma pharmacie</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item {{(Request::segment(1) == 'Accueil' ) ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/Accueil') }}">Accueil</a>
          </li>
            @if(auth()->guest())
             <li class="nav-item {{(Request::segment(1) == 'DemandeMedicaments') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/DemandeMedicaments') }}">Demande des médicaments</a>
          </li>
          @else
           <li class="nav-item {{(Request::segment(1) == 'ListeDemandes') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/ListeDemandes')}}">Liste des demandes</a>
          </li>
          @endif
          <li class="nav-item {{(Request::segment(1) == 'Services') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/Services') }}">Services</a>
          </li>
          <li class="nav-item {{(Request::segment(1) == 'Contact') ? 'active' : null }}">
            <a class="nav-link" href="{{ url('/Contact') }}">Contact</a>
          </li>
          @if(auth()->guest())
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pharmacie
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('register') }}">Créer un compte</a>
          <a class="dropdown-item" href="{{ route('login') }}">Se connecter</a>
       </div>
        </li>
        @else
             <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->telephone_fixe }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                </div>
               </li>
        @endif
        </ul>
      </div>
    </div>
  </nav>
<br><br>
  <!-- Page Content -->
            @yield('content')

 <footer class="footer-distributed">
      <div class="footer-left">
        <h3>Ma<span style="color: green;">Pharmacie </span></h3>
        <p class="footer-links">
          <a href="{{ url('/Accueil') }}">Accueil</a>
          ·
           @if(auth()->guest())
          <a href="{{ url('/ListeDemandes')}}">Demande des médicaments</a>
          @else
          <a href="{{ url('/DemandeMedicaments') }}">Liste des demandes</a>
          @endif
          .
          <a href="{{ url('/Services') }}">Services</a>
          ·
          <a href="{{ url('/Contact') }}">Contact</a>
        </p>
        <p class="footer-company-name">Tous droits réservés &copy; 2020</p>
      </div>

      <div class="footer-center">
        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Ma pharmacie </span> Casablanca, Maroc</p>
        </div>
        <div>
          <i class="fa fa-phone"></i>
          <p>(+212) 06 04 68 01 73</p>
        </div>
        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:support@company.com">mapharmacie@gmail.com</a></p>
        </div>
      </div>
      <div class="footer-right">
        <p class="footer-company-about">
          <img src="{{asset('logo/logo.png')}}" alt="" style="width: 120px; height: 150px; padding:0 ; margin: 0;">
        </p>

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="https://pharmacie.ma/"><i class="fa fa-plus"></i></a>

        </div>

      </div>

    </footer>

  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>





