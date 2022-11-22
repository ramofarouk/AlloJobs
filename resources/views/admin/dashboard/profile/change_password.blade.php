@extends('layouts.back_base')
@section('title')
Modification du mot de passe
@endsection
@section('content')
<div class="container-fluid">
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box">
				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/admin/dashboard">Accueil</a></li>
						<li class="breadcrumb-item active">Modification du mot de passe</li>
					</ol>
				</div>
				<h4 class="page-title">Modification du mot de passe</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">Modification du mot de passe</h4>

					<form action="/admin/change-password" method="POST">
						 {{ csrf_field() }}
						 <div class="mb-3">
							<label for="c_password" class="form-label">Mot de passe Actuel<span class="text-danger">*</span></label>
							<input type="password" name="c_password" required placeholder="Mot de passe" class="form-control" id="c_password" />
						</div>
						<div class="mb-3">
							<label for="n_password" class="form-label">Nouveau Mot de passe<span class="text-danger">*</span></label>
							<input type="password" name="n_password" required placeholder="Mot de passe" class="form-control" id="n_password" />
						</div>
						<div class="mb-3">
							<label for="cn_password" class="form-label">Confirmation<span class="text-danger">*</span></label>
							<input type="password" name="cn_password" required placeholder="Confirmation" class="form-control" id="cn_password" />
						</div>

						<div class="text-end">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Modifier</button>
						</div>
					</form>
				</div>
			</div> <!-- end card -->
		</div>
	</div>
</div>
@endsection

