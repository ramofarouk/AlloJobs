@extends('layouts.back_base')
@section('title')
Profil
@endsection
@section('content')
<!-- Start Content-->
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Accueil</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ol>
                </div>
                <h4 class="page-title">Profil</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class="row">
       <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start mb-3">
                    <img class="d-flex me-3 rounded-circle avatar-lg" src="{{ asset('avatars/default.png')}}" alt="{{$admin->email}}">
                    <div class="w-100">
                        <h4 class="mt-0 mb-1">{{$admin->email}}</h4>
                        <p class="text-muted">
                           @if(getAdminAuth()->niveau == 2)
                           Super Admin
                           @else
                           Administrateur
                           @endif
                       </p>
                   </div>
               </div>

           </div>
       </div> <!-- end card-->
   </div>
   <div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
               <h4 class="header-title">Modifier mes informations</h4>

               <form action="/admin/profile" method="POST">
                   {{ csrf_field() }}
                   <div class="mb-3">
                    <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="text" name="email" required value="{{ $admin->email }}" placeholder="Email" class="form-control" id="email" />
                </div>

                <div class="text-end">
                    <button class="btn btn-primary waves-effect waves-light" type="submit">Editer</button>
                </div>
            </form>
        </div>

    </div> <!-- end card-body-->
</div> <!-- end card-->
</div> <!-- end col -->


</div>
</div>

@endsection

