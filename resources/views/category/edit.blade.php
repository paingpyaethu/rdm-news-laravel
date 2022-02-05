@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Manage Category</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                     <h3 class="mb-0"><i class="fas fa-edit text-primary"></i></h3>
                     <h4 class="mb-0 ml-2 font-weight-bold">Edit Category</h4>
                  </div>
                  <div class="">
                     <a href="{{ route('category.index') }}" class="btn btn-outline-dark">
                        <i class="fas fa-list"></i>
                     </a>
                  </div>
               </div>

               <hr>

               <form action="{{ route('category.update', $category->id) }}" class="mb-3" method="post">
                  @csrf
                  @method('put')
                  <div class="form-inline">
                     <label for="Title"></label>
                     <input type="text" id="Title" name="title" class="form-control form-control-lg mr-2
                            @if(session('message')) is-valid @endif @error('title') is-invalid @enderror"
                            value="{{ old('title', $category->title) }}" required>
                     <button class="btn btn-primary btn-lg mt-2 mt-md-0">Update Category</button>
                  </div>
                  @error('title')
                  <small class="text-danger font-weight-bold">{{ $message }}</small>
                  @enderror
                  @if(session('message'))
                     <span class="text-success font-weight-bold">{{ session('message') }}</span>
                  @endif
               </form>

               @include('category.list')
            </div>
         </div>
      </div>
   </div>
@endsection