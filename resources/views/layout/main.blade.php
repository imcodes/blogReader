<!DOCTYPE html>
<html lang="en">
    @props([
        'pageDescription'=>'This is a blog reader with awesome blog authors with estream engaing contents.',
        'pageTitle'=>'Welcome to our Awesome Site'])
    <head>
        @include('include.head',['pageDescription'=>$pageDescription,'pageTitle'=>$pageTitle])

        @stack('styles')

        @stack('headScripts')
    </head>
    
<body>
    @include('include.header')

    @yield('banner','')

    @yield('content')

    @include('include.footer')

    @include('include.scripts')
    @stack('scripts')
</body>
</html>