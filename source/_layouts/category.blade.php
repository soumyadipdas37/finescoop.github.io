---
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.master')

@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush

@section('body')

    <!-- Breadcrumbs !-->
    @component('_layouts.partials.breadcrumb')
        @slot('breadcrumb')
            Reading now:
            <span class="ml-1 text-xs font-bold flex">
                @yield('content')
            </span>
        @endslot
    @endcomponent
    <!-- // Breadcrumbs !-->

    <!-- Articles -->
    <div class="flex-wrap order-2 md:pb-8">
        @foreach ($pagination->items as $post)
            @include('_layouts.components.post-preview-inline')
            @if ($post != $pagination->items->last())
                <hr class="border-b my-6">
            @endif
        @endforeach

        @if ($pagination->pages->count() > 1)
            <nav class="flex text-base my-8">
                @if ($previous = $pagination->previous)
                    <a
                        href="{{ $previous }}"
                        title="Previous Page"
                        class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                    >&LeftArrow;</a>
                @endif

                @foreach ($pagination->pages as $pageNumber => $path)
                    <a
                        href="{{ $path }}"
                        title="Go to Page {{ $pageNumber }}"
                        class="bg-gray-200 hover:bg-gray-400 text-blue-700 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : '' }}"
                    >{{ $pageNumber }}</a>
                @endforeach

                @if ($next = $pagination->next)
                    <a
                        href="{{ $next }}"
                        title="Next Page"
                        class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                    >&RightArrow;</a>
                @endif
            </nav>
        @endif
    </div>
@stop
