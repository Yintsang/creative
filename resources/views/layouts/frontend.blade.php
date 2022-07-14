<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>{{ $seo['title'] ?? '' }}</title>
        <meta name="description" content="{{ $seo['description'] ?? '' }}" />
        <meta name="keywords" content="{{ $seo['keywords'] ?? '' }}" />
        <meta property="og:title" content="{{ $seo['title'] ?? '' }}"/> 
        <meta property="og:description" content="{{ $seo['description'] ?? '' }}"/> 
        <meta property="og:image" content="{{ $seo['og_image'] ?? '' }}"/> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="canonical" href="{{ url()->current() }}" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <link href="{{ asset_frontend('css/website.css') }}" rel="stylesheet">

        <script>
            var config = {
                endpoints: {
                    refresh_csrf: "{{ route('refresh-csrf') }}"
                }
            }
        </script>

        @yield('css')
    </head>
    <body>
        @include('frontend.common.header')
        @yield('content')
        @include('frontend.common.footer')
        <script src="{{ asset_frontend('js/jquery-3.3.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset_frontend('js/jquery.bpopup.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset_frontend('js/refresh-csrf.js') }}" type="text/javascript"></script>
        @include('frontend.common.ie')

        <script src="{{ asset_frontend('js/website.js') }}" type="text/javascript"></script>
        @yield('js')
    </body>
</html>
