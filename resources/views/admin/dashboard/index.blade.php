@extends('layouts.back_base')
@section('title')
Tableau de Bord
@endsection
@section('content')
<div class="container-fluid">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title">Tableau de bord</h4>
      </div>
    </div>
  </div>     
  <!-- end page title --> 

  <div class="row">
    <div class="col-md-4 col-xl-4">
      <div class="widget-rounded-circle card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle border-primary border" style="background-color:#0F6A4E">
                <i class="fe-grid font-22 avatar-title" style="color:white"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-end">
                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $nbreDemandeurs }}</span></h3>
                <p class="text-muted mb-1 text-truncate">Demandeurs</p>
              </div>
            </div>
          </div> <!-- end row-->
        </div>
      </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
    <div class="col-md-4 col-xl-4">
      <div class="widget-rounded-circle card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle border-primary border" style="background-color:#0F6A4E">
                <i class="fe-grid font-22 avatar-title" style="color:white"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-end">
                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $nbreEntreprises }}</span></h3>
                <p class="text-muted mb-1 text-truncate">Entreprises</p>
              </div>
            </div>
          </div> <!-- end row-->
        </div>
      </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
    <div class="col-md-4 col-xl-4">
      <div class="widget-rounded-circle card">
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="avatar-lg rounded-circle border-primary border" style="background-color:#0F6A4E">
                <i class="fe-grid font-22 avatar-title" style="color:white"></i>
              </div>
            </div>
            <div class="col-6">
              <div class="text-end">
                <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $nbreSoumissions }}</span></h3>
                <p class="text-muted mb-1 text-truncate">Soumissions</p>
              </div>
            </div>
          </div> <!-- end row-->
        </div>
      </div> <!-- end widget-rounded-circle-->
    </div> <!-- end col-->
  </div>
  <!-- end row-->

</div> <!-- container -->
@endsection