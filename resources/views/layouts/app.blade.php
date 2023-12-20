<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')    
    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('css')
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <script src="https://kit.fontawesome.com/62bd119cd8.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro|Lato:400,300,70|Open+Sans:400,600,700,300" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.datetimepicker.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/validationEngine.jquery.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/template.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/apt_apply_shared.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-confirm.min.css') }}" > 
    <link rel="stylesheet" type="text/css" href="{{ asset('css/apt_apply_2.css?t=now()') }}" > 
</head>
<body>
    <div id="app">
       

        <main class="">
            @yield('content')
        </main>
    </div>

    @yield('js')
 <!-- Scripts -->
 <script src="{{ asset('js/login.js') }}"></script>   
 <script src="{{ asset('js/jquery.js') }}"></script>   
 <script src="{{ asset('js/jquery.min.js') }}"></script>   
 <script src="{{ asset('js/jquery.validationEngine-en.js?t=now()') }}"></script>   
 <script src="{{ asset('js/jquery.validationEngine.js?t=now()') }}"></script>   
 <script src="{{ asset('js/jquery.datetimepicker.full.min.js?t=now()') }}"></script>   
 <script src="{{ asset('js/moment.min.js?t=date("YmdHis")') }}"></script>   
 <script src="{{ asset('js/apt_apply_2.js?t=now()') }}"></script> 
 <script src="{{ asset('js/search.js?t=now()') }}"></script> 
 <script src="{{ asset('js/post.js?t=now()') }}"></script> 
 <script src="{{ asset('js/remove.js?t=now()') }}"></script> 
 
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
</body>
</html>
