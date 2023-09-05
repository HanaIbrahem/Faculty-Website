@php
    $info = [];
    $faculty = \App\Models\Faculty::find(1);
    
    if (Session::get('locale') == 'ku') {
        $info = [
            'name' => $faculty->name_ku,
            'title' => $faculty->title_ku,
        ];
    } else {
        $info = [
            'name' => $faculty->name,
            'title' => $faculty->title,
        ];
    }
@endphp





<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 fixed-top">
    <div class="container">
        <img class="me-1 w-5 d-none d-sm-block" src="{{asset('images/'.$faculty->logo)}}" alt="{{$info['name']}}" style="max-width:40px;max-height:40px">

      <a class="navbar-brand fs-4" href="{{route('frontend.index')}}" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        {{$info['name']}}
      </a>
      <button class="navbar-toggler shadow-none ms-2 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1" ></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
        <ul class="navbar-nav navbar-nav-hover mx-auto">
            <li class="nav-item ">
                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                    href="./index.html" role="button">
                    {{__('message.nav_home')}}
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                    href="./index.html" role="button">
                    {{__('message.nav_news')}}
                </a>
            </li> 

          <li class="nav-item dropdown dropdown-hover ">
            <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center" id="dropdownMenuPages5" data-bs-toggle="dropdown" aria-expanded="false">
              {{__('message.nav_department')}} 
              <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}" alt="down-arrow" class="arrow ms-auto ms-md-2">
            </a>
            <div class="dropdown-menu ms-n3 dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="dropdownMenuPages5">
              <div class="d-none d-lg-block">
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                    {{__('message.nav_department')}} 
                </h6>
                <a href="../../pages/about-us.html" class="dropdown-item border-radius-md">
                  <span>About Us</span>
                </a>
                <a href="../../pages/contact-us.html" class="dropdown-item border-radius-md">
                  <span>Contact Us</span>
                </a>
                <a href="../../pages/author.html" class="dropdown-item border-radius-md">
                  <span>Author</span>
                </a>
              </div>

              <div class="d-lg-none">
                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                  Departments
                </h6>
                <a href="../../pages/about-us.html" class="dropdown-item border-radius-md">
                  <span>About Us</span>
                </a>
                <a href="../../pages/contact-us.html" class="dropdown-item border-radius-md">
                  <span>Contact Us</span>
                </a>
                <a href="../../pages/author.html" class="dropdown-item border-radius-md">
                  <span>Author</span>
                </a>
              </div>
            </div>
          </li>
        
       <li class="nav-item ">
                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                    href="./index.html" role="button">
                    {{__('message.nav_about')}}
                </a>
            </li> <li class="nav-item ">
                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                    href="./index.html" role="button">
                    {{__('message.nav_contact')}}
                </a>
            </li>
        

          {{-- <li class="nav-item my-auto ms-3 ms-lg-0">
            <a href="https://www.creative-tim.com/product/material-kit-pro" class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">Upgrade to Pro</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>