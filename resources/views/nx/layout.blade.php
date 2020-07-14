<!doctype html>
<html lang="vi">

<head>
    @include('nx.includes.head')
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
                <div class="row">
                    <!-- Feature Post Row Start -->
    
                    <div class="col-lg-9">

                        @yield('content')
                    </div>

                    <div class="col-lg-3">

                        @include('nx.includes.ban-do')

                        @include('nx.includes.chuyen-muc')

                        @include('nx.includes.phat-thanh')

                        @include('nx.includes.tienich')

                        @include('nx.includes.lienket')

                        @include('nx.includes.truyen-hinh')

                    </div>
                </div>
                
            </div>

        </div>

        @include('nx.includes.footer')

    </div>

    @yield('js')

    <script type="text/javascript">
        var audio;
        var playlist;
        var tracks;
        var current;

        init();
        
        function init(){
            current = 0;
            audio = $('audio');
            playlist = $('#playlist');
            tracks = playlist.find('li a');
            len = tracks.length - 1;
            audio[0].volume = .10;
            audio[0].play();
            playlist.find('a').click(function(e){
                e.preventDefault();
                link = $(this);
                current = link.parent().index();
                run(link, audio[0]);
            });
            audio[0].addEventListener('ended',function(e){
                current++;
                if(current == len){
                    current = 0;
                    link = playlist.find('a')[0];
                }else{
                    link = playlist.find('a')[current];
                }
                run($(link),audio[0]);
            });
        }
        function run(link, player){
                player.src = link.attr('href');
                par = link.parent();
                par.addClass('active').siblings().removeClass('active');
                audio[0].load();
                audio[0].play();
        }
    </script>

    <!-- Popper JS -->
    <script src="{{ URL::asset('nx/js/popper.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ URL::asset('nx/js/bootstrap.min.js') }}"></script>
    <!-- Plugins JS -->
    <script src="{{ URL::asset('nx/js/plugins.js') }}"></script>
    <!-- rypp JS -->
    <script src="{{ URL::asset('nx/js/rypp.js') }}"></script>
    <!-- rypp JS -->
    <script src="{{ URL::asset('nx/js/ytb-playlist-api.js') }}"></script>
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
