<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Snippets</title>

    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" media="screen"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    @stack('styles')

</head>
<body>
<div class="container">

    <div class="jumbotron">
        <div class="container">
            <h1>Awesome snippets</h1>
            <p>
                <a href="{{ route('snippet.create') }}" class="btn btn-primary btn-lg">Add new snippet</a>
            </p>
        </div>
    </div>


    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@stack('scripts')

</body>
</html>