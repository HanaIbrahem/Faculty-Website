@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp

<div class="row g-4 g-xl-5 slider-container d-flex justify-content-center">
    @foreach ($courses as $item)
        <div class="col-lg-4 col-sm-6 col-md-6 mx-auto mb-4 text-start">
            <div class="card shadow-lg mt-4 h-100">

                <div class="card-body text-center d-flex flex-column">



                    <h4 class="flex-grow-1">
                        <a class="text-dark" href="{{ route('forntend.course', $item->id) }}">
                            {{ $item->{"name$loc"} }}
                        </a>
                    </h4>
                    @if ($loc == '_ku')
                        <p class="text-dark">ئاست{{ $item->type }}</p>

                        {{ $item->id }}
                    @else
                        <p class="text-dark">Level:{{ $item->type }}</p>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- For Course Pagination -->
<div id="course" class="pagination pagination-primary m-4 pagination-wrap" style="margin-left:10%" >
    {{ $courses->links('vendor.pagination.custom', ['paginator' => $courses]) }}
</div>
{{-- {{ $courses->links('vendor.pagination.custom') }} --}}
