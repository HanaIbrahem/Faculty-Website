@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


<div class="col-lg-12">

    {{-- start foreach --}}
    @foreach ($activity as $item)
    <div class="row mb-5 m-md-4 p-2 shadow shadow-lg"data-aos="fade-left" data-aos-duration="1000">
        <div class="col-lg-6 justify-content-center d-flex flex-column">
            <div class="card">
                <div class="d-block blur-shadow-image">
                    <img src="{{ asset('images/activity/' . $item->image) }}"
                        alt="img-blur-shadow-blog-2" class="img-fluid border-radius-lg"
                        loading="lazy">
                </div>

            </div>
        </div>
        <div class="col-lg-6 justify-content-center d-flex flex-column pl-lg-5 pt-lg-0 pt-3">
            <h3 class="card-title">
                <a href="{{ route('forntend.activity', $item->id) }}"
                    class="text-dark">{{ $item->{"name$loc"} }}</a>
            </h3>

            <div id="" class="d-flex">

                <p class="author">
                    <span class="font-weight-bold text-warning">
                        @if ($loc == '_ku')
                            بەروار:
                        @else
                            Date:
                        @endif
                        {{ date('d/m/y', strtotime($item->date)) }}
                </p>

            </div>

            <p class="card-description">
                {!! Str::limit($item->{"description$loc"}, 200) !!}
                <a href="{{ route('forntend.activity', $item->id) }}"
                    class="text-darker icon-move-right text-sm">
                    @if ($loc == '_ku')
                        زیاتر بخوێنەوە
                        <i class="fas fa-arrow-left text-xs ms-1" aria-hidden="true"></i>
                    @else
                        Read More
                        <i class="fas fa-arrow-right text-xs ms-1" aria-hidden="true"></i>
                    @endif
                </a>
            </p>
            <p class="author">
                <span class="font-weight-bold text-warning">
                    @if ($loc == '_ku')
                        بڵاوکراوەتەوە لە:
                    @else
                        Posted at:
                    @endif
                </span></a>, {{ $item->created_at->format('d/m/y') }}

            </p>

        </div>





     </div>
     @endforeach

     {{-- end foreach --}}



  {{-- start pasgnination --}}

  <div class="pagination pagination-primary pagination-wrap mt-4 ms-0 me-0 ps-sm-0 pe-sm-0" >
      {{ $activity->onEachSide(1)->links('vendor.pagination.custom') }}
  </div>


  {{-- end pasigniation --}}
</div>