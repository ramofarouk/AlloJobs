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
								<td><a target="_blank" class="btn btn-info" href="{{$soumission->cv}}">Voir le CV</a></td>
								<td>
									@if($soumission->status==0)
									<button class="btn btn-success" type="button" data-bs-toggle="modal"
									data-bs-target="#checkCard{{$soumission->id}}">
									<i class="fe-check"></i>
								</button>
								@endif
							</td>
						</tr>
						<div class="modal fade" id="checkCard{{$soumission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Validation</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Etes-vous sûr d'envoyer un message d'acceptation au candidat?</p>
									</div>
									<div class="modal-footer bg-whitesmoke br">

										<button type="button" class="btn btn-danger" style="color:white;" data-bs-dismiss="modal">Fermer</button>
										<a href="/admin/soumissions/validate/{{$soumission->id}}"
											class="btn btn-success"> Oui</a>
										</div>
									</div>
								</div>
							</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
@endsection