@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="num_ordre" class="col-md-4 col-form-label text-md-right">{{ __('Numéro ordre') }}</label>

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
                            <label for="localisation_d" class="col-md-4 col-form-label text-md-right">{{ __('Localisation D') }}</label>

                            <div class="col-md-6">
                                <input id="localisation_d" type="text" class="form-control @error('localisation_d') is-invalid @enderror" name="localisation_d" value="{{ old('localisation_d') }}" required autocomplete="localisation_d" autofocus>

                                @error('localisation_d')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="form-group row">
                            <label for="localisation_g" class="col-md-4 col-form-label text-md-right">{{ __('Localisation G') }}</label>

                            <div class="col-md-6">
                                <input id="localisation_g" type="text" class="form-control @error('localisation_g') is-invalid @enderror" name="localisation_g" value="{{ old('localisation_g') }}" required autocomplete="localisation_g" autofocus>

                                @error('localisation_g')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('categorie') }}</label>

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
                            <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('categorie') }}</label>

                            <div class="col-md-6">
                                <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">

                                @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
