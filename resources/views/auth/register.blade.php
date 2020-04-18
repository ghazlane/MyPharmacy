@extends('layouts.app')

@section('content')
<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      #title {
        color: #fff;
        background-color: #4d90fe;
        font-size: 25px;
        font-weight: 500;
        padding: 6px 12px;
      }
    </style>

<div class="container">
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-10" >
            <div class="card">
                <div class="card-header"><center><strong>{{ __('Créer un nouveau compte') }}</strong></center></div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label title="Ce champ est obligatoire ! Ce champ sera validé avant la création du compte" for="num_ordre" class="col-md-4 col-form-label text-md-right">{{ __('Numéro d\'ordre de la pharmacie') }}</label>
                            <div class="col-md-6">
                                <input id="num_ordre" type="text" class="form-control @error('num_ordre') is-invalid @enderror" name="num_ordre" value="{{ old('num_ordre') }}" required autocomplete="num_ordre" autofocus>

                                @error('num_ordre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone_fixe" class="col-md-4 col-form-label text-md-right">{{ __('Numéro de téléphone (Fixe) ') }}</label>

                            <div class="col-md-6">
                                <input id="telephone_fixe" type="text" class="form-control @error('telephone_fixe') is-invalid @enderror" name="telephone_fixe" value="{{ old('telephone_fixe') }}" required autocomplete="telephone_fixe" autofocus>

                                @error('telephone_fixe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row" title="commencez s'il vous plaît par le nom ">
                            <label for="nom_prenom_pharmacien" class="col-md-4 col-form-label text-md-right">{{ __('Cotre Nom et Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="nom_prenom_pharmacien" type="text" class="form-control @error('nom_prenom_pharmacien') is-invalid @enderror" name="nom_prenom_pharmacien" value="{{ old('nom_prenom_pharmacien') }}" required autocomplete="nom_prenom_pharmacien" autofocus>

                                @error('nom_prenom_pharmacien')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Catégorie') }}</label>

                            <div class="col-md-6">
                                <input id="categorie" type="text" class="form-control @error('categorie') is-invalid @enderror" name="categorie" value="{{ old('categorie') }}" required autocomplete="categorie">

                                @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                           <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe ') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                                <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        


       <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville ou Région') }}</label>

                            <div class="col-md-6">
                                  <select id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">
                                    <option value="Tanger-Tétouan-Al Hoceïma">Tanger-Tétouan-Al Hoceïma</option>
                                    <option value="Oriental">Oriental </option>
                                    <option value="Fès-Meknès">Fès-Meknès</option>
                                    <option value="Rabat-Salé-Kénitra">Rabat-Salé-Kénitra</option>
                                    <option value="Béni Mellal-Khénifra">Béni Mellal-Khénifra</option>
                                    <option value="Casablanca-Settat">Casablanca-Settat</option>
                                    <option value="Marrakech-Safi">Marrakech-Safi</option>
                                    <option value="Drâa-Tafilalet">Drâa-Tafilalet</option>
                                    <option value="Souss-Massa">Souss-Massa</option>
                                    <option value="Guelmim-Oued Noun">Guelmim-Oued Noun</option>
                                    <option value="Laâyoune-Sakia El Hamra">Laâyoune-Sakia El Hamra</option>
                                    <option value="Dakhla-Oued Ed Dahab">Dakhla-Oued Ed Dahab</option>
                                </select>
                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Adresse compléte ') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
               


                                <input id="localisation_d" type="text" class="form-control @error('localisation_d') is-invalid @enderror" name="localisation_d" autocomplete="localisation_d" autofocus hidden="true" value="0.0">

                                <input id="localisation_g" type="text" hidden="true" class="form-control @error('localisation_g') is-invalid @enderror" name="localisation_g"  autocomplete="localisation_g" autofocus value="0.0">

                                
                            

                     <br>  <center><div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Créer un compte') }}
                                </button>
                            </div>
                        </div></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
