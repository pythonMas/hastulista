@if ($paginator->hasPages())
    <div class="shop_page_nav d-flex flex-row">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="disabled d-flex flex-column align-items-center justify-content-center"> <i class="fas fa-chevron-left"></i> </a>

        @else
            <a class="page_prev d-flex flex-column align-items-center justify-content-center" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <i class="fas fa-chevron-left"></i>
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item disabled" aria-disabled="true">
                    <ul class="page_nav d-flex flex-row">
                        <li>{{ $element }}</li>
                    </ul>
                </a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a  aria-current="page">
                            <ul class="page_nav d-flex flex-row">
                                <li>{{ $page }}</li>
                            </ul>
                        </a>
                    @else
                        <a  href="{{ $url }}">
                            <ul class="page_nav d-flex flex-row">
                                <li >{{ $page }}</li>
                            </ul>
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

                <a class="page_next d-flex flex-column align-items-center justify-content-center" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <i class="fas fa-chevron-right"></i>
                </a>

        @else
            <a class="disabled d-flex flex-column align-items-center justify-content-center"> <i class="fas fa-chevron-right"></i> </a>

        @endif
    </div>
@endif
