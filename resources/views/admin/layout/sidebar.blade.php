
@php
    $website= App\Models\Faculty::find(1);
@endphp
<style>
/* 
    .sidebar {
      position: fixed;
      left: 0;
      height: 100%;
    } */
    
</style>
<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">{{$website->name}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>  
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <div class="text-center m-2">

                <a href="{{route('index')}}">                <img style="max-height: 100px;max-width:100px" src="{{asset('images/'.$website->logo)}}" class="img  ">
                </a>
            </div>
            
            <div class="text-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
            
                    <x-dropdown-link class="btn" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                       <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                                       {{ __('Log Out ') }}
                    </x-dropdown-link>
                </form>
                <p  class="p-0 m-0">
                    hi {{auth()->user()->name}}
                </p>
            </div>

            <h6
            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
            <span>Profile</span>
               
            </a>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('profile.edit')}}">
                        <svg class="bi">
                            <use xlink:href="#house-fill" />
                        </svg>
                        Profile
                    </a>
                </li>
               

            
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('Users-list')}}">
                        <i class="bi bi-people-fill"></i>

                        Admins
                    </a>
                </li>
              
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>App</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                    <svg class="bi">
                        <use xlink:href="#plus-circle" />
                    </svg>
                </a> --}}
            </h6>
            <ul class="nav flex-column mb-auto">

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('teacher.index')}}">
                        <i class="bi bi-window-stack"></i>
                        Teachers
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('department.index')}}">
                        <i class="bi bi-window-stack"></i>
                        Department
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('faculty')}}">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        Faculty of Science
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{route('website')}}">
                        <svg class="bi">
                            <use xlink:href="#file-earmark-text" />
                        </svg>
                        Website
                    </a>
                </li>
            </ul>

            <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Pages</span>
                {{-- <a class="link-secondary" href="#" aria-label="Add a new report">
                    <svg class="bi">
                        <use xlink:href="#plus-circle" />
                    </svg>
                </a> --}}
            </h6>

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#gear-wide-connected" />
                        </svg>
                        Settings
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi">
                            <use xlink:href="#door-closed" />
                        </svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
