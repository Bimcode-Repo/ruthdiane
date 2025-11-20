@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-center">
        <div class="flex items-center gap-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-light/50 cursor-not-allowed font-joan">
                    ← Précédent
                </span>
            @else
                <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="px-4 py-2 text-light hover:text-primary transition-colors duration-300 font-joan">
                    ← Précédent
                </button>
            @endif

            {{-- Pagination Elements --}}
            <div class="flex items-center gap-1">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="px-3 py-2 text-light/50 font-joan">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-4 py-2 bg-primary text-background font-semibold rounded font-andada">
                                    {{ $page }}
                                </span>
                            @else
                                <button wire:click="gotoPage({{ $page }})" class="px-4 py-2 text-light hover:text-primary hover:bg-light/10 rounded transition-colors duration-300 font-andada">
                                    {{ $page }}
                                </button>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="px-4 py-2 text-light hover:text-primary transition-colors duration-300 font-joan">
                    Suivant →
                </button>
            @else
                <span class="px-4 py-2 text-light/50 cursor-not-allowed font-joan">
                    Suivant →
                </span>
            @endif
        </div>
    </nav>
@endif
