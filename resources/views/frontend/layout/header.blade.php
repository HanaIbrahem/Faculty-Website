@php
    $loc='';
    $faculty = \App\Models\Faculty::find(1);
    
    if (Session::get('locale') == 'ku') {
       $loc='_ku';
    } 
    

    $department=\App\Models\Department::all();
@endphp





<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 fixed-top">
    <div class="container">
        <img class="me-1 w-5 d-none d-sm-block" src="{{ asset('images/' . $faculty->logo) }}" alt="{{$faculty->{"name$loc"} }}"
            style="max-width:40px;max-height:40px">

        <a class="navbar-brand fs-4 text-capitalize" href="{{ route('frontend.index') }}" rel="tooltip"
             data-placement="bottom" target="_blank">
            {{ $faculty->{"name$loc"} }}
        </a>
       
        <button class="navbar-toggler shadow-none ms-2 collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
            <ul class="navbar-nav navbar-nav-hover mx-auto">
                <li class="nav-item ">
                    <div>
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="{{route('frontend.index')}}" role="button">
                        {{ __('message.nav_home') }}
                    </a>
                </div>
                </li>
              

                <li class="nav-item dropdown dropdown-hover ">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        id="dropdownMenuPages5" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('message.nav_department') }}
                        <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu ms-n3 dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3"
                        aria-labelledby="dropdownMenuPages5">
                        <div class="d-none d-lg-block">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                {{ __('message.nav_department') }}

                            </h6>
                            @foreach ($department as $item )
                            <a href="{{route('frontend.department',$item->id)}}" class="dropdown-item border-radius-md" 
                                @if ($loc=='_ku')
                                    style="text-align: right"
                                @endif
                                >
                                <span>{{$item->{"name$loc"} }}</span>
                            </a>
                            @endforeach
                           
                           
                        </div>

                        <div class="d-lg-none">
                            <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                {{ __('message.nav_department') }}
                            </h6>
                            @foreach ($department as $item )
                            <a href="{{route('frontend.department',$item->id)}}" class="dropdown-item border-radius-md" 
                                @if ($loc=='_ku')
                                    style="text-align: right"
                                @endif
                                >
                                <span>{{$item->{"name$loc"} }}</span>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="{{route('forntend.research')}}" role="button">
                        {{ __('message.nav_news') }}
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="{{route('forntend.about')}}" role="button">
                        {{ __('message.nav_about') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="{{route('forntend.contact')}}" role="button">
                        {{ __('message.nav_contact') }}
                    </a>
                </li>

                
                  {{-- for languge selector for small screen --}}
                <li class="nav-item dropdown dropdown-hover d-lg-none">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        id="dropdownMenuPages11" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Session::get('locale') == 'ku')
                        <img src="{{asset('images/kurdish_flag.png')}}" class="rounded-pill" width="25">
                        @else
                        <img src="{{asset('images/english_flag.png')}}" class="rounded-pill" width="25">
                        @endif
                        <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}"
                            class="arrow ms-auto ms-md-2">
                    </a>
                    <div class="dropdown-menu border-radius-lg" aria-labelledby="dropdownMenuPages11">
                            
                        @if (Session::get('locale') == 'ku')
                        <a class="dropdown-item border-radius-md" href="{{ route('setlocale', 'en') }}">English</a>
                        @else
                        <a class="dropdown-item border-radius-md" href="{{ route('setlocale', 'ku') }}">کوردی</a>
                        @endif
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav d-lg-block d-none">

                <div class="hidden fixed top-0 right-0 sm:block">

                    <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">
                        <li class="nav-item dropdown dropdown-hover mx-2">
                            <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="kk"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if (Session::get('locale') == 'ku')
                                <img src="{{asset('images/kurdish_flag.png')}}" class="rounded-pill" width="25">
                                @else
                                <img src="{{asset('images/english_flag.png')}}" class="rounded-pill" width="25">
                                @endif
                                <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}"
                                    class="arrow ms-auto ms-md-2">
                            </a>
                            <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                                aria-labelledby="kk">
                                <div class="d-none d-lg-block">
                        
                                  @if (Session::get('locale') == 'ku')
                                  <a class="dropdown-item border-radius-md" href="{{ route('setlocale', 'en') }}">English</a>
                                  @else
                                  <a class="dropdown-item border-radius-md" href="{{ route('setlocale', 'ku') }}">کوردی</a>
                                  @endif
                                </div>
                            </div>
                        </li>
                    </div>
                </div>
                
           
            </ul>


          
        </div>
    </div>
</nav>
