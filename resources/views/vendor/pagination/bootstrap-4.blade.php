
@if ($paginator->hasPages())
    <ul class="paginationC " role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-itemC disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-linkC" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-itemC pointer new_page" data-url="{{ $paginator->previousPageUrl() }}" >
                <a class="page-linkC "  rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
       
        {{-- Pagination Elements --}}

        <?php
        $start = $paginator->currentPage() - 1; // show 3 pagination links before current
        $end = $paginator->currentPage() + 1; // show 3 pagination links after current
        if($start < 1) {
            $start = 1; // reset start to 1
            $end += 1;
        } 
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
    ?>

@if($start > 1)
        <li class="page-itemC pointer new_page" data-url="{{ $paginator->url(1) }}">
            <a class="page-linkC" >{{1}}</a>
        </li>
        @if($paginator->currentPage() != 4)
            {{-- "Three Dots" Separator --}}
            <li class="page-itemC disabled pointer " aria-disabled="true" ><span class="page-linkC">...</span></li>
        @endif
    @endif
        @for ($i = $start; $i <= $end; $i++)
            <li class="page-itemC pointer new_page {{ ($paginator->currentPage() == $i) ? ' active' : '' }}" data-url="{{ $paginator->url($i) }}">
                <a class="page-linkC" >{{$i}}</a>
            </li>
        @endfor
    @if($end < $paginator->lastPage())
        @if($paginator->currentPage() + 3 != $paginator->lastPage())
            {{-- "Three Dots" Separator --}}
            <li class="page-itemC disabled pointer " aria-disabled="true"><span class="page-linkC">...</span></li>
        @endif
        <li class="page-itemC pointer new_page" data-url="{{ $paginator->url($paginator->lastPage()) }}">
            <a class="page-linkC" >{{$paginator->lastPage()}}</a>
        </li>
    @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-itemC pointer new_page" data-url="{{ $paginator->nextPageUrl() }}">
                <a class="page-linkC new_page"    rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-itemC disabled " aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-linkC" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
