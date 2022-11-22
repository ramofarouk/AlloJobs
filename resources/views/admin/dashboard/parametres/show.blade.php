@extends('layouts.back_base')
@section('title')
Liste des Paramètres
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
						<li class="breadcrumb-item active">Paramètres</li>
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

					<h4 class="header-title">Paramètres</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th>Libellé</th>
								<th>Valeur</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($parametres as $parametre)
							<tr>
								<td>{{$parametre->libelle}}</td>
								<td>{{$parametre->valeur}}</td>
								<td>
									<a href="/admin/parametres/edit/{{$parametre->id}}"  class="btn btn-info">
										<i class="fe-edit"></i>
									</a>
									<button class="btn btn-danger" type="button" data-bs-toggle="modal"
									data-bs-target="#deleteCard{{$parametre->id}}">
									<i class="fe-trash"></i>
								</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteCard{{$parametre->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Etes-vous sûr de supprimer le paramètre {{$parametre->libelle}} ?</p>
									</div>
									<div class="modal-footer bg-whitesmoke br">

										<button type="button" class="btn btn-danger" style="color:white;" data-bs-dismiss="modal">Fermer</button>
										<a href="/admin/parametres/delete/{{$parametre->id}}"
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