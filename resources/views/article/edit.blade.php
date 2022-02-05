@extends('layouts.app')

@section("title") Edit Article @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
      <li class="breadcrumb-item active" aria-current="page">Edit Article</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex justify-content-between align-items-center">
                  <div class="d-flex align-items-center">
                     <h3 class="mb-0"><i class="fas fa-edit text-primary"></i></h3>
                     <h4 class="mb-0 ml-2 font-weight-bold">Edit Article</h4>
                  </div>
                  <div class="">
                     <a href="{{ route('article.index') }}" class="btn btn-outline-dark">
                        <i class="fas fa-list"></i>
                     </a>
                  </div>
               </div>
               <form action="{{ route('article.update',$article->id) }}" id="editArticle" method="post">
                  @csrf
                  @method('put')
               </form>
            </div>
         </div>
      </div>

      <div class="col-12 col-lg-3">
         <div class="card mt-3">
            <div class="card-body">
               <div class="form-group mb-0">
                  <label for="">Select Category</label>
                  <select name="category" id="" form="editArticle"
                          class="custom-select custom-select-lg @error('category') is-invalid  @enderror">
                     <option value="">Select Category</option>
                     @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                              {{ old('category', $article->category_id) == $category->id ? 'selected' : '' }}>
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
                            form="editArticle" value="{{ old('title', $article->title) }}">
                     @error('title')
                     <small class="text-danger font-weight-bold">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="form-group mb-0">
                     <label for="articleDescription">Article Description</label>
                     <textarea name="description" id="articleDescription" cols="30" rows="10" form="editArticle"
                               class="form-control form-control-lg @error('description') is-invalid  @enderror"> {{ old('description', $article->description) }} </textarea>
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
                  <button class="btn btn-primary w-100" form="editArticle">Update Article</button>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection