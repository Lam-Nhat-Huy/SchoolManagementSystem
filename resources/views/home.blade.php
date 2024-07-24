<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trường Đại Học Đào Sông Nin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}assets/css/templatemo.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}assets/css/customsize.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<style>
    .carousel-indicators button {
        width: 20px !important;
        height: 20px !important;
        border-radius: 50%;
        background-color: #e22803 !important;
        border: none;
    }

    .carousel-indicators .active {
        background-color: #fff;
        /* Màu nền của nút đang hoạt động */
    }

    .bg-header {
        background: linear-gradient(to right, #ffffff, #ff3c00) !important;
        width: 100%;
        height: 100px;
    }

    .pading-banner {
        padding-bottom: 70px;
    }

    .bg-footer {
        background-color: #000049;
    }
</style>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('admin') }}/img/banner_home/logo.png" alt="" width="125px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="me-auto"></div>
                <a href="{{ route('login.index', ['role_id' => 4]) }}" class="btn btn-dark me-4">Cán Bộ Đào Tạo</a>
                <a href="{{ route('login.index', ['role_id' => 3]) }}" class="btn btn-dark me-4">Giảng Viên</a>
                <a href="{{ route('login.index', ['role_id' => 2]) }}" class="btn btn-dark me-4">Sinh Viên</a>
                <a href="{{ route('login.index', ['role_id' => 1]) }}" class="btn btn-dark me-4">Quản Trị Viên</a>
            </div>
        </div>
    </nav>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-body mt-3">
            <div><a href="{{ route('login.index', ['role_id' => 4]) }}" class="btn btn-dark mb-3 w-100">Cán Bộ Đào Tạo</a></div>
            <div><a href="{{ route('login.index', ['role_id' => 3]) }}" class="btn btn-dark mb-3 w-100">Giảng Viên</a></div>
            <div><a href="{{ route('login.index', ['role_id' => 2]) }}" class="btn btn-dark mb-3 w-100">Sinh Viên</a></div>
            <div><a href="{{ route('login.index', ['role_id' => 1]) }}" class="btn btn-dark mb-3 w-100">Quản Trị Viên</a></div>
        </div>
    </div>
    <!-- Close Header -->

    <!-- Start Banner Hero -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="pading-banner">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('admin') }}/img/banner_home/banner_1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('admin') }}/img/banner_home/banner_2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('admin') }}/img/banner_home/banner_3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
    </div>
    <!-- End Banner Hero -->
    <!-- Start Footer -->
    <footer class="bg-footer" id="tempaltemo_footer">
        <div class="container p-5">
            <div class="text-center">
                <img src="{{ asset('admin') }}/img/banner_home/banner_3.jpg" alt="logo" width="50%"
                    class="mb-4">
                <h2 class="text-white">Trụ Sở Chính Tại Tòa N Đường Trần Hưng Đạo, Quận Ninh Kiều, Cần Thơ</h2>
            </div>

        </div>

        <div class="w-100 bg-light py-3 ">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-center text-dark">
                            Đào Sông Nin University © 2023, All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>
