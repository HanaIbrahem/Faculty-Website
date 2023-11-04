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
                    <a class="d-block blur-shadow-image">
                        <img src="{{ asset('images/teacher/' . $item->image) }}"
                            alt="img-blur-shadow" class="img-fluid shadow border-radius-lg"
                            loading="lazy"
                            style="width:100%; height:220px;
                             object-fit: cover;"id="re">
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

 <!-- pagination start -->
<div id="teacher" class="pagination pagination-primary m-4 pagination-wrap"  >
   {{ $teacher->links('vendor.pagination.custom', ['paginator' => $teacher]) }}
 </div>
<!-- pagination end -->