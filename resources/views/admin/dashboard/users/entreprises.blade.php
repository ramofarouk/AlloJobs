@extends('layouts.back_base')
@section('title')
Liste des Entreprises
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
						<li class="breadcrumb-item active">Entreprises</li>
					</ol>
				</div>
				<h4 class="page-title">Liste des Entreprises</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="header-title">Liste des Entreprises</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Téléphone</th>
								<th>Email</th>
								<th>Ville</th>
								<th>Secteur d'activité</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$user->nom}}</td>
								<td>{{$user->telephone}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->ville}}</td>
								<td>{{$user->activite}}</td>
								<td>
									@if($user->status == 1)
									<button class="btn btn-ino" type="button" data-bs-toggle="modal"
									data-bs-target="#viewCard{{$user->id}}">
									<i class="fe-eye "></i>
								</button>
								@endif
								@if($user->status==0)
									<button class="btn btn-success" type="button" data-bs-toggle="modal"
									data-bs-target="#checkCard{{$user->id}}">
									<i class="fe-check"></i>
								</button>
								@endif
								
						</td>
					</tr>
					<div class="modal fade" id="checkCard{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Validation</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Etes-vous sûr de valider ce profil?</p>
									</div>
									<div class="modal-footer bg-whitesmoke br">

										<button type="button" class="btn btn-danger" style="color:white;" data-bs-dismiss="modal">Fermer</button>
										<a href="/admin/entreprises/validate/{{$user->id}}"
											class="btn btn-success"> Oui</a>
										</div>
									</div>
								</div>
							</div>
					<div class="modal fade" id="viewCard{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header" style="background-color: #6EBD46;">
									<h5 class="modal-title" id="exampleModalLabel" style="color: white;">Identifiants</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body" style="padding: 0px;">
									<div style="background-color: #6EBD46;width: 97%;border-radius: 5px;margin: 10px">
										<center style="color: white;">
											Téléphone : <b>{{$user->telephone}}</b><br>
											Mot de passe : <b>{{$user->password_visible}}</b>
										</center>
									</div>
								</div>
								<div class="modal-footer bg-whitesmoke br" style="background-color: #6EBD46;"><button type="button" class="btn btn-warning" style="color: #6EBD46;background-color: white;border-color: #6EBD46;" data-bs-dismiss="modal">Fermer</button></div>
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