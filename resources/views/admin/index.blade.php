@extends('layouts.auth_base_admin')
@section('title')
Connexion
@endsection
@section('content')
<div class="col-md-8 col-lg-6 col-xl-4">
  <div class="card bg-pattern">

    <div class="card-body p-4">

      <div class="text-center w-75 m-auto">
        <div class="auth-logo">
            <a href="/" class="logo logo-dark text-center">
                <span class="logo-lg">
                  <img src="{{ asset('assets/images/logo_.png')}}" class="rounded-circle border" alt="" height="100">
              </span>
          </a>

          <a href="/" class="logo logo-light text-center">
            <span class="logo-lg">
              <img src="{{ asset('assets/images/logo_.png')}}" alt="" height="22">
          </span>
      </a>
  </div>
  <p class="text-muted mb-4 mt-3">Entrez votre adresse email et votre mot de passe pour accéder au panneau d'administration.</p>
</div>

<form action="/admin/login" method="POST">
    {{ csrf_field() }}
    <div class="mb-3">
      <label for="emailaddress" class="form-label">Email</label>
      <input class="form-control" type="email" name="email" id="emailaddress" required placeholder="Tapez votre adresse email" >
  </div>

  <div class="mb-3">
      <label for="password" class="form-label">Mot de passe</label>
      <div class="input-group input-group-merge">
        <input type="password" id="password" class="form-control" name="password" placeholder="Tapez votre mot de passe" required>
        <div class="input-group-text" data-password="false">
          <span class="password-eye"></span>
      </div>
  </div>
</div>

<div class="mb-3">
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
    <label class="form-check-label" for="checkbox-signin">Se rappeler de moi</label>
</div>
</div>

<div class="text-center d-grid">
  <button class="btn btn-primary" type="submit">  Se Connecter </button>
</div>

</form>

</div> <!-- end card-body -->
</div>
<!-- end card -->
<!-- end row -->

</div> <!-- end col -->
@endsection
