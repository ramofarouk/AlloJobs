@extends('layouts.back_base')
@section('title')
Journal des Actions
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
						<li class="breadcrumb-item active">Journal des Actions</li>
					</ol>
				</div>
				<h4 class="page-title">Journal des Actions</h4>
			</div>
		</div>
	</div>     
	<!-- end page title --> 

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">

					<h4 class="header-title">Journal des Actions</h4>

					<table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
							<thead>
								<tr>
									<th>Email</th>
									<th>Action effectuée</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
								@foreach($journaux as $journal)
								<tr>
									<td>{{$journal->admin->email}}</td>
									<td>{{$journal->action}}</td>
									<td>{{ formatDate($journal->created_at) }}</td>
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

