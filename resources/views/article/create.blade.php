@extends('layouts.app')

@section("title") Create Article @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create Article</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h3 class="mb-0"><i class="fas fa-plus-circle text-primary"></i></h3>
                  <h4 class="mb-0 ml-2 font-weight-bold">Create Article</h4>
               </div>
               <form action="{{ route('article.store') }}" id="createArticle" method="post">
                  @csrf
               </form>
            </div>
         </div>
      </div>

      <div class="col-12 col-lg-3">
         <div class="card mt-3">
            <div class="card-body">
               <div class="form-group mb-0">
                  <label for="">Select Category</label>
                  <select name="category" id="" form="createArticle"
                          class="custom-select custom-select-lg @error('category') is-invalid  @enderror">
                     <option value="">Select Category</option>
                     @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                              {{ old('category') == $category->id ? 'selected' : '' }}>
                           {{ $category->title }}
                        </option>
                     @endforeach
                  </select>
                  @error('category')
                  <small class="text-danger font-weight-bold">{{ $message }}</small>
                  @enderror
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-6">
         <div class="card mt-3">
            <div class="card-body">
               <div class="form-group mb-0">

                  <div class="form-group">
                     <label for="articleTitle">Article Title</label>
                     <input type="text" name="title" id="articleTitle"
                            class="form-control form-control-lg @error('title') is-invalid  @enderror"
                            form="createArticle" value="{{ old('title') }}">
                     @error('title')
                     <small class="text-danger font-weight-bold">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="form-group mb-0">
                     <label for="articleDescription">Article Description</label>
                     <textarea name="description" id="articleDescription" cols="30" rows="10" form="createArticle"
                     class="form-control form-control-lg @error('description') is-invalid  @enderror"> {{ old('description') }} </textarea>
                     @error('description')
                     <small class="text-danger font-weight-bold">{{ $message }}</small>
                     @enderror
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-3">
         <div class="card mt-3">
            <div class="card-body">
               <div class="form-group mb-0">
                  <button class="btn btn-primary w-100" form="createArticle">Create Article</button>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection