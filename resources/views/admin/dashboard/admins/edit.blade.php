@extends('layouts.back_base')
@section('title')
Editer un admin
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
						<li class="breadcrumb-item"><a href="/admin/admins">Administrateurs</a></li>
						<li class="breadcrumb-item active">Editer</li>
					</ol>
				</div>
				<h4 class="page-title">Administrateurs</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="header-title">Editer un admin</h4>

					<form method="POST" action="/admin/admins/edit/{{ $admin->id }}">
						 {{ csrf_field() }}
						<div class="mb-3">
							<label for="email" class="form-label">Email<span class="text-danger">*</span></label>
							<input type="text" name="email" required value="{{ $admin->email }}" placeholder="Email" class="form-control" id="email" />
						</div>
						<div class="mb-3">
							<label for="restaurant" class="form-label">Restaurant<span class="text-danger">*</span></label>
							<select name="restaurant" required  class="form-control" id="restaurant">
								<option value="">Choisir une option</option>
								@foreach($restaurants as $restaurant)
								<option value="{{ $restaurant->id }}" <?= ($restaurant->id == $admin->restaurant_id)?"selected":"" ?>>{{ $restaurant->nom }}</option>
								@endforeach
							</select>
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

