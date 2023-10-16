<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('page-title', 'Notre belle agence immobilière') | {{ isset($_setting) ? $_setting->name : 'App Name' }}
        </title>

        @section('header-styles')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="{{ asset('assets/core-site/styles/app.css') }}">
        @show
    </head>
    <body>
        <header class="header">
            @include('layouts.partials._header._navigation')
        </header>

        <section class="content section">
            <div class="container section__container">
                {{ $slot }}

                <div class="footer mt-5">
                    @include('layouts.partials._footer._footer')
                </div>
            </div>
        </section>

        @section('footer-scripts')
            <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
            <script src="{{ asset('assets/core-site/scripts/app.js')}}"></script>
        @show
    </body>
</html>
