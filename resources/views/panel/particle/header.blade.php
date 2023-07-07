<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" prefix="og:http://ogp.me/" itemscope="itemscope"
      itemtype="http://schema.org/WebPage">
<head>
    <title>{{ $title or '' }}</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="base-url" content="{{ url('/') }}"/>
    <link rel="Shortcut Icon" type="image/x-icon" href="{{ asset('img/logo.png') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ripple.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jgrowl.min.css') }}"/>
    @stack('stylesheets')
<!-- Chosen css -->
    <link rel="stylesheet" href="{{ asset('user/chosen/css.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/core.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/colors.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fonts.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/panel.css') }}"/>

    <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <style>
        iframe.skiptranslate {
            display: none !important
        }

        body {
            top: 0px !important;
        }

        .goog-te-gadget > * {
            display: none;
        }

        .goog-te-gadget {
            height: 25px !important;
            position: relative;
            overflow-y: hidden;
        }

        .goog-te-gadget > div {
            display: block !important;
        }
    </style>
</head>
<body>
@include('panel.particle.nav')