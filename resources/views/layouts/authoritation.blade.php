<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>INSPINIA | Login 2</title>

    <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css')}}" rel="stylesheet">
    <!-- Sweet Alert 2  -->
    <link href="{{ asset('admin/css/plugins/sweetalert2/sweetalert2.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

    <!-- Scripts -->
    @stack('styles')
</head>

<body class="gray-bg" >
    <div id="app">
        <div class="wrapper wrapper-content animated">
            @yield('content')
        </div>
    </div>
    <script src="{{ asset('admin/js/jquery-2.1.1.js')}}"></script>
    <script src="{{ asset('admin/js/bootstrap.js')}}"></script>
    <!-- Sweet Alert 2 -->
    <script src="{{asset('admin/js/plugins/sweetalert2/sweetalert2.all.js')}}"></script>
    <!-- Axios -->
    <script src="{{asset('admin/js/plugins/axios/dist/axios.js')}}"></script>
    <!-- Custom and plugin javascript -->
    <script  src="{{ asset('js/app.js') }}"></script>
    @include('sweetalert::alert')
    @stack('scripts')
</body>
</html>
