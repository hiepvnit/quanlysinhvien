<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="pace-top">
<style>
    .pace-top .pace-progress,.pace-top .pace:before{top:0}
    .pace-top .pace .pace-activity{top:11px}
</style>
<!-- begin #page-loader -->
<div id="page-loader" class="fade in"><span class="spinner"></span></div>
<!-- end #page-loader -->
<div id="page-container" class="fade">
    <!-- begin error -->
    <div class="error">
        <div class="error-code m-b-10">403 <i class="fa fa-warning"></i></div>
        <div class="error-content">
            <div class="error-message">Không có quyền truy cập...</div>
            <div class="error-desc m-b-20">
                Click vào trang chủ để tìm kiếm dữ liệu khác.
            </div>
            <div>
                <a href="/" class="btn btn-success">Về trang chủ</a>
            </div>
        </div>
    </div>
    <!-- end error -->
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/pace.min.js') }}"></script>
<script src="{{ asset('js/apps.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/table-manage-responsive.demo.min.js') }}"></script>
<script>
    $(document).ready(function() {
        App.init();
        TableManageResponsive.init();
        $(".dropdown-toggle").dropdown();
    });
</script>
</body>
</html>
