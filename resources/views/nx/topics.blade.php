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
    
@endsection

@section('content')
    <!-- Post Block Wrapper Start -->
    <div class="Head pos-rel clearfix mb-15">
        <h2 class="ParentCate left">
            <!-- Title -->
            @if($WebmasterSection!="none")
                {!! trans('backLang.'.$WebmasterSection->name) !!}
            @elseif(@$search_word!="")
                {{ @$search_word }}
            @else
                {{ $User->name }}
            @endif

            @if($CurrentCategory!="none")
                @if(count((array)$CurrentCategory) >0)
                    <?php
                    $category_title_var = "title_" . trans('backLang.boxCode');
                    ?>
                    &nbsp;<i class="fa fa-angle-double-right"></i> {{ $CurrentCategory->$category_title_var }}
                @endif
            @endif
        </h2>
        <span class="line-red">.</span>
    </div>

    <div class="clearfix"></div>

    <!-- Small Post Wrapper Start -->

    @foreach ($Topics as $Topic )

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
                        <img src="/nx/img/van-ban.png" alt="{{ $Topic->title_vi }}">
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

                    <p class="sapo">{{ $Topic->sapo}}</p>

                    @if ($WebmasterSection->type == 4)

                        <!-- <div class="meta fix">
                            <span class="meta-item date">Ngày ban hành: {{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y') }}</span>
                        </div>  -->

                    @endif

                </div>

                <!-- Description -->

            </div>
        </div><!-- Post Small End -->
    @endforeach

    <div class="clearfix"></div>

    <div class="d-flex">
        <div class="mx-auto">
        {!! $Topics->links() !!}
        </div>
    </div>
 @stop