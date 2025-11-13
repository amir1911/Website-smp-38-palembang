@if ($paginator->lastPage() > 1)
    <nav class="flex justify-center mt-10">
        <ul class="flex space-x-2">

            {{-- Previous --}}
            <li>
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="px-4 py-2 rounded-full border bg-white text-gray-600 hover:bg-gray-100 transition
                    {{ $paginator->onFirstPage() ? 'opacity-40 cursor-not-allowed' : '' }}">
                    ‹
                </a>
            </li>

            {{-- Numbers --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            <a href="{{ $url }}"
                                class="px-4 py-2 rounded-full border transition
                                {{ $paginator->currentPage() == $page 
                                    ? 'bg-primary text-white border-primary'
                                    : 'bg-white hover:bg-gray-100 text-gray-700' }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li>
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="px-4 py-2 rounded-full border bg-white text-gray-600 hover:bg-gray-100 transition
                    {{ !$paginator->hasMorePages() ? 'opacity-40 cursor-not-allowed' : '' }}">
                    ›
                </a>
            </li>

        </ul>
    </nav>
@else
    {{-- Always show 1 page even if only one --}}
    <nav class="flex justify-center mt-10">
        <ul class="flex space-x-2">
            <li>
                <span class="px-4 py-2 rounded-full bg-primary text-white border border-primary">
                    1
                </span>
            </li>
        </ul>
    </nav>
@endif
