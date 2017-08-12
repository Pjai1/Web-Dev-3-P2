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
    <div class="side-nav">
        <div class="hamburger">
            <i class="icon menu-icon"></i>
        </div>
        <div class="upper-side-nav-item">
            <a href="#"><i class="icon search-icon"></i></a>    
        </div>
        <div class="upper-side-nav-item">
            <a href="#"><i class="icon faq-icon"></i></a>    
        </div>
        <div class="upper-side-nav-item">
            <a href="#"><i class="icon about-icon"></i></a>    
        </div>
        <div class="divider"></div>
        <div class="category-icons">
            <a href="#"><i class="icon dog-icon"></i></a>
            <a href="#"><i class="icon cat-icon"></i></a>
            <a href="#"><i class="icon fish-icon"></i></a>
            <a href="#"><i class="icon bird-icon"></i></a>
            <a href="#"><i class="icon animal-icon"></i></a>
        </div>
        <div class="nav-logo">
            <img src="/img/logo_small.png" />
        </div>    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
