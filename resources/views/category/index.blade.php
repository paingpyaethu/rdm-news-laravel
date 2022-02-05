@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item active" aria-current="page">Manage Category</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h3 class="mb-0"><i class="fas fa-layer-group text-primary"></i></h3>
                  <h4 class="mb-0 ml-2 font-weight-bold">Manage Category</h4>
               </div>
               <hr>

               <form action="{{ route('category.store') }}" class="mb-3" method="post">
                  @csrf
                  <div class="form-inline">
                     <label for="Title"></label>
                     <input type="text" id="Title" name="title" placeholder="New Category"
                            class="form-control form-control-lg mr-2 @if(session('message')) is-valid @endif @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                     <button class="btn btn-primary btn-lg mt-2 mt-md-0">Add Category</button>
                  </div>
                  @error('title')
                     <small class="text-danger font-weight-bold">{{ $message }}</small>
                  @enderror
                  @if(session('message'))
                     <span class="text-success font-weight-bold">{{ session('message') }}</span>
                  @endif
                  @if(session('delMessage'))
                     <span class="text-danger font-weight-bold">{{ session('delMessage') }}</span>
                  @endif
               </form>

               @include('category.list')
            </div>
         </div>
      </div>
   </div>
@endsection