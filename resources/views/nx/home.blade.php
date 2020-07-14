@php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
@endphp

@extends('nx.layout')

@section('meta')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $PageTitle }}" />
    <meta property="og:description" content="{{ $PageDescription }}" />
    <meta property="og:image" itemprop="image" content="{{ URL::asset('/nx/img/logo-footer.png') }}"/>

@stop

@section('content')

    {{-- @include('nx.includes.thong-bao') --}}

    @include('nx.includes.tieu-diem')

    @include('nx.home.tin-noi-bat')

    @include('nx.home.slide')

    <div class="clearfix"></div>

    @include('nx.home.video')

    <div class="clearfix"></div>

    @include('nx.home.tinbai')

    <div class="clearfix"></div>

    @include('nx.home.hinh-anh')
    

@stop

@section('js')

<script>

    function UnionSwitchMode2() {

        var idUnion_image_thumb = "tin-noi-bat"

        var jQueryActive = $("#" + idUnion_image_thumb + ' .active');

        var jQueryNext = jQueryActive.next().length ? jQueryActive.next() : $("#" + idUnion_image_thumb + ' ul li:first');

        //Tìm giá trị

        var imgAlt = jQueryNext.find('img').attr("alt");

        var imgSrc = jQueryNext.find('img').attr("src");

        var imgDesc = jQueryNext.find('.hot-news-block').html();

        var aHref = jQueryNext.find('a').attr("href");

        var imgDescHeight = $("#tinNoiBatChinh .hot-news").find('#tinNoiBatChinh .hot-news-block').height();

        var newsDesc = jQueryNext.find('.sapo').html();

        var isMobile = $(window).width() < 768;

        $("#tinNoiBatChinh .hot-news").animate({marginBottom: "0"}, 0, function () {

            jQueryActive.removeClass('active');

            jQueryNext.addClass('active');

            $("#tinNoiBatChinh .hot-news a").attr({href: aHref});

            $("#tinNoiBatChinh .hot-news img").attr({src: imgSrc, alt: imgAlt});

            $("#tinNoiBatChinh .hot-news .hot-news-title h4 a").attr({href: aHref});

            $("#tinNoiBatChinh .hot-news .hot-news-title h4 a").html(imgAlt);

            $("#tinNoiBatChinh .hot-news .sapo").html(newsDesc);

        });

    }

    $(document).ready(function () {

        var UnionNewsRefreshInterval2

        $("#tin-noi-bat ul li:first").addClass('active');

        UnionNewsRefreshInterval2 = setInterval("UnionSwitchMode2()", "5000");

        $("#tin-noi-bat ul")
        .on('mouseenter',function () {
            // console.log('mouse enter');
            clearInterval(UnionNewsRefreshInterval2);
        })
        .on('mouseleave', function() {
            console.log('mouse leave');
            UnionNewsRefreshInterval2 = setInterval("UnionSwitchMode2()", "5000");
        });

        $("#tin-noi-bat ul li")

        .on('mouseenter', function() {

            //console.log("li mouse enter");

            $(this).addClass('hover');

            var imgAlt = $(this).find('img').attr("alt");

            var imgSrc = $(this).find('img').attr("src");

            var aHref = $(this).find('a').attr("href");

            var newsDesc = $(this).find('.item-desc').html();

            $("#tinNoiBatChinh").addClass('w3-animate-left');

            $("#tinNoiBatChinh .hot-news img").attr({ src: imgSrc, alt: imgAlt });

            $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").attr({href: aHref});

            $("#tinNoiBatChinh .hot-news .hot-news-title h3 a").html(imgAlt);

            $("#tinNoiBatChinh .hot-news .hot-news-desc").html(newsDesc);

        })

        .on("mouseleave", function() {
            //console.log('li mouse leave');
            $(this).removeClass('hover');
            $("#tinNoiBatChinh").removeClass('w3-animate-left');
        //                $("#tinNoiBatChinh .hot-news .hot-news-block").stop(true, true);
        });

    })
</script>

@stop
