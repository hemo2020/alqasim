<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <div style="position: fixed; top: 10px; left: 10px; z-index: 10000; font-size: 1.1rem; font-weight: bold;">
        <a href="{{ url('/lang/' . (app()->getLocale() == 'ar' ? 'en' : 'ar') . '?redirect=/') }}" style="color: #000;">
            {{ app()->getLocale() == 'ar' ? 'English' : 'العربية' }}
        </a>
    </div>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- RTL or LTR stylesheet -->
    @if(app()->getLocale() == 'ar')
        <link href="{{ asset('css/rtl.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('css/ltr.css') }}" rel="stylesheet">
    @endif

    <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidenav-init.js') }}"></script>

    <!-- Fonts -->
     <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet">

    <!-- App default Styles -->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
