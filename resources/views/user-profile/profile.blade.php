@extends('layouts.app')

@section("title") Profile @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12 col-md-5 col-xl-4">
         <div class="card shadow">
            <div class="card-body">
               <div class="text-center">
                  <img src="{{ isset(Auth::user()->photo) ? asset('storage/profile/'.Auth::user()->photo) : asset('dashboard/img/default_user.png') }}" class="w-50 rounded-circle my-3" alt="">
                  <h3 class="mb-0 font-weight-bold">
                     {{ Auth::user()->name }}
                  </h3>
                  <small class="text-black-50">
                     {{ Auth::user()->email }}
                  </small>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection