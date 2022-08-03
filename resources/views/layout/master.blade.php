<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
   @include('CSS.CSS')

</head>
<body>
@include('layout.navigation')

@yield('content')
{{--    @include('layout.navigarion')--}}

@include('JS')
@yield('js')
</body>
</html>
