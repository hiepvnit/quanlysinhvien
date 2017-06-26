<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quản lý học viên VINANIPPON</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 24px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Màn hình chính</a>
                    @else
                        <a href="{{ url('/login') }}">Đăng nhập</a>
                        <a href="{{ url('/register') }}">Đăng ký</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md links">
                    <a href="/hocvien">Quản lý học viên</a>
                </div>

                <div class="links">
                    <a href="/lop">Quản lý lớp</a>
                    <a href="/huyen">Quản lý huyện</a>
                    <a href="/tinh">Quản lý tỉnh</a>
                    <a href="/congty">Quản lý công ty tiếp nhận</a>
                    <a href="/khoahoc">Quản lý khóa học</a>
                    <a href="#">Quản lý thu</a>
                    <a href="#">Quản lý chi</a>
                </div>
            </div>
        </div>
    </body>
</html>
