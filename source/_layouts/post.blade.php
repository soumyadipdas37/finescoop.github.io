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
            <span class="text-xs font-bold">
                {{ $page->title }}
            </span>
        @endslot
    @endcomponent
    <!-- // Breadcrumbs !-->

{{--    @if ($page->categories)--}}
{{--        @foreach ($page->categories as $i => $category)--}}
{{--            <a--}}
{{--                href="{{ '/blog/categories/' . $category }}"--}}
{{--                title="View posts in {{ $category }}"--}}
{{--                class="inline-block bg-gray-300 hover:bg-blue-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"--}}
{{--            >{{ $category }}</a>--}}
{{--        @endforeach--}}
{{--    @endif--}}

    <div class="flex-wrap order-2 p-4 lg:p-0 md:pb-8 whitespace-pre-line">
        @yield('content')
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    {{ $previous->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
