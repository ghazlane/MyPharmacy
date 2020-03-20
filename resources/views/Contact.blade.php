@extends('layouts.app')

@section('content')
  <section class="resume-section p-4 p-lg-5 text-center" id="contact">
        <div class="my-auto">
          <h1 class="mb-4" style="color: blue;">Information de contact</h1>
<br>
          <ul class="fa-ul mb-4 ml-0">
            <li id="mail-address">
<!--               Replace with your email address -->
                <i class="fas fa-envelope-open mr-2 contact-icons"></i
                ><strong>med.ghazlane@gmail.com</strong></a
              >
            </li>
            <li>
              <i class="fas fa-mobile-alt mr-2 contact-icons"></i><strong>+212604680173</strong>
            </li>
            <li>
              <i class="fas fa-map-marker-alt mr-2 contact-icons"></i><strong> 
Ma pharmacie
Rabat, Maroc</strong>
            </li>
          </ul>

          <p>
            Merci de remplir le formulaire suivant pour prendre en considération votre message.
          </p>

<form class="contact-form d-flex flex-column align-items-center" role="form" method="POST" action="{{ route('contact.store') }}">
                               @csrf
            <div class="form-group w-75">        
 <div class="row">
    <div class="col">
         <input
                type="text"
                class="form-control"
                placeholder="Nom"
                name="nom"
                required
              />
    </div>
    <div class="col">
         <input
                type="text"
                class="form-control"
                placeholder="Prenom"
                name="prenom"
                required
              />
    </div>
  </div>
</div>
            <div class="form-group w-75">
              <input
                type="email"
                class="form-control"
                placeholder="Email@email.com"
                name="email"
                required
              />
            </div>

            <div class="form-group w-75">
              <textarea
                class="form-control"
                type="text"
                placeholder="Message"
                rows="7"
                name="message"
                required
              ></textarea>
            </div>

            <button type="submit" class="btn btn-submit btn-info w-25">Envoyer</button>
          </form>
        </div>
      </section>
@endsection 