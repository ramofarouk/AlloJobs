@extends('layouts.back_base')
@section('title')
Editer un paramètre
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
						<li class="breadcrumb-item"><a href="/admin/parametres">Paramètres</a></li>
						<li class="breadcrumb-item active">Editer</li>
					</ol>
				</div>
				<h4 class="page-title">Paramètres</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">Editer un paramètre</h4>

					<form method="POST" action="/admin/parametres/edit/{{ $parametre->id }}">
						 {{ csrf_field() }}
						<div class="mb-3">
							<label for="libelle" class="form-label">Libellé<span class="text-danger">*</span></label>
							<input type="text" name="libelle" required placeholder="Libellé" value="{{ $parametre->libelle }}" class="form-control" id="libelle" />
						</div>
						<div class="mb-3">
							<label for="valeur" class="form-label">Valeur<span class="text-danger">*</span></label>
							<input type="text" name="valeur" required placeholder="Valeur" value="{{ $parametre->valeur }}" class="form-control" id="valeur" />
						</div>

						<div class="text-end">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Editer</button>
						</div>
					</form>
				</div>
			</div> <!-- end card -->
		</div>
	</div>
</div>
@endsection

