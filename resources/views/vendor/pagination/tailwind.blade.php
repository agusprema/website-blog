@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between mb-2">
        <div class="flex-1 flex items-center justify-center md:justify-between">
            <div class="hidden md:block">
                <p class="text-sm text-dark dark:text-light leading-5">
                    {!! __('Showing') !!}
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    {!! __('to') !!}
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if (!$paginator->onFirstPage())
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary rounded-l-md leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="&amp;laquo; Previous">
                            <i class="fas fa-chevron-left" aria-hidden="true"></i>
                        </a>
                        {{-- @else
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary rounded-l-md leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-left"></i>
                        </span> --}}
                    @endif


                    @if ($paginator->currentPage() >= $paginator->lastPage() / 2.5)
                        <a href="{{ $paginator->url(1) }}" rel="prev" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                    @endif


                    @if ($paginator->currentPage() - 2 >= 1)
                        <a href="{{ $paginator->url($paginator->currentPage() - 2) }}" class="hidden md:block relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $paginator->currentPage() - 2]) }}">
                            {{ $paginator->currentPage() - 2 }}
                        </a>
                    @endif

                    @if ($paginator->currentPage() - 1 >= 1)
                        <a href="{{ $paginator->url($paginator->currentPage() - 1) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $paginator->currentPage() - 1]) }}">
                            {{ $paginator->currentPage() - 1 }}
                        </a>
                    @endif

                    <span aria-current="page">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-bold text-dark dark:text-light bg-body border border-primary cursor-default leading-5">{{ $paginator->currentPage() }}</span>
                    </span>

                    @if ($paginator->currentPage() + 1 <= $paginator->lastPage())
                        <a href="{{ $paginator->url($paginator->currentPage() + 1) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $paginator->currentPage() + 1]) }}">
                            {{ $paginator->currentPage() + 1 }}
                        </a>
                    @endif

                    @if ($paginator->currentPage() + 2 <= $paginator->lastPage())
                        <a href="{{ $paginator->url($paginator->currentPage() + 2) }}" class="hidden md:block relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $paginator->currentPage() + 2]) }}">
                            {{ $paginator->currentPage() + 2 }}
                        </a>
                    @endif

                    @if ($paginator->currentPage() <= $paginator->lastPage() / 1.5)
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" rel="prev" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary rounded-r-md leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 bg-body border border-primary rounded-r-md leading-5 dark:hover:text-primary hover:text-primary focus:z-10 focus:outline-none focus:ring ring-primary transition ease-in-out duration-150" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
