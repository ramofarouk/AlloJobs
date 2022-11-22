@extends('layouts.back_base')
@section('title')
Ajouter un point
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
						<li class="breadcrumb-item"><a href="/admin/points">Points</a></li>
						<li class="breadcrumb-item active">Ajouter</li>
					</ol>
				</div>
				<h4 class="page-title">Points</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">Ajouter un point</h4>

					<form method="POST" action="/admin/points/add" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="nom" class="form-label">Nom du point<span class="text-danger">*</span></label>
									<input type="text" name="nom" required placeholder="Nom du point" class="form-control" id="nom" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="nom" class="form-label">Ville<span class="text-danger">*</span></label>
									<select name="ville" required class="form-control">
										@foreach($villes as $ville)
										<option value="{{ $ville->id }}">{{ $ville->libelle }}</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="latitude" class="form-label">Latitude<span class="text-danger">*</span></label>
									<input type="text" name="latitude"  placeholder="Latitude" class="form-control" id="latitude" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="longitude" class="form-label">Longitude<span class="text-danger">*</span></label>
									<input type="text" name="longitude"  placeholder="Longitude" class="form-control" id="longitude" />
								</div>
							</div>
						</div>
					
						<div class="text-end">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Ajouter</button>
						</div>
					</div>
				</form>
			</div>
		</div> <!-- end card -->
	</div>
</div>
</div>
@endsection

