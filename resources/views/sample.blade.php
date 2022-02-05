@extends('layouts.app')

@section("title") Sample @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="#">Sample</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sample Page</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h3 class="mb-0"><i class="fas fa-exclamation-circle text-primary"></i></h3>
                  <h4 class="mb-0 ml-2 font-weight-bold">Sample Page</h4>
               </div>
               <hr>
               <p class="mb-0">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam eius est provident!
                  Labore nulla optio quae quasi quidem. A fugit magni minus molestiae nemo possimus praesentium
                  quisquam unde voluptates.
               </p>
            </div>
         </div>
      </div>
   </div>
@endsection