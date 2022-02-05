@extends('layouts.app')

@section("title") Article List @endsection

@section('content')
   <x-bread-crumb>
      <li class="breadcrumb-item active" aria-current="page">Article List</li>
   </x-bread-crumb>

   <div class="row">
      <div class="col-12">
         <div class="card shadow">
            <div class="card-body">
               <div class="d-flex align-items-center">
                  <h3 class="mb-0"><i class="fas fa-list text-primary"></i></h3>
                  <h4 class="mb-0 ml-2 font-weight-bold">Article List</h4>
               </div>
               <hr>
               @if(session('message'))
                  <p class="alert alert-success font-weight-bold">{{ session('message') }}</p>
               @endif
               @if(session('delMessage'))
                  <p class="alert alert-danger font-weight-bold">{{ session('delMessage') }}</p>
               @endif
               <div class="d-md-flex justify-content-md-between">
                  <div class="">
                     <a href="{{ route('article.create') }}" class="btn btn-outline-primary">
                        <i class="fas fa-plus-circle"></i>
                        Create Article
                     </a>
                     @isset(request()->search)
                        <a href="{{ route('article.index') }}" class="btn btn-outline-dark ml-2">
                           <i class="fas fa-list"></i>
                           All Articles
                        </a>
                        <span class="d-block d-md-inline-block font-weight-bold mt-2 mt-md-0 ml-0 ml-md-2">Search By: <span class="text-danger">&nbsp;"{{ request()->search }}"</span></span>
                     @endisset
                  </div>

                  <form action="{{ route('article.index') }}" method="get">
                     <div class="form-inline">
                        <input type="text" class="form-control mr-2" name="search"
                               value="{{ request()->search }}" placeholder="Search Article" required>
                        <button class="btn btn-primary">
                           <i class="fas fa-search"></i>
                        </button>
                     </div>
                  </form>
               </div>
               <div class="table-responsive mt-3">
                  <table class="table table-hover mb-0">
                     <thead>
                     <tr>
                        <th>#</th>
                        <th>Article</th>
                        <th>Category</th>
                        <th>Owner</th>
                        <th>Action</th>
                        <th>Created_at</th>
                     </tr>
                     </thead>
                     <tbody>
                     @forelse($articles as $article)
                        <tr>
                           <td>{{ $article->id }}</td>
                           <td class="text-nowrap">
                              <span class="font-weight-bold">{{ Str::words($article->title, 5) }}</span>
                              <br>
                              <small class="text-black-50">{{ Str::words($article->description, 10)}}</small>
                           </td>
                           <td class="text-nowrap">{{ $article->Category->title }}</td>
                           <td class="text-nowrap">{{ $article->User->name }}</td>
                           <td class="text-nowrap">
                              <a href="{{ route('article.show', $article->id) }}" class="btn btn-outline-success">
                                 Detail
                              </a>
                              <a href="{{ route('article.edit', $article->id) }}" class="btn btn-outline-info">
                                 Edit
                              </a>
                              <form action="{{ route('article.destroy', [$article->id,'page'=>request()->page]) }}" class="d-inline-block" method="post">
                                 @csrf
                                 @method('delete')
                                 <button class="btn btn-outline-danger"
                                         onclick="return confirm('Are u sure to delete this article!!')">Delete</button>
                              </form>
                           </td>
                           <td class="text-nowrap">
                              <span class="small">
                                 <i class="fas fa-calendar-check"></i>
                                 {{ $article->created_at->format('d-m-Y') }}
                              </span>
                              <span class="small">
                                 <i class="fas fa-clock"></i>
                                 {{ $article->created_at->format('h:i A') }}
                              </span>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="6" class="border-bottom text-danger text-center font-weight-bold">
                              No Articles Found!
{{--                              <p class="alert alert-danger mb-0 font-weight-bold">No Articles Found!</p>--}}
                           </td>
                        </tr>
                     @endforelse
                     </tbody>
                  </table>

                  <div class="d-flex justify-content-between align-items-center mt-3">
                     {{--For Paginate--}}
                     {{ $articles -> appends(request()->all())->links() }}
                     <p class="font-weight-bold h4 mb-0">
                        Total: {{ $articles -> total() }}
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection







