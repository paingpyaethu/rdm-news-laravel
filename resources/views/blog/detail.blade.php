@extends('blog.master')

@section('content')

   <div class="">
      <div class="py-3">
         <div class="post-category mb-3">
            <a href="{{ route('baseOnCategory',$article->Category->id) }}" rel="category tag">{{ $article->Category->title }}</a>
         </div>

         <h3 class="fw-bolder">{{ $article->title }}</h3>
         <div class="my-3 feature-image-box">
            <div class="d-block d-md-flex justify-content-between align-items-center my-3">

               <div class="">
                  <img alt="" src="{{isset($article->User->photo) ? asset('storage/profile/'.$article->User->photo) : asset('dashboard/img/default_user.png')}}"
                       class="avatar avatar-30 photo rounded-circle me-1" height="30" width="30" loading="lazy">
                  <a href="{{ route('baseOnUser',$article->User->id) }}" class="text-decoration-none" title="Visit admin’s website" rel="author external">
                     {{ $article->User->name }}
                  </a>
               </div>

               <div class="">
                  <a href="{{ route('baseOnDate', $article->created_at) }}" class="text-decoration-none">
                     <span class="small text-danger me-2">
                        <i class="fas fa-calendar-check"></i>
                        {{ $article->created_at->format('d-m-Y') }}
                     </span>
                     <span class="small text-info">
                        <i class="fas fa-clock"></i>
                        {{ $article->created_at->format('h:i A') }}
                     </span>
                  </a>
               </div>
            </div>

            <p class="mt-4 mb-2" style="white-space: pre-line">{{ $article->description }}</p>

            @php

            $prevArticle = \App\Article::where("id","<",$article->id)->latest('id')->first();
            $nextArticle = \App\Article::where("id",">",$article->id)->first();

            @endphp

            <div class="nav d-flex justify-content-between p-3">
               <a href="{{ isset($prevArticle) ? route('detail', $prevArticle) : 'javascript:void(0)' }}"
                  class="btn btn-outline-primary page-mover rounded-circle {{ isset($prevArticle) ? '' : 'disabled' }}">
                  <i class="fas fa-arrow-left"></i>
               </a>

               <a class="btn btn-outline-primary px-3 rounded-pill" href="{{ route('index') }}">
                  Read All
               </a>

               <a href="{{ isset($nextArticle) ? route('detail', $nextArticle) : 'javascript:void(0)' }}"
                  class="btn btn-outline-primary page-mover rounded-circle @empty($nextArticle) disabled @endempty">
                  <i class="fas fa-arrow-right"></i>
               </a>
            </div>
         </div>


      </div>

      <div class="d-block d-lg-none d-flex justify-content-center">
      </div>

   </div>
@endsection