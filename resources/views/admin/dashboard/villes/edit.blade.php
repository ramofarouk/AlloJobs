@extends('layouts.back_base')
@section('title')
Editer une ville
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
						<li class="breadcrumb-item"><a href="/admin/villes">Villes</a></li>
						<li class="breadcrumb-item active">Editer</li>
					</ol>
				</div>
				<h4 class="page-title">Villes</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">Editer une ville</h4>

					<form method="POST" action="/admin/villes/edit/{{ $ville->id }}">
						 {{ csrf_field() }}
						<div class="mb-3">
							<label for="libelle" class="form-label">Nom de la ville<span class="text-danger">*</span></label>
							<input type="text" name="libelle" required placeholder="Nom de la ville" value="{{ $ville->libelle }}" class="form-control" id="libelle" />
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

