<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="page-wrapper">
        @if (Cookie::get('cookieClicked') === null)
        <div class="cookie-layer" id="cookie-layer">
            <div class="cookie-window">
                <img src="/img/bone.png" />
                <div class="cookie-content">
                    <div class="close-cookie">
                        <span class="close-cookie-icon" onclick="closeCookie()">X</span>
                    </div>
                    <span class="cookie-title">Cookies</span>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    <button type="submit" class="cookie-button" onclick="closeCookie()">ok, verder surfen</button>
                </div>
            </div>
        </div>
        @endif
        <div class="side-nav">
            <div class="hamburger">
                <i class="icon menu-icon"></i>
            </div>
            <div class="upper-nav-items">
                <div class="upper-side-nav-item {{ $_SERVER['REQUEST_URI'] == '/search' ? 'active-nav-item' : null}}">
                    <a href="/search"><i class="icon search-icon"></i></a>    
                </div>
                <div class="upper-side-nav-item {{ $_SERVER['REQUEST_URI'] == '/faq' ? 'active-nav-item' : null}}">
                    <a href="/faq"><i class="icon faq-icon"></i></a>    
                </div>
                <div class="upper-side-nav-item {{ $_SERVER['REQUEST_URI'] == '/about' ? 'active-nav-item' : null}}">
                    <a href="/about"><i class="icon about-icon"></i></a>    
                </div>
            </div>
            <div class="divider"></div>
            <div class="category-icons">
                <a href="#"><i class="icon dog-icon {{Request::is('*/category/1*') ? 'active-icon': ''}}"></i></a>
                <a href="#"><i class="icon cat-icon"></i></a>
                <a href="#"><i class="icon fish-icon"></i></a>
                <a href="#"><i class="icon bird-icon"></i></a>
                <a href="#"><i class="icon animal-icon"></i></a>
            </div>
            <div class="nav-logo">
                <img src="/img/logo_small.png" />
            </div>    
        </div>
        @yield('content')
        </div>
    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-104503858-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>
