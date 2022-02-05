@extends('layouts.app')

@section("title") {{ $article -> title }} @endsection

@section('head')
   <style>
      .description {
         white-space: pre-line;
      }
   </style>
@stop

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item"><a href="{{ route('article.index') }}">Article List</a></li>
      <li class="breadcrumb-item active" aria-current="page">Article Detail</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12 col-lg-6">
         <div class="card shadow">
            <div class="card-body">
               <div class="">
                  <h4 class="mb-0 font-weight-bold">{{ $article->title }}</h4>
                  <div class="border-bottom mt-1">
                     <span class="small mr-2 text-success">
                        <i class="fas fa-layer-group"></i>
                        {{ $article->Category->title }}
                     </span>
                     <span class="small mr-2 text-primary">
                        <i class="fas fa-user"></i>
                        {{ $article->User->name }}
                     </span>
                     <span class="small mr-2 text-danger">
                        <i class="fas fa-calendar-check"></i>
                        {{ $article->created_at->format('d-m-Y') }}
                     </span>
                     <span class="small mr-2 text-info">
                        <i class="fas fa-clock"></i>
                        {{ $article->created_at->format('h:i A') }}
                     </span>
                  </div>

                  <p class="mt-2 mb-2 description">{{ $article->description }}</p>
               </div>
               <hr class="mt-0">
               <div class="d-flex justify-content-between align-items-center">
                  <div class="">
                     <form action="{{ route('article.destroy', $article->id) }}" class="d-inline-block" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger"
                                onclick="return confirm('Are u sure to delete this article!!')">Delete</button>
                     </form>
                     <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-info">
                        Edit
                     </a>
                     <a href="{{ route('article.index') }}" class="btn btn-outline-dark">
                        All Articles
                     </a>
                  </div>
                  <div class="">
                     <p class="mb-0">{{ $article->created_at->diffForHumans() }}</p>
                  </div>
               </div>


            </div>
         </div>
      </div>
   </div>
@endsection