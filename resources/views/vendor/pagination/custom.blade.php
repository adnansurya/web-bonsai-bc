@if ($paginator->hasPages())
    <div class="flex-w flex-c-m p-t-47">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                &lsaquo;
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 disabled" aria-disabled="true">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 active-pagi1" aria-current="page">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="flex-c-m txt-s-115 cl6 size-a-23 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1" rel="next" aria-label="@lang('pagination.next')">
                Next
                <span class="lnr lnr-chevron-right m-t-3 m-l-7"></span>
                <span class="lnr lnr-chevron-right m-t-3"></span>
            </a>
        @else
            <span class="flex-c-m txt-s-115 cl6 size-a-24 how-btn1 bo-all-1 bocl15 hov-btn1 trans-04 m-all-3 p-b-1 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                Next
                <span class="lnr lnr-chevron-right m-t-3 m-l-7"></span>
                <span class="lnr lnr-chevron-right m-t-3"></span>
            </span>
        @endif
    </div>
@endif
