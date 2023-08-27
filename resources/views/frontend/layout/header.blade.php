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
<nav class="navbar navbar-expand-lg navbar-light bg-white z-index-3 py-1 fixed-top ">
    <div class="container">
        <img class="me-1 w-5" src="{{asset('images/'.$faculty->logo)}}" alt="{{$info['name']}}" style="max-width:40px;max-height:40px">

        <a class="navbar-brand fs-4" href="{{route('frontend.index')}}" rel="tooltip" title="Designed and Coded by Creative Tim"
            data-placement="bottom" target="_blank">
            {{$info['name']}}
        </a>
        <!-- <a href="https://www.creative-tim.com/product/material-design-system-pro#pricingCard"
        class="btn btn-sm  bg-gradient-primary  btn-round mb-0 ms-auto d-lg-none d-block">Switch</a> -->
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
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
                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="./index.html" role="button">
                        Home
                    </a>
                </li>

                <li class="nav-item dropdown dropdown-hover mx-2">
                    <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuDocs"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Departments
                        <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                            class="arrow ms-auto ms-md-2">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animation dropdown-md dropdown-md-responsive mt-0 mt-lg-3 p-3 border-radius-lg"
                        aria-labelledby="dropdownMenuDocs">
                        <div class="d-none d-lg-block">
                            <ul class="list-group">

                                <h6 class="dropdown-header text-dark font-weight-bolder d-flex align-items-center px-1">
                                    Faculty of Sience
                                </h6>
                                <a href="./computer.html" class="dropdown-item border-radius-md">
                                    <span>Computer</span>
                                </a>
                                <a href="./math.html" class="dropdown-item border-radius-md">
                                    <span>Math</span>
                                </a>
                                <a href="./cheymestry.html" class="dropdown-item border-radius-md">
                                    <span>Chemistry</span>
                                </a>
                                <a href="./biology.html" class="dropdown-item border-radius-md">
                                    <span>Biology</span>
                                </a>
                            </ul>
                        </div>

                        <!-- <div class="row d-lg-none">
                <div class="col-md-12 g-0">
                  <ul class="list-group">

                  <a href="./computer.html" class="dropdown-item py-2 ps-3 border-radius-md">
                    <span>Computer</span>
                  </a>
                  <a href="./math.html" class="dropdown-item py-2 ps-3 border-radius-md">
                    <span>Math</span>
                  </a>
                  <a href="./cheymestry.html" class="dropdown-item py-2 ps-3 border-radius-md">
                    <span>Chemistry</span>
                  </a>
                  <a href="./biology.html" class="dropdown-item py-2 ps-3 border-radius-md">
                    <span>Biology</span>
                  </a>
                </ul>
                </div>
              </div> -->

                    </ul>
                </li>


                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        role="button">
                        News
                    </a>
                </li>

                <li class="nav-item mx-2">
                    <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center"
                        href="./about.html" role="button">
                        About
                    </a>
                </li>



            </ul>





            <ul class="navbar-nav d-lg-block d-none">
                <a class="nav-link ps-2 d-flex justify-content-between cursor-pointer align-items-center text-primary"
                    role="button">
                    Eng
                    <img src="{{ asset('frontend/assets/img/down-arrow-dark.svg') }}" alt="down-arrow"
                        class="arrow ms-1">
                </a>
            </ul>
        </div>
    </div>
</nav>
