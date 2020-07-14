<!doctype html>
<html lang="vi">

<head>
    @include('nx.includes.head')

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <!-- Main Wrapper -->
    <div id="main-wrapper" class="container">

        @include('nx.includes.header')
        @include('nx.includes.toolbox')

        @include('nx.includes.menu')

        <div class="nen-trang">

            <div class="col-md-12 post-section section mt-10 box-mobile">
                <div class="marbox">
                    <marquee direction="left" scrollamount="2" scrolldelay="60" onmouseover="this.stop()" onmouseout="this.start()">
                            Chào mừng quý vị đã đến với Cổng thông tin điện tử huyện Nghi Xuân
                    </marquee>

                </div>
            </div>

            <div class="col-lg-12 section">
                

                        @yield('content')
                    
                
            </div>

        </div>

        @include('nx.includes.footer')

    </div>

    @yield('js')

    <!-- Popper JS -->
    <script src="{{ URL::asset('nx/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ URL::asset('nx/js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ URL::asset('nx/js/plugins.js') }}"></script>
    <!-- rypp JS -->
    <!-- <script src="{{ URL::asset('nx/js/rypp.js') }}"></script> -->
    <!-- rypp JS -->
    <!-- <script src="{{ URL::asset('nx/js/ytb-playlist-api.js') }}"></script> -->
    <!-- Ajax Mail JS -->
    <!-- <script src="{{ URL::asset('nx/js/ajax-mail.js') }}"></script> -->
    <!-- Datatables JS -->
    <!-- <script src="{{ URL::asset('nx/js/vendor/datatables.min.js') }}"></script> -->
    <!-- Main JS -->
    <script src="{{ URL::asset('nx/js/main.js') }}"></script>
    <!-- Nghi Xuan JS -->
    <script src="{{ mix('nx/js/app.js') }}"></script>

</body>

</html>
