<div>
    @if ($paginator->hasPages())
        
            <ul class="page-numbers">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li><a class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        &lsaquo;
                    </a></li>
                @else
                   <li> <a class="page-number-item" style="cursor: pointer" dusk="previousPage" class="page-link" wire:click="previousPage" wire:loading.attr="disabled" rel="prev" aria-label="@lang('pagination.previous')">                      
                   &lsaquo;  
                </a> </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li><a class="disabled" aria-disabled="true">{{ $element }}</a> </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                               <li> <a class="page-number-item current" wire:key="paginator-page-{{ $page }}" aria-current="page">{{ $page }}</a> </li>
                            @else
                               <li> <a class="page-number-item" style="cursor: pointer" wire:key="paginator-page-{{ $page }}" wire:click="gotoPage({{ $page }})">{{ $page }}</a> </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                   <li> <a class="page-number-item" style="cursor: pointer" dusk="nextPage"  wire:click="nextPage" wire:loading.attr="disabled" rel="next" aria-label="@lang('pagination.next')">
                        &rsaquo;
                   </a>  </li>
                @else
                   <li> <a class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        &rsaquo;
                   </a> </li>
                @endif
            </ul>
       
    @endif
</div>
