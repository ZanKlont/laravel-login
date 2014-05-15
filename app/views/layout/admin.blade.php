<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        {{-- Bootstrap minified CSS --}}
        {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
        {{-- Google Fonts --}}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Alef') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Inconsolata') }}
        {{-- Custom Css --}}
        {{ HTML::style('css/styles.css'); }}

        <title></title>
    </head>
    <body>
        
        @if(Session::has('global'))
            <p>{{ Session::get('global') }}</p>
        @endif

        <div class="container">
            @yield('content')
        </div>

        {{-- Jquery minified JavaScript --}}
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
        {{-- Bootstrap minified JavaScript --}}
        {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
    </body>
</html>