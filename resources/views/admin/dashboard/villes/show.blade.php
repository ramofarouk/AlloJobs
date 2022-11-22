@extends('layouts.back_base')
@section('title')
Liste des Villes
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
						<li class="breadcrumb-item active">Villes</li>
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

					<h4 class="header-title">Villes</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th>Nom</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($villes as $ville)
							<tr>
								<td>{{$ville->libelle}}</td>
								<td>
									<a href="/admin/villes/edit/{{$ville->id}}"  class="btn btn-info">
										<i class="fe-edit"></i>
									</a>
									<button class="btn btn-danger" type="button" data-bs-toggle="modal"
									data-bs-target="#deleteCard{{$ville->id}}">
									<i class="fe-trash"></i>
								</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteCard{{$ville->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Etes-vous sûr de supprimer la ville {{$ville->libelle}} ?</p>
									</div>
									<div class="modal-footer bg-whitesmoke br">

										<button type="button" class="btn btn-danger" style="color:white;" data-bs-dismiss="modal">Fermer</button>
										<a href="/admin/villes/delete/{{$ville->id}}"
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