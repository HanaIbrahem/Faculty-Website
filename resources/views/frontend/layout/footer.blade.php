@php
    $faculty = \App\Models\Faculty::find(1);
    $loc=''; 
    if (Session::get('locale') == 'ku') {
      $loc='_ku';
    } 
@endphp


<footer class="footer py-5 mt-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 mb-5 mb-lg-0">
          <h6 class="text-uppercase mb-2">{{$faculty->{"name$loc"} }}</h6>
          <p class="mb-4 pb-2">
            @if ($loc=='_ku')
                پەیوەندیمان پێوەبکە لەرێگری
            @else
            Contact us on.
            @endif
          </p>
          <a href="https://www.facebook.com/p/Faculty-of-ScienceSoran-University-100064347325072/" target="_blank" class="text-secondary me-xl-4 me-3">
            <span class="text-lg fab fa-facebook" aria-hidden="true"></span>
          </a>
          <a href="https://twitter.com/SoranUniversity" target="_blank" class="text-secondary me-xl-4 me-3">
            <span class="text-lg fab fa-square-x-twitter" aria-hidden="true"></span>

          <a href="https://www.linkedin.com/company/soranuniversity" target="_blank" class="text-secondary me-xl-4 me-3">
            <span class="text-lg fab fa-linkedin" aria-hidden="true"></span>
          </a>
        </div>

        <div class="col-md-4 col-6 ms-lg-auto mb-md-0 mb-4">
          <h6 class="">{{$faculty->{"name$loc"} }}</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link text-secondary" href="#" target="_blank">
              {{__('message.nav_home')}}
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-secondary" href="#" target="_blank">
                {{__('message.nav_news')}}
              </a>
            </li>

            {{-- <li class="nav-item">
              <a class="nav-link text-secondary" href="#" target="_blank">
                
              </a>
            </li> --}}

            <li class="nav-item">
              <a class="nav-link text-secondary" href="#" target="_blank">
                {{__('message.nav_about')}}
              </a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 col-6 mb-md-0 mb-4">
          <h6 class="">{{__('message.page')}}</h6>
          <ul class="flex-column ms-n3 nav">
            <li class="nav-item">
              <a class="nav-link text-secondary" href="{{route('login')}}" target="_blank">
                {{__('message.login')}}
              </a>
            </li>

            <!-- <li class="nav-item">
              <a class="nav-link text-secondary" href="https://www.creative-tim.com" target="_blank">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link text-secondary" href="https://www.creative-tim.com" target="_blank">
                
              </a>
            </li> -->

            <li class="nav-item">
              <a class="nav-link text-secondary" href="#" target="_blank">
                {{__('message.nav_contact')}}
              </a>
            </li>
          </ul>
        </div>

       
      </div>

    </div>
  </footer>