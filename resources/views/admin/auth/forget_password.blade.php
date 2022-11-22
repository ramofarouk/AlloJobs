@extends('layouts.auth_base_admin')
@section('title')
Mot de passe oublié ?
@endsection
@section('content')
<div class="col-md-8 col-lg-6 col-xl-4">
    <div class="card bg-pattern">
        <div class="card-body p-4">
            <div class="text-center w-75 m-auto">
                <div class="auth-logo">
                    <a href="/" class="logo logo-dark text-center">
                        <span class="logo-lg">
                          <img src="{{ asset('assets/images/logo_.png')}}" alt="" height="100">
                      </span>
                  </a>

                  <a href="/" class="logo logo-light text-center">
                    <span class="logo-lg">
                      <img src="{{ asset('assets/images/logo-light.png')}}" alt="" height="22">
                  </span>
              </a>
          </div>
          <p class="text-muted mb-4 mt-3">Entrez votre adresse email et nous vous enverrons un mail avec les instructions pour réinitialiser votre mot de passe.</p>
      </div>
      <form method="POST" action="/admin/forget-password">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="emailaddress" class="form-label">Adresse mail</label>
            <input class="form-control" type="email" id="emailaddress" required placeholder="Tapez votre email">
        </div>

        <div class="text-center d-grid">
            <button class="btn btn-primary" type="submit"> Réinitialiser</button>
        </div>
    </form>

</div> <!-- end card-body -->
</div>
<!-- end card -->

<div class="row mt-3">
    <div class="col-12 text-center">
        <p class="text-white-50">Retourner à la page de <a href="/admin/login" class="text-white ms-1"><b>Connexion</b></a></p>
    </div> <!-- end col -->
</div>
<!-- end row -->

</div> <!-- end col -->
@endsection
