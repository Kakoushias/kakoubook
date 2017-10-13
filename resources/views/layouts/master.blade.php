<!doctype html>
<html>
    <head>

        <title>@yield('title')</title>


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



    </head>
    <body>
        @include('includes.header')

        <div class="container">
            @yield('content')
        </div>

        <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous"></script>

        {{--<script--}}
                {{--src="https://code.jquery.com/jquery-migrate-3.0.1.js"--}}
                {{--integrity="sha256-VvnF+Zgpd00LL73P2XULYXEn6ROvoFaa/vbfoiFlZZ4="--}}
                {{--crossorigin="anonymous"></script>--}}
        {{--<!-- Latest compiled and minified JavaScript -->--}}


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{ URL::to('src/js/app.js') }}"></script>

    </body>
</html>










