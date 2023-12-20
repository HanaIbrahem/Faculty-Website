@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


<div class="row d-flex mt-1 justify-content-center mt-5">
    @foreach ($teacher as $item)
        <div class="col-lg-3 col-12 col-md-6 mb-5 ">
            <div class="card h-100 d-flex flex-column">
                <div class="card-header mt-n4 mx-3 p-0 bg-transparent position-relative z-index-2">
                    <a class="d-block blur-shadow-image" href="{{route('forntend.teacher',$item->id)}}">
                        <img src="{{ asset('images/teacher/' . $item->image) }}"
                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg responsive-image-1"
                            loading="lazy"
                            id="re">
                    </a>
                </div>
                <div class="card-body text-center bg-white border-radius-lg p-3 pt-0 flex-grow-1">
                    <h5 class="mt-3 mb-1 d-md-block d-none">
                        <a href="{{route('forntend.teacher',$item->id)}}">{{ $item->{"name$loc"} }}</a>
                    </h5>
                    <p class="mb-1 d-md-none d-block text-sm font-weight-bold text-dark mt-3">
                        <a href="{{route('forntend.teacher',$item->id)}}">{{ $item->{"name$loc"} }}
                        </a></p>
                </div>
            </div>
        </div>
    @endforeach
</div>

 <!-- pagination start --> <!-- For Course Pagination -->
 <div class="teacher-pagination pagination pagination-primary pagination-wrap mt-4 ms-0 me-0 ps-sm-0 pe-sm-0">
    {{ $teacher->onEachSide(1)->links('vendor.pagination.custom') }}
</div>

<!-- pagination end -->