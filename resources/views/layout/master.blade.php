<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Novsosiaplaze</title>
    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('admin/css/sb-admin-2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('desain/css/fouter.css')}}">

    <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
</head>

<body id="page-top">
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    @include('partial.nav')
    <h1 class="h3 mt-2 text-gray-800">@yield('judul')</h1>
    <h6 class="m-0 font-weight-bold text-primary">@yield('tabel')</h6>
    <div class="card-body" style="padding-bottom: 5rem; padding-top: 4rem;">
        @yield('content')
    </div>
    <div class="fouter-user">
        <footer>
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <div class="isi-menu">
                        <a class="isi-icon" href="{{ route('like.status') }}">
                            <i class="bi bi-house-door" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('follow.index') }}">
                            <i class="bi bi-people-fill" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('statuses.create') }}">
                            <i class="bi bi-plus-square" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('pages.welcome') }}">
                            <i class="bi bi-shop-window" style="color: black; font-size: 1.2em;"></i>
                        </a>
                        <a class="isi-icon" href="{{ route('dataAkun.index') }}">
                            <i class="bi bi-person-fill" style="color: black; font-size: 1.2em;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script>
        var timeout;

        function showElement() {
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            if (screenWidth >= 768) {
                document.querySelector(".fouter-user").style.display = "none";
            } else {
                document.querySelector(".fouter-user").style.display = "flex";
                document.querySelector(".fouter-user").style.justifyContent = "center";

                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    document.querySelector(".fouter-user").style.display = "none";
                }, 7000);
            }
        }

        window.addEventListener("scroll", function () {
            showElement();
        });

        window.addEventListener("resize", function () {
            showElement();
        });
        window.addEventListener("load", function () {
            showElement();
        });
    </script>
    <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
    <script src="{{asset('admin/js/custom.js')}}"></script>
    @stack('script')
    @stack('style')
</body>

</html>