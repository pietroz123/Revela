<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Ícones -->
        <link rel="shortcut icon" href="{{ asset('img/icons/logo.png') }}" type="image/x-icon">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') • Revela</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        
        <!-- Styles -->
        <link href="{{ asset('css/mdbootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">      {{-- Font Awesome --}}
        @yield('styles')

        <!-- Hotjar Tracking Code for http://revela.online/ -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:1545915,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>
        
    </head>
    
    <body>
        <div id="app">
            @yield('header-bar')
            <main class="@yield('main-class')">
                @include('includes.alerts')
                @yield('content')
            </main>
            @include('includes.footer')
        </div>
        
        <!-- Scripts -->
        <script src="{{ asset('js/mdbootstrap.js') }}"></script>            {{-- MDBootsrap --}}
        <script src="https://kit.fontawesome.com/5736e54317.js"></script>   {{-- Font Awesome --}}
        @yield('scripts')

    </body>

</html>
