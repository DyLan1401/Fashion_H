@if ($paginator->hasPages())
    <div class="basic-pagination basic-pagination-2 text-center mt-20">
        <ul>
            {{-- Trang đầu --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><span><i class="fas fa-angle-double-left"></i></span></li>
            @else
                <li><a href="{{ $paginator->url(1) }}"><i class="fas fa-angle-double-left"></i></a></li>
            @endif

            {{-- Các trang số --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif

                {{-- Dấu ba chấm --}}
                @if (is_string($element))
                    <li><a href="#"><i class="fas fa-ellipsis-h"></i></a></li>
                @endif
            @endforeach

            {{-- Trang cuối --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-double-right"></i></a></li>
            @else
                <li class="disabled"><span><i class="fas fa-angle-double-right"></i></span></li>
            @endif
        </ul>
    </div>
@endif