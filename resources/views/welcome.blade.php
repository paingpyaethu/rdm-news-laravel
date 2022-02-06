@extends('blog.master')

@section('content')

   <div class="mt-5">
   @forelse($articles as $article)
         <div class="border-bottom mb-4 pb-4 article-preview">
            <div class="p-0 p-md-3">
               <a href="{{ route('detail',$article->slug) }}" class="fw-bold h4 d-block text-decoration-none" >
                  {{ $article->title }}
               </a>

               <div class="small post-category">
                  <a href="{{ route('baseOnCategory',$article->Category->id) }}" rel="category tag">
                     {{ $article->Category->title }}
                  </a>
               </div>

               <div class="text-black-50 the-excerpt mt-3">
                  <p style="white-space: pre-line"> {{ Str::words($article->description, 50)}}</p>
               </div>

               <div class="d-flex justify-content-between align-items-center see-more-group">
                  <div class="d-flex align-items-center">
                     <img alt="" src="{{isset($article->User->photo) ? asset('storage/profile/'.$article->User->photo) : asset('dashboard/img/default_user.png')}}"
                          class="avatar avatar-50 photo rounded-circle" height="50" width="50"
                          loading="lazy">
                     <div class="ms-2">
                     <span class="small text-success">
                         <i class="fas fa-user-alt"></i>
                         {{ $article->User->name }}
                     </span>
                        <br>
                     <span class="small text-danger">
                        <i class="fas fa-calendar-check"></i>
                        {{ $article->created_at->format('d-F-Y') }}
                     </span>
                     </div>
                  </div>

                  <a href="{{ route('detail',$article->slug) }}" class="btn btn-outline-primary rounded-pill px-3">
                     Read More
                  </a>
               </div>
            </div>
         </div>
   @empty
            <div class="py-5 my-5 text-center text-lg-start">
               <p class="fw-bold text-primary mt-5">Dear Viewer</p>
               <h1 class="fw-bold">
                  There is no article 😔 ...
               </h1>
               <p>Please go back to Home Page</p>
               <a class="btn btn-outline-primary rounded-pill px-3" href="{{ route('index') }}">
                  <i class="fas fa-home"></i>
                  Blog Home
               </a>
            </div>
   @endforelse
   </div>

   <div class="d-block d-lg-none" id="pagination">
      {{ $articles->appends(request()->all())->onEachSide(1)->links() }}
      <div class="text-end mt-3 mt-md-0">
         <a href="{{ route('index') }}" class="btn btn-outline-dark position-relative">
            Total Articles
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
            {{ $articles -> total() }}
         <span class="visually-hidden"></span>
         </span>
         </a>
      </div>
   </div>

@endsection

@section('inputSearch')
   <div id="search" class="mb-5">
      <form action="" method="get">
         <div class="d-flex search-box mb-2">
            <input type="text" name="search" class="form-control flex-shrink-1 me-2 search-input"
                   value="{{ request()->search }}" placeholder="Search Anything" required>
            <button class="btn btn-primary search-btn">
               <i class="fas fa-search d-block d-xl-none"></i>
               <span class="d-none d-xl-block">Search</span>
            </button>
         </div>
         @isset(request()->search)
            <span class="fw-bold ms-2">Search By: <span class="text-danger">&nbsp;"{{ request()->search }}"</span>
            </span>
         @endisset

      </form>

   </div>
@endsection

@section('categoryLists')
   <div id="category" class="mb-5">
      <h4 class="fw-bolder">Category Lists</h4>
      <ul class="list-group">
         <li class="list-group-item">
            <a href="{{ route('index') }}"
               class="{{ request()->url() == route('index') ? 'active' : '' }}">
               All Categories
            </a>
         </li>
         @foreach($categories as $category)
            <li class="list-group-item">
               <a href="{{ route('baseOnCategory', $category->id) }}"
                  class="{{ request()->url() == route('baseOnCategory', $category->id) ? 'active' : '' }}">
                  {{ $category->title }}
               </a>
            </li>
         @endforeach
      </ul>
   </div>
@endsection

@section('pagination-place')
   <div class="d-none d-lg-block" id="pagination">
      {{ $articles->appends(request()->all())->onEachSide(1)->links() }}
      <div class="text-end">
         <a href="{{ route('index') }}" class="btn btn-outline-dark position-relative">
            Total Articles
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
            {{ $articles -> total() }}
         <span class="visually-hidden"></span>
         </span>
         </a>
      </div>
   </div>
@stop