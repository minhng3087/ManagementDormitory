<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        @include('includes.navbar')
        <div class="slide-show">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ URL::to('/assets/img/ktx1.jpg') }}" alt="Ký túc xá">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ URL::to('/assets/img/ktx2.jpg') }}" alt="Ký túc xá">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ URL::to('/assets/img/ktx3.jpg') }}" alt="Ký túc xá">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                </div>
        </div>
        
    </div>

        
    <div class="main-content">
        <!-- Tiện ích -->
        <div class="service">
            <div class="container">
                <h2>TIỆN ÍCH HỖ TRỢ</h2>
                <ul>
                    <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Tiếp nhận phản ánh, xử lý sự cố 
                    </li>
                    <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Tiệm giặt là
                    </li>
                    <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Không gian học tập chung
                    </li>
                    <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Khu nhà văn hóa
                    </li>
                    <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Sân thể thao, sân vui chơi chung
                    </li>
                        <li>
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bookmark-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5V2z"/>
                        </svg>
                            Khu nhà ăn cho sinh viên
                    </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="announce">
                <div class="col-md-3 col-sm-3 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ URL::to('/assets/img/ktx-small.jpg') }}" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title">Thông báo về thời gian chi trả tiền miễn giảm do bão lũ cho sinh viên</h5>
                            <p class="card-text">Trung tâm QL KTX thông báo: Căn cứ vào quyết định số 867/QĐ-ĐHBK- TT QL KTX về việc miễn và giảm lệ phí ở, nước sinh hoạt đối với sinh viên nội trú KTX kỳ II/2019-2020</p>
                            <a href="#" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ URL::to('/assets/img/ktx-small.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Thông báo về thời gian chi trả tiền miễn giảm do COVID-19 cho sinh viên</h5>
                            <p class="card-text">Trung tâm QL KTX thông báo: Căn cứ vào quyết định số 867/QĐ-ĐHBK- TT QL KTX về việc miễn và giảm lệ phí ở, nước sinh hoạt đối với sinh viên nội trú KTX kỳ II/2019-2020</p>
                            <a href="#" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-12">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ URL::to('/assets/img/ktx-small.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Thông báo kế hoạch xếp ở và thu lệ phí kỳ I/2020-2021</h5>
                            <p class="card-text">TRUNG TÂM QUẢN LÝ KÝ TÚC XÁ THÔNG BÁO Căn cứ vào kế hoạch xếp ở của sinh viên nội trú KTX năm học 2020-2021 Căn cứ vào quyết định số 1137/QĐ-ĐHBK-TTQL KTX </p>
                            <a href="#" class="btn btn-primary">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="standard">
                <div class="standard-content">
                    <h2>TT QUẢN LÝ KTX</h2>
                     Tổ chức, quản lý toàn diện khu KTX sinh viên. Bố trí xếp ở sinh viên nội trú đúng đối tượng, số lượng, đảm bảo thu lệ phí lưu trú của sinh viên nộp về trường đúng qui định; Đảm bảo đủ các điều kiện phục vụ sinh hoạt và học tập của sinh viên nội trú:
                    <br>Điện, nước sinh hoạt, dịch vụ ăn uống.
                    <br>An ninh trật tự, vệ sinh môi trường
                    <br>Hoạt động thể thao và văn hoá tinh thần trong khu KTX.
                </div>
                <div class="standard-image">
                    <img class="d-block w-100" src="{{ URL::to('/assets/img/ttql_ktx.png') }}" alt="Ký túc xá">
                </div>
            </div>
        
        </div>
        @include('includes.footer')
    </div>
</body>
</html>
