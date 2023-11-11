@php
    $loc = '';
    if (Session::get('locale') == 'ku') {
        $loc = '_ku';
    }
@endphp


<section class="pt-lg-5">
    @foreach ($research as $item )
    <div class="row mb-3">
        <div class="card">

            <div class="card-header pb-1 mb-1">

                <h3 class="fs-5 text-dark">
                    <a href="{{route('forntend.research_show',$item->id)}}">{{$item->{"name$loc"} }}</a>
                </h3>
                <div>
                    @if ($loc=='_ku')
                    بەشی
                    {{ $item->department->name_ku }}

                    @else
                    {{ $item->department->name }}
                    Department
                    @endif
                </div>
            </div>
            

            <div class="card-body pt-1">

                <p>{!! Str::limit($item->{"description$loc"},200) !!}</p>
                <p>{{ $item->created_at->format('d/m/y')}}</p>

            </div>

        </div>
    </div>
    @endforeach
</section>
 <!-- For Course Pagination -->
 <div class="pagination pagination-primary mt-4 ms-0 me-0 ps-sm-0 pe-sm-0 pagination-wrap" >
    {{ $research->onEachSide(1)->links('vendor.pagination.custom') }}
</div>

    
