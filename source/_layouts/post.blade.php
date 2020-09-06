@extends('_layouts.master')

@push('meta')
    <link rel="canonical" href="{{ $page->getUrl() }}" />
    <meta property="og:title" content="{{ $page->title }}" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:image" content="{{ $page->image ?? '/assets/images/breaking.jpg' }}"/>
    <meta property="og:description" content="{{ $page->description }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@finescoop" />
    <meta name="twitter:creator" content="@finescoop" />
@endpush

@push('header')
    @component('_layouts.partials.header', [
        'image' => $page->image,
        'title' => $page->title,
        'description' => $page->description,
    ])
    @endcomponent
@endpush

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

    <nav class="flex flex-col md:flex-row justify-between text-sm text-dark mb-4 mx-2 md:mx-0">
        <div class="w-full md:w-1/2 mb-3 mx-3 md:mx-0 mr-0 md:mr-2">
            @if ($next = $page->getNext())
                <a
                    href="{{ $next->getUrl() }}"
                    title="Older Post: {{ $next->title }}"
                >
                    &LeftArrow; {{ $next->title }}
                </a>
            @endif
        </div>

        <div class="w-full md:w-1/2 mx-3">
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=612047886170325&autoLogAppEvents=1" nonce="5vbmW42u"></script>

    <div class="w-full mx-3">
        <div class="fb-comments" data-href="http://finescoop.com" data-numposts="10" data-width=""></div>
    </div>
@endsection
