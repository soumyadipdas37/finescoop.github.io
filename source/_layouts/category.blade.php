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
        @foreach ($page->posts($posts) as $post)
            @include('_layouts.components.post-preview-inline')
        @endforeach
    </div>
@stop
