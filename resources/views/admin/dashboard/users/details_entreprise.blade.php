@extends('layouts.back_base')
@section('title')
Liste des Offres
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
						<li class="breadcrumb-item"><a href="/admin/entreprises">Entreprises</a></li>
						<li class="breadcrumb-item active">{{ $entreprise->nom }}</li>
					</ol>
				</div>
				<h4 class="page-title">Liste des Offres</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="header-title">Liste des Offres</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th>Job</th>
								<th>Date de début</th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							@foreach($offres as $offre)
							<tr>
								<td>{{$offre->job}}</td>
								<td>{{$offre->date_debut}}</td>
								<td>{{$offre->description}}</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection