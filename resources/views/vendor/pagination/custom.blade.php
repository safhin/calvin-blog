@if ($paginator->hasPages())
    <div class="row">
        <div class="column large-12">
            <nav class="pgn">
                <ul>
                    @if ($paginator->onFirstPage())
                        <li class="disabled">
                            <span class="pgn__prev" href="#0">
                                Prev
                            </span>
                        </li>
                    @else
                        <li>
                            <span class="pgn__prev" href="#0">
                                Prev
                            </span>
                        </li>
                    @endif

                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><span class="pgn__num current">{{ $page }}</span></li>
                                @else
                                <li><a class="pgn__num" href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @if ($paginator->hasMorePages())
                        <li>
                            <span class="pgn__next" href="#0">
                                Next
                            </span>
                        </li>
                    @else
                        <li class="disabled">
                            <span class="pgn__next" href="#0">
                                Next
                            </span>
                        </li>
                    @endif
                </ul>
            </nav> <!-- end pgn -->
        </div> <!-- end column -->
    </div>
@endif