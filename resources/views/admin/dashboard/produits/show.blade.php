@extends('layouts.back_base')
@section('title')
Liste des Produits
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
						<li class="breadcrumb-item active">Produits</li>
					</ol>
				</div>
				<h4 class="page-title">Produits</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="header-title">Produits</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
						<thead>
							<tr>
								<th></th>
								<th>Nom</th>
								<th>Accompte</th>
								<th>Journalier</th>
								<th>Durée</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($produits as $produit)
							<tr>
								<td>
									<a href="{{ $produit->photo }}" target="_blank"><img alt="{{$produit->nom}}" width="100" height="50" src="{{ $produit->photo }}" class="rounded"></a>
								</td>
								<td>{{$produit->nom}}</td>
								<td>{{$produit->accompte}} Fcfa</td>
								<td>{{$produit->journalier}} Fcfa</td>
								<td>{{$produit->duree}}</td>

								<td>
									<a href="/admin/produits/edit/{{$produit->id}}"  class="btn btn-info">
										<i class="fe-edit"></i>
									</a>
									<button class="btn btn-danger" type="button" data-bs-toggle="modal"
									data-bs-target="#deleteCard{{$produit->id}}">
									<i class="fe-trash"></i>
								</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteCard{{$produit->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
							aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>Etes-vous sûr de supprimer le paramètre {{$produit->name}} ?</p>
									</div>
									<div class="modal-footer bg-whitesmoke br">

										<button type="button" class="btn btn-danger" style="color:white;" data-bs-dismiss="modal">Fermer</button>
										<a href="/admin/produits/delete/{{$produit->id}}"
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