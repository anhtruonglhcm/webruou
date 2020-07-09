<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_des')">
    <meta name="keywords" content="@yield('meta_key')">
    <meta name="twitter:card" content="summary" />
    <meta property="og:site_name" content="{{ $setting->name }}" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="@yield('title_seo')" />
    <meta name="twitter:description" content="@yield('meta_des')" />
    <meta name="twitter:title" content="@yield('title_seo')" />
    <link REL="SHORTCUT ICON" href="{{ asset($setting->icon) }}">
    <title>@yield('title')</title>
    <link rel="canonical" href="@yield('canonical')"/>
    <link href="{{asset($setting->icon)}}" rel="icon" />
    
    <link href="{{asset('frontend/css/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/jquery.bxslider.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick-theme.css')}}" />
    <link href="{{asset('frontend/css/owl.carousel.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/stylesheet2.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,300i,400,400i,500,700" rel="stylesheet">
    <script type="text/javascript" src="{{asset('frontend/js/jquery-2.0.3.min.js')}}"></script>

    
    {!! $setting->thead !!}
</head>
<body>
    {!! $setting->tbody !!}

    @include('frontend.partials.header')
    @yield('content')
    @include('frontend.partials.footer')
    
    <script src="{{asset('frontend/js/bootrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/slick.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/common.js')}}"></script>
    @yield('script')
    

</body>
</html>
