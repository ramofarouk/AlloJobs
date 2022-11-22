@extends('layouts.back_base')
@section('title')
Liste des Soumissions
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
						<li class="breadcrumb-item active">Soumissions</li>
					</ol>
				</div>
				<h4 class="page-title">Liste des Soumissions</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="header-title">Liste des Soumissions</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th></th>
								<th>Nom Complet</th>
								<th>Entreprise</th>
								<th>CV</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($soumissions as $soumission)
							<tr>
								<td>
									<a href="{{ $soumission->demandeur->avatar }}" target="_blank"><img alt="{{$soumission->demandeur->nom}}" width="75" height="75" src="{{ $soumission->demandeur->avatar }}" class="rounded-circle"></a>
								</td>
								<td>{{$soumission->demandeur->nom}} {{$soumission->demandeur->prenoms}}</td>
								<td>{{$soumission->entreprise->nom}}</td>
								<td>{{$soumission->cv}}</td>
								<td>
									
								</td>
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