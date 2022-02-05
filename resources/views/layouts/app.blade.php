<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>@yield('title', 'Admin Dashboard')</title>
   <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Padauk:wght@400;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link rel="icon" href="{{ asset('images/logos/fav.png') }}">

   @yield('head')
</head>
<body>

@guest
   @yield('content')
@else
   <section class="main container-fluid">
      <div class="row">

      <!---------- Sidebar Start ---------->
      @include('layouts.sidebar')
      <!---------- Sidebar End ---------->

         <div class="col-12 col-lg-10 vh-100 py-3 content">
         @include('layouts.header')
         <!---------- Content Area Start ---------->
         @yield('content')
         <!---------- Content Area End ---------->
         </div>
      </div>
   </section>
@endguest



<script src="{{ asset('js/app.js') }}"></script>

@yield('foot')

</body>
</html>