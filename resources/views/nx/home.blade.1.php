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

    <!-- Hero Section Start -->
    <div class="col-md-12 section mb-10">
            <div class="row">
                <!-- Feature Post Row Start -->

                <div class="col-md-9">

                    <!-- Post Block Wrapper Start -->
                    <div class="col-md-12 mb-15 tin-tieu-diem" id="leftdiv">

                            <div class="row mb-10">

                                    <!-- Breaking News Wrapper Start -->
                                    <div class="breaking-news-wrapper">

                                        <!-- Breaking News Title -->
                                        <h5 class="breaking-news-title float-left">Thông báo</h5>

                                        <!-- Breaking Newsticker Start -->
                                        <ul class="breaking-news-ticker float-left" style="height: 40px; overflow: hidden;">

                                            @foreach ($ThongBao as $Topic )

                                                @php
                                                    if ($Topic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $topic_link_url = url(trans('backLang.code') . "/" . $Topic->$slug_var);
                                                        } else {
                                                            $topic_link_url = url($Topic->$slug_var);
                                                        }
                                                    } else {
                                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                            $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                        } else {
                                                            $topic_link_url = route('FrontendTopic', ["section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                        }
                                                    }
                                                @endphp

                                                <li><a href="{{$topic_link_url}}">{{ str_limit($Topic->title_vi,100) }}</a></li>
                                            @endforeach
                                        </ul><!-- Breaking Newsticker Start -->

                                        <!-- Breaking News Nav -->
                                        <div class="breaking-news-nav">
                                            <button class="news-ticker-prev"><i class="fa fa-angle-left"></i></button>
                                            <button class="news-ticker-next"><i class="fa fa-angle-right"></i></button>
                                        </div>

                                    </div><!-- Breaking News Wrapper End -->

                            </div>

                            @if (count($HotTopics) > 0)

                            <div class="row">

                                @php
                                    // $HotTopics = $TopicsAll->where('hot',1)->take(6);

                                    $Topic = $HotTopics->shift();

                                    if ( $Topic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                            $topic_link_url = url(trans('backLang.code') . "/" . $Topic->$slug_var);
                                        } else {
                                            $topic_link_url = url($Topic->$slug_var);
                                        }
                                    } else {
                                        if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                            $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                        } else {
                                            $topic_link_url = route('FrontendTopic', ["section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                        }
                                    }

                                @endphp

                                <!-- Post Wrapper Start -->
                                <div class="col-md-7 col-xs-12">

                                    <div class="row">

                                            <!-- Post Start -->
                                    <div class="post feature-post post-separator-border">
                                            <div class="post-wrap">

                                                <!-- Image -->
                                                <a class="image img-fluid" href="{{ $topic_link_url }}">
                                                    @if (empty($Topic->photo_file))
                                                        <img src="/nx/img/post/post-11.jpg" alt="{{ $Topic->title_vi }}">
                                                    @else
                                                        <img src="/uploads/topics/{{ $Topic->photo_file}}" alt="{{ $Topic->title_vi }}"></a>
                                                    @endif
                                                </a>

                                                <!-- Content -->
                                                <div class="content">

                                                    <!-- Title -->
                                                    <h4 class="title" style="text-align:center"><a href="{{ $topic_link_url }}">{{ $Topic->title_vi }}</a></h4>

                                                    <!-- Meta -->
                                                    {{--  <div class="meta fix">
                                                        <a href="#" class="meta-item author"><i class="fa fa-user"></i>{{ $Topic->user->name }}</a>
                                                        <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y')}}</span>
                                                        <a href="#" class="meta-item comment"><i class="fa fa-comments"></i>(34)</a>
                                                    </div>  --}}

                                                    <!-- Description -->
                                                    <p class="sapo">{{ $Topic->sapo }}</p>

                                                </div>

                                            </div>
                                        </div><!-- Post End -->
                                    </div>

                                </div><!-- Post Wrapper End -->

                                <!-- Small Post Wrapper Start -->
                                <div class="col-md-5 col-xs-12" style="padding-right:0" id="mainbox-r">

                                        @foreach ($HotTopics as $Topic )

                                            @php
                                                if ($Topic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                        $topic_link_url = url(trans('backLang.code') . "/" . $Topic->$slug_var);
                                                    } else {
                                                        $topic_link_url = url($Topic->$slug_var);
                                                    }
                                                } else {
                                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                        $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                    } else {
                                                        $topic_link_url = route('FrontendTopic', ["section" => $Topic->webmasterSection->name, "id" => $Topic->id]);
                                                    }
                                                }
                                            @endphp

                                            <!-- Post Small Start -->
                                            <div class="post post-small post-list feature-post post-separator-border">
                                                <div class="post-wrap">

                                                    <!-- Image -->
                                                    <a class="image img-fluid" href="{{ $topic_link_url }}">
                                                        @if (empty($Topic->photo_file))
                                                            <img src="/nx/img/post/post-13.jpg" alt="{{ $Topic->title_vi }}">
                                                        @else
                                                            <img src="/uploads/topics/{{ $Topic->photo_file}}" alt="{{ $Topic->title_vi }}">
                                                        @endif
                                                    </a>

                                                    <!-- Content -->
                                                    <div class="content">

                                                        <!-- Title -->
                                                        <h5 class="title"><a href="{{ $topic_link_url }}">{{ $Topic->title_vi }}</a></h5>

                                                        <!-- Meta -->
                                                        {{--  <div class="meta fix">
                                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y')}}</span>
                                                        </div>  --}}

                                                    </div>

                                                </div>
                                            </div><!-- Post Small End -->
                                        @endforeach

                                </div><!-- Small Post Wrapper End -->

                            </div>

                            @endif

                    </div><!-- Post Block Wrapper End -->

                    @include('nx.home.slide')

                    <div class="clearfix"></div>

                    @include('nx.home.video')

                    <div class="clearfix"></div>

                    @include('nx.home.tinbai')

                    <div class="clearfix"></div>

                    @include('nx.home.hinh-anh')

                </div>

                <!-- Sidebar Start -->
                <div class="col-md-3">

                    @include('nx.includes.ban-do')

                    @include('nx.includes.chuyen-muc')

                    @include('nx.includes.phat-thanh')

                    @include('nx.includes.tienich')

                    @include('nx.includes.thoi-tiet')

                    @include('nx.includes.lienket')

                </div><!-- Sidebar End -->

                <!-- Feature Post Row End -->

            </div>

            <div class="clearfix"></div>

            @include('nx.home.video-yt')

    </div>

@stop
