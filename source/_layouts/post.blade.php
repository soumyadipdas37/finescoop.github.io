@extends('_layouts.master')

<!-- Article Meta !-->
@push('meta')
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:image" content="{{ $page->cover_image ?? '/assets/images/breaking.jpeg' }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
@endpush
<!-- // Article Meta !-->

<!-- Article Header !-->
@push('header')
    @component('_layouts.partials.header', [
        'image' => $page->cover_image,
        'title' => $page->title,
        'description' => $page->excerpt,
    ])
    @endcomponent
@endpush
<!-- // Article Header !-->


@section('body')

    <!-- Breadcrumbs !-->
    @component('_layouts.partials.breadcrumb')
        @slot('breadcrumb')
            Reading now:
            <span class="ml-2 text-xs font-bold">
                {{ $page->title }}
            </span>
        @endslot
    @endcomponent
    <!-- // Breadcrumbs !-->

    <div class="flex-wrap p-4 lg:p-0 md:pb-8 whitespace-pre-line text-sm">
        @yield('content')
    </div>

    <nav class="flex flex-col md:flex-row justify-between text-sm text-dark mb-4 mx-2">
        <div class="w-full md:w-1/2 mb-3 mx-1">
            @if ($next = $page->getNext())
                <a
                    href="{{ $next->getUrl() }}"
                    title="Older Post: {{ $next->title }}"
                >
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div class="w-full md:w-1/2 mx-1">
            @if ($previous = $page->getPrevious())
                <a
                    href="{{ $previous->getUrl() }}"
                    title="Newer Post: {{ $previous->title }}"
                >
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
