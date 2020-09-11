<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->meta_description ?? $page->siteDescription }}">
        @stack('meta')
        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>
        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="icon" href="/favicon.ico">
        <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/logo.svg">
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/logo.svg">
        <link rel="icon" type="image/png" sizes="192x192"  href="/assets/images/logo.svg">
        <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/logo.svg">
        <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/logo.svg">
        <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo.svg">
	    <link rel="manifest" href="/manifest.json">
        <link href="/feed/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">
        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {"families": ["Poppins:300,400,500,600,700"]},
                active: function () {
                    sessionStorage.fonts = true;
                }
            });
        </script>
        <!--end::Fonts -->
        @if ($page->production)
            <script
                data-ad-client="ca-pub-8880749208215381"
                async
                src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-162824010-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'UA-162824010-1');
            </script>
        @endif
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>


    <body>
        <div class="theme-light bg-primary text-dark font-body">

            <!--Nav-->
            @include('_layouts.partials.navigation')
            <!-- // Nav !-->

            <!-- Content !-->
            <div class="pt-16">

                <!-- Article/Featured Header !-->
                @stack('header')
                <!-- // Article/Featured Header !-->

                <div class="flex flex-col lg:flex-row">
                    @include('_layouts.partials.sidebar')
                    <div class="w-full lg:w-3/5 flex flex-1 flex-col lg:px-6 pt-4" id="content">
                        @yield('body')
                    </div>
                    @include('_layouts.partials.related')
                </div>
            </div>
            <!-- // Content !-->

            <!--Footer-->
            @include('_layouts.partials.footer')
            <!-- // Footer-->

        </div>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
        @stack('scripts')
    </body>
</html>
