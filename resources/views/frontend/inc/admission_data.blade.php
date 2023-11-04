@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp
<div class="row g-4 g-xl-5 mt-2 slider-container d-flex justify-content-center">
    @foreach ($admission as $item)
        <div class="col-lg-4 col-sm-10 col-md-5 mx-auto mb-4">
            <div class="card shadow-lg mt-4" style="height: 100%; display: flex; flex-direction: column;">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <a class="d-block blur-shadow-image">
                        <img style="width:100%; height:200px"
                            src="{{ asset('images/admission/' . $item->image) }}"
                            alt="{{ $item->name }}" class="img-fluid shadow border-radius-lg ">
                    </a>
                </div>
                <div class="card-body" style="flex-grow: 1;">
                    <h5 class="font-weight-normal"> 
                        <a class="text-dark"
                            href="{{ route('forntend.admission_show', $item->id) }}">{{ $item->{"name$loc"} }}
                        </a>
                    </h5>
                </div>
            </div>
        </div>
    @endforeach
</div>

 <!-- For Course Pagination -->
 <div id="ad" class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%">
    {{ $admission->links('vendor.pagination.custom') }}
</div>