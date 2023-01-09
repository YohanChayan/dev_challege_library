<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>App Library</title>


    {{-- Favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('custom/template/img/favicon.png') }}">
    <link rel="shortcut icon" sizes="192x192" href="{{ asset('custom/template/img/favicon.png') }}">

    @include('layouts.customTheme')

</head>
<body>
    <div id="app">
        @if(Auth::check())

            @include('layouts.main')
        @else

            @include('layouts.navbar')
            <main class="py-3">
                @yield('content')
            </main>
            
        @endif

        @include('layouts.scripts')
        @include('sweetalert::alert')

        @yield('scripts')
    </div>
</body>
</html>
