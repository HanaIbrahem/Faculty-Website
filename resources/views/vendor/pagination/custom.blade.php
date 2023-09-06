@php
     $loc='';
    if (Session::get('locale') == 'ku') {
     $loc='ku';
    } 
@endphp
@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
                <ul class="pagination">


 @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                   <a class="page-link" href="#">
                    <span aria-hidden="true">
                        @if ($loc='ku')
                        <i class="material-icons fa fa-angles-right" aria-hidden="true"></i>
                        @else
                        <i class="material-icons fa fa-angles-left" aria-hidden="true"></i>

                        @endif
                    
                    
                    </span>
                   </a>
                </li>
            @else
                <li class="page-item">
                
                    <a class="page-link"  href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                        <span aria-hidden="true">
                        @if ($loc=='ku')
                        <i class="material-icons fa fa-angles-right" aria-hidden="true"></i>
                        @else
                        <i class="material-icons fa fa-angles-left" aria-hidden="true"></i>

                        @endif
                        </span>
                    </a>
                </li>
                
            @endif


@foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"> 
                            <a class="page-link rounded-pill" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @else
                            <li><a class="page-link rounded-pill" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach


 @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a  class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                        <span aria-hidden="true">
                            @if ($loc=='ku')
                            <i class="material-icons fa fa-angles-left" aria-hidden="true"></i>

                            @else
                            <i class="material-icons fa fa-angles-right" aria-hidden="true"></i>

                            @endif
                        </span>
                    </a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                   <a class="page-link rounded-pill" href="#">
                    <span aria-hidden="true">
                        @if ($loc=='ku')
                        <i class="material-icons fa fa-angles-left" aria-hidden="true"></i>

                        @else
                        <i class="material-icons fa fa-angles-right" aria-hidden="true"></i>

                        @endif
                </span></a>
                </li>
            @endif
 

                </ul>
            </nav>



 @endif 

