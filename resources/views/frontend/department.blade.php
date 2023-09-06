@extends('frontend.layout.master')


@php
    $loc='';
    if (Session::get('locale') == 'ku') {
     $loc='_ku';
    } 
@endphp


@section('main')
<<header class="position-relative">
    <div class="page-header min-vh-75 position-relative"
        style="background-image: url('{{ asset('images/department/'.$department->image) }}');" loading="lazy">
        <span class="mask bg-gradient-dark"></span>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center mx-auto mt-n7">
                    <h1 class="text-white fadeIn2 fadeInBottom">
                        @if ($loc=='_ku')
                        فاکەڵتی زانست بەشی 
                        {{ $department->name_ku }} 
                        @else
                            Faculty of Science {{$department->name}} Department
                        @endif
                    </h1>
                    {{-- <p class="lead mb-5 fadeIn3 fadeInBottom text-white opacity-8">
                        Stay connected for life to our University community.
                    </p> --}}
                </div>
            </div>
        </div>
    </div>
</header>

 {{-- Body --}}
 <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n5">
    <section class="py-5 mt-2">
        <div class="container">
            <div class="row" data-aos="zoom-in"  data-aos-duration="1000">
                <div class="col-lg-8 ms-auto me-auto">
                    <h3 class="title mb-4 text-center">
                        @if ($loc=='_ku')
                            بەشی 
                            {{$department->name_ku }}
                        @else
                            Department
                            {{$department->name}}
                        @endif
                    </h3>
                    <p class="text-dark">
                        {!!$department->{"description$loc"} !!}
                    </p>
                </div>
            </div>

    </section>



    <section class="py-7">
        <div class="container">
          <div class="row">
            <div class="col-9 text-center mx-auto">
              <h3 class="mb-1">Computer  Scince Teachers</h3>
              <p class="mb-6 px-md-6">Create a unique and beautiful blog posts. You can also connect your blog directly
                to Google Analytics to have a more detailed look.</p>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header p-0 mx-3 mt-n4 position-relative z-index-1">
                  <a href="javascript:;" class="d-block blur-shadow-image">
                    <img src="../../assets/img/examples/color2.jpg" class="img-fluid border-radius-md" alt="anastasia" loading="lazy">
                  </a>
                  <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/examples/color2.jpg&quot;);"></div>
                </div>
                <div class="card-body">
                  <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold">House</span>
                  <a href="javascript:;" class="card-title mt-3 h5 d-block text-darker">
                    Shared Coworking
                  </a>
                  <p class="card-description mb-4">
                    Use border utilities to quickly style the border and border-radius of an element. Great for images,
                    buttons.
                  </p>
                  <div class="author align-items-center">
                    <img src="../../assets/img/team-2.jpg" alt="..." class="avatar shadow" loading="lazy">
                    <div class="name ps-2">
                      <span>Mathew Glock</span>
                      <div class="stats">
                        <small>Posted on 28 February</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header p-0 mx-3 mt-n4 position-relative z-index-1">
                  <a href="javascript:;" class="d-block blur-shadow-image">
                    <img src="../../assets/img/examples/color3.jpg" class="img-fluid border-radius-md" alt="nastuh" loading="lazy">
                  </a>
                  <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/examples/color3.jpg&quot;);"></div>
                </div>
                <div class="card-body">
                  <span class="text-gradient text-info text-uppercase text-xs font-weight-bold">House</span>
                  <a href="javascript:;" class="text-darker card-title mt-3 h5 d-block">
                    Really Housekeeping
                  </a>
                  <p class="card-description mb-4">
                    Use border utilities to quickly style the border and border-radius of an element. Great for images,
                    buttons.
                  </p>
                  <div class="author align-items-center">
                    <img src="../../assets/img/ivana-squares.jpg" alt="ivana" class="avatar shadow" loading="lazy">
                    <div class="name ps-2">
                      <span>Mathew Glock</span>
                      <div class="stats">
                        <small>Posted on 28 February</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-4">
              <div class="card">
                <div class="card-header p-0 mx-3 mt-n4 position-relative z-index-1">
                  <a href="javascript:;" class="d-block blur-shadow-image">
                    <img src="../../assets/img/examples/color1.jpg" class="img-fluid border-radius-md" alt="annie" loading="lazy">
                  </a>
                  <div class="colored-shadow" style="background-image: url(&quot;../../assets/img/examples/color1.jpg&quot;);"></div>
                </div>
                <div class="card-body">
                  <span class="text-gradient text-warning text-uppercase text-xs font-weight-bold">House</span>
                  <a href="javascript:;" class="text-darker card-title mt-3 h5 d-block">
                    Shared Coworking
                  </a>
                  <p class="card-description mb-4">
                    Use border utilities to quickly style the border and border-radius of an element. Great for images,
                    buttons.
                  </p>
                  <div class="author align-items-center">
                    <img src="../../assets/img/marie.jpg" alt="marie" class="avatar shadow" loading="lazy">
                    <div class="name ps-2">
                      <span>Mathew Glock</span>
                      <div class="stats">
                        <small>Posted on 28 February</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      @foreach ($user as $item)
          <p> {{ $item->id }}</p>

          
      @endforeach
       <!-- pagination start -->
       <div class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
        {{ $user->links('vendor.pagination.custom') }}
       </div>
    <!-- pagination end -->


@endsection