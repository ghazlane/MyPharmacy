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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirler mot de passe') }}</label>

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
               


                                <input id="localisation_d" type="text" class="form-control @error('localisation_d') is-invalid @enderror" name="localisation_d" value="{{ old('localisation_d') }}" required autocomplete="localisation_d" autofocus hidden="true">

                                <input id="localisation_g" type="text" hidden="true" class="form-control @error('localisation_g') is-invalid @enderror" name="localisation_g" value="{{ old('localisation_g') }}" required autocomplete="localisation_g" autofocus>
                            
<br> 
<div style="width: 100%; height: 500px;">
    
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          Adresse de la pharmacie
        </div>
        <div id="type-selector" class="pac-controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">Tous</label>

          <label for="changetype-establishment" hidden="true">Establishments</label>

          <label for="changetype-address" hidden="true">Addresses</label>

          <label for="changetype-geocode" hidden="true">Geocodes</label>
        </div>
        <div id="strict-bounds-selector" class="pac-controls">
          <label for="use-strict-bounds" hidden="true">Strict Bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text"
            placeholder="Enter a location" name="adresse">
      </div>
    </div>
    <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>

    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');
        var options = {
  types: ['(cities)'],
  componentRestrictions: {country: "ma"}
 };

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input,options);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
            document.getElementById('localisation_d').value = place.geometry.location.lng(); 
            document.getElementById('localisation_g').value = place.geometry.location.lat(); 
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_gxHxXr6QeB71Nfqrgzkrd6zqrH_JBu8&libraries=places&callback=initMap"
        async defer></script>
</div>

                     <br><br>   <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <center>{{ __('Créer un compte') }}</center>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
