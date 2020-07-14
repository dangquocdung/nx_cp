@extends('nx.layout')

@php

    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');

@endphp

@section('meta')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $Topic->title_vi }}" />
    <meta property="og:description" content="{{ $Topic->title_vi }}" />
    <meta property="og:image" itemprop="image" content="{{ URL::asset('/uploads/topics/'.$Topic->photo_file) }}" />

@stop

@section('css')

    @if(count($Topic->photos)>0)

        <link href="/nx/css/main.css" rel="stylesheet">
        <link href="/nx/css/justifiedGallery.min.css" rel="stylesheet">
        <link href="/nx/css/lightgallery.css" rel="stylesheet">

    @endif

@endsection

@section('content')


    @if ($Topic->webmasterSection->type == 4)

        @include('nx.topic.van-ban')

    @else

        @include('nx.topic.topic')

    @endif

@stop

@section('js')

    @if(count($Topic->photos)>0)

        <script src="/nx/js/prettify.js"></script>
        <script src="/nx/js/jquery.justifiedGallery.min.js"></script>
        <script src="/nx/jstransition.js"></script>
        <script src="/nx/js/collapse.js"></script>
        <script src="/nx/js/lightgallery.js"></script>
        <script src="/nx/js/lg-fullscreen.js"></script>
        <script src="/nx/js/lg-thumbnail.js"></script>
        <script src="/nx/js/lg-video.js"></script>
        <script src="/nx/js/lg-autoplay.js"></script>
        <script src="/nx/js/lg-zoom.js"></script>
        <script src="/nx/js/jquery.mousewheel.min.js"></script>
        <script>
            $(document).ready(function() {

                // Animated thumbnails
                var $animThumb = $('#tin-anh');
                if ($animThumb.length) {
                    $animThumb.justifiedGallery({
                        border: 4
                    }).on('jg.complete', function() {
                        $animThumb.lightGallery({
                            thumbnail: true
                        });
                    });
                };

            });
        </script>

    @endif

    {{-- <script src="//code.responsivevoice.org/responsivevoice.js?key=051jHusS"></script> --}}

    {{-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=Ywnx5fxD"></script> --}}

    <script>

        // $("#btnVoice").click(function () {
        //     var text = $(".noi-dung-doc").text();
        //     responsiveVoice.speak(text, "Vietnamese Female");

        // });
        // $("#btnVoicePause").click(function () {
        //     //var text = $(".news_list_detail").text();
        //     //responsiveVoice.speak(text, "Vietnamese Male");
        //     responsiveVoice.pause();

        // });
        // $("#btnVoiceResume").click(function () {
        //     //var text = $(".news_list_detail").text();
        //     //responsiveVoice.speak(text, "Vietnamese Male");
        //     responsiveVoice.resume();

        // });

        // Reset Font Size
        var originalFontSize = $('.noi-dung-doc').css('font-size');

        $(".resetFont").click(function () {
            $('.noi-dung-doc').css('font-size', 14);
        });

        // Increase Font Size
        $(".increaseFont").click(function () {
            var currentFontSize = $('.noi-dung-doc').css('font-size');
            var currentFontSizeNum = parseFloat(currentFontSize, 10);
            var newFontSize = currentFontSizeNum * 1.2;
            $('.noi-dung-doc').css('font-size', newFontSize);
            return false;
        });

        // Decrease Font Size
        $(".decreaseFont").click(function () {
            var currentFontSize = $('.noi-dung-doc').css('font-size');
            var currentFontSizeNum = parseFloat(currentFontSize, 10);
            var newFontSize = currentFontSizeNum * 0.8;
            $('.noi-dung-doc').css('font-size', newFontSize);

            return false;
        });

    </script>

@endsection
