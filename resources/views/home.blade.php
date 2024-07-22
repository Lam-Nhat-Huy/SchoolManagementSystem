{{-- <h1>Phần Giao Diện Trang Chủ Này Để Quốc Huy Làm!</h1> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trường Đại Học FPT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('admin') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}assets/css/templatemo.css" />
    <link rel="stylesheet" href="{{ asset('admin') }}assets/css/customsize.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
            background-color: #fff; /* Màu nền của nút đang hoạt động */
        }
    .bg-header {
        background: linear-gradient(to right, #ffffff, #ff3c00) !important;
    width: 100%;
    height: 100px;
    }
    .pading-banner{
        padding-bottom: 70px;
    }
    .bg-footer{
        background-color: #000049;
    }
</style>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow bg-header">
        <div class="container d-flex justify-content-between align-items-center">
            <div style="width:300px">   
                <img src="{{asset('admin')}}/img/banner_home/logo-moi.png" alt="fgd" width="100%">
            </div>
            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill ">
                    <ul class="nav navbar-nav d-flex  mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link text-dark ps-md-5 fw-bold fs-6" href="index.html">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark ps-md-5 fw-bold fs-6" href="about.html">Giới thiệu</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a href="{{route('login.index')}}" class="btn btn-primary">Đăng nhập</a>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->

    <!-- Start Banner Hero -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="pading-banner">
            <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{asset('admin')}}/img/banner_home/banner1.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('admin')}}/img/banner_home/banner2.jpg"  class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
                <div class="carousel-item">
                  <img src="{{asset('admin')}}/img/banner_home/banner3.jpg" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
      </div>
    <!-- End Banner Hero -->
    <!-- Start Footer -->
    <footer class="bg-footer" id="tempaltemo_footer">
        <div class="container p-5">
            <div class="text-center">
                <img src="{{asset('admin')}}/img/banner_home/logo-moi.png" alt="logo" width="50%"> <br>
                <h2 class="text-white">Trụ sở chính Tòa nhà FPT Polytechnic, Phố Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</h2>
            </div>

        </div>

        <div class="w-100 bg-light py-3 ">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-12">
                        <p class="text-end text-dark">
                            FPT Polytechnic © 2023, All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>

</html>