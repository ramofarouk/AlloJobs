@extends('layouts.back_base')
@section('title')
Editer un produit
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
						<li class="breadcrumb-item"><a href="/admin/produits">Produits</a></li>
						<li class="breadcrumb-item active">Editer</li>
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
					<h4 class="header-title">Editer un produit</h4>

					<form method="POST" action="/admin/produits/edit/{{ $produit->id }}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="nom" class="form-label">Nom du produit<span class="text-danger">*</span></label>
									<input type="text" name="nom" value="{{ $produit->nom }}" required placeholder="Nom du produit" class="form-control" id="nom" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="description" class="form-label">Description<span class="text-danger">*</span></label>
									<textarea type="text" name="description" required placeholder="Description" class="form-control" id="description" >{{ $produit->description }}</textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="accompte" class="form-label">Paiement Accompte<span class="text-danger">*</span></label>
									<input type="text" name="accompte" value="{{ $produit->accompte }}" required placeholder="Paiement Accompte" class="form-control" id="accompte" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="journalier" class="form-label">Paiement journalier<span class="text-danger">*</span></label>
									<input type="text" name="journalier" value="{{ $produit->journalier }}" required placeholder="Paiement journalier" class="form-control" id="journalier" />
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="duree" class="form-label">Durée<span class="text-danger">*</span></label>
									<input type="text" name="duree" value="{{ $produit->duree }}" required placeholder="Durée" class="form-control" id="duree" />
								</div>
							</div>
							<div class="col-lg-6">
								<div class="mb-3">
									<label for="photo" class="form-label">Photo<span class="text-danger">*</span></label>
									<input type="file" name="photo" id="photo" accept="image/*" class="form-control">
								</div>
							</div>
							
						</div>

						
						<div class="text-end">
							<button class="btn btn-primary waves-effect waves-light" type="submit">Editer</button>
						</div>
					</div>
				</form>
			</div>
		</div> <!-- end card -->
	</div>
</div>
</div>
@endsection

