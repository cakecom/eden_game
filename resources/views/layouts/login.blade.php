<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Eden | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<style>
    #bottom {
        background: #0b1222 url({{asset('images/web/footer.jpg')}}) top no-repeat;
        min-height: 380px;
        width: 100%;
        clear: both;
    }
    #header {
        height: 500px;
        background: url({{asset('images/web/header.jpg')}}) top no-repeat;
        width: 100%;

    }
    #content-bottom {
        background: url({{asset('images/web/bottom.jpg')}}) bottom no-repeat;
        overflow: auto;
        /*min-height: 649px;*/
        padding-bottom: 40px;
    }
    #content {
        background: url({{asset('images/web/content.jpg')}}) top no-repeat;
        width: 100%;
        clear: both;
    }
</style>
<body class="hold-transition login-page">
<div id="header">
    @yield('content')
</div>

</body>
</html>

