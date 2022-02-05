<div class="col-12 col-lg-2 vh-100 sidebar">
   <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
      <div class="">
         <img src="{{ asset(\App\Base::$logo) }}" class="w-100" alt="">
      </div>
      <button class="hide-sidebar-btn btn d-block d-lg-none">
         <i class="fas fa-window-close text-primary" style="font-size: 2em;"></i>
      </button>
   </div>
   <div class="nav-menu">
      <ul>
         <x-menu-spacer></x-menu-spacer>

         <x-menu-item link="{{ route('home') }}" class="fas fa-home" name="Dashboard"></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- User Profile ---------------}}
         <x-menu-title title="User Profile"></x-menu-title>
         <x-menu-item name="Your Profile" class="fas fa-user" link="{{ route('profile') }}"></x-menu-item>
         <x-menu-item name="Change Password" class="fas fa-sync-alt" link="{{ route('profile.edit.password') }}"></x-menu-item>
         <x-menu-item name="Update Name & Email" class="fas fa-edit" link="{{ route('profile.edit.name.email') }}"></x-menu-item>
         <x-menu-item name="Update photo" class="fas fa-image" link="{{ route('profile.edit.photo') }}"></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- Article Manager ---------------}}
         <x-menu-title title="Article Manager"></x-menu-title>
         <x-menu-item class="fas fa-plus-circle" name="Create Article" link="{{ route('article.create') }}"></x-menu-item>
         <x-menu-item class="fas fa-list" name="Article List" link="{{ route('article.index') }}" counter=""></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- Setting ( Category Manager ) ---------------}}
         <x-menu-title title="Setting"></x-menu-title>
         <x-menu-item class="fas fa-layer-group" name="Manage Category" link="{{ route('category.index') }}"></x-menu-item>
         <x-menu-spacer></x-menu-spacer>

         {{--------------- Logout Button ---------------}}
         <li class="menu-item">
            <a class="btn btn-danger btn-block" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
               Logout
            </a>
         </li>

      </ul>
   </div>
</div>