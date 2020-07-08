<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .thumb {
            margin: 10px 5px 0 0;
            width: 300px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">เว็ปไซต์หลัก</a>
            </li>
            {{--            <li class="nav-item d-none d-sm-inline-block">--}}
            {{--                <a href="#" class="nav-link">Contact</a>--}}
            {{--            </li>--}}
        </ul>

        <!-- SEARCH FORM -->
    {{--        <form class="form-inline ml-3">--}}
    {{--            <div class="input-group input-group-sm">--}}
    {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-navbar" type="submit">--}}
    {{--                        <i class="fas fa-search"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}

    <!-- Right navbar links -->

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            {{--            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
            {{--                 style="opacity: .8">--}}
            <span class="brand-text font-weight-light">Eden Online</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                {{--                <div class="image">--}}
                {{--                    <img src="{{asset('image/profile.png')}}" class="img-circle elevation-2" alt="User Image">--}}
                {{--                </div>--}}
                <div class="info">

                    <a href="#" class="d-block">User : {{ session('username') }}</a>
                </div>
            </div>
            <div class="d-flex">
                <div class="info-box">
                    <span class="info-box-icon bg-danger"><i class="fas fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Point</span>
                        <span class="info-box-number">{{$point['pvalues']}}</span>
                        <input type="hidden" id="point" value="{{$point['pvalues']}}">
                        <input type="hidden" id="bonus" value="{{$point['bonus']}}">
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="user-panel d-flex">
                <div class="info-box">
                    <span class="info-box-icon bg-success"><i class="fas fa-star"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Bonus</span>
                        <span class="info-box-number">{{$point['bonus']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="{{route('account.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-shopping-cart text-red"></i>
                            <p>Item Shop</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('history.index')}}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt text-blue"></i>
                            <p>ประวัติการได้รับไอเทม</p>
                        </a>
                    </li>
                    {{--                    <div style="border-bottom: 1px solid #4f5962;"></div>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout2')}}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off text-red"></i>
                            <p>ออกจากระบบ</p>
                        </a>
                        <form id="logout-form" action="{{route('logout2')}}" method="POST"
                              style="display: none;">@csrf</form>

                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Eden Online</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="/dashboard">หน้าหลัก</a>
                            </li>
                            <li class="breadcrumb-item active">Eden Online</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
            @yield('content')
            {{--                <vue-progress-bar></vue-progress-bar>--}}
            <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer>

</div>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/submit.js') }}"></script>
<script>

    function confSubmit(form) {
        var price = $('#price').val();
        var point = $('#point').val();
        if(parseInt(point)<parseInt(price)){
            alert('point ไม่เพียงพอสำหรับซื้อ');
        }else {
            $("<input />").attr("type", "hidden")
                .attr("name", "buy_type")
                .attr("value", "1")
                .appendTo("#myform");
            $.confirm({
                title: 'ยืนยันการซื้อ!',
                content: 'ต้องการยืนยันการซื้อ?',
                buttons: {
                    confirm: function () {
                        form.submit();
                        // $('#myform').submit();
                    },
                    cancel: function () {
                        $.alert('ยกเลิก!');
                    }
                }
            });
        }
    }
    function confSubmit2(form) {
        var price_bonus = $('#price_bonus').val();
        var bonus = $('#bonus').val();
        if(parseInt(bonus)<parseInt(price_bonus)){
            alert('โบนัส ไม่เพียงพอสำหรับซื้อ');
        }else {
            $("<input />").attr("type", "hidden")
                .attr("name", "buy_type")
                .attr("value", "0")
                .appendTo("#myform");
            $.confirm({
                title: 'ยืนยันการซื้อ!',
                content: 'ต้องการยืนยันการซื้อ?',
                buttons: {
                    confirm: function () {
                        form.submit();
                        // $('#myform').submit();
                    },
                    cancel: function () {
                        $.alert('ยกเลิก!');
                    }
                }
            });
        }
    }
</script>
{{--<script>--}}
{{--    tinymce.init({--}}
{{--        selector:'textarea.description',--}}
{{--        height: 300--}}
{{--    });--}}

{{--</script>--}}
@yield('script')
</body>
</html>

