
@php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
@endphp

<div class="col-md-12 mt-15 section">
        <div class="row">
            <!-- Feature Post Row Start -->


                @if (!empty($MenuLinks->where('father_id',21)))

                @foreach($MenuLinks->where('father_id',21)->sortby('row_no') as $MainMenuLink)

                <!-- Post Block Wrapper Start -->
                <div class="col-md-12 mt-15">

                        <div class="row mb-10">

                            <?php
                                if ($MainMenuLink->webmasterSection[$slug_var] != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                        $mmnnuu_link = url(trans('backLang.code')."/" .$MainMenuLink->webmasterSection[$slug_var]);
                                    }else{
                                        $mmnnuu_link = url($MainMenuLink->webmasterSection[$slug_var]);
                                    }
                                }else{
                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                        $mmnnuu_link =url(trans('backLang.code')."/" .$MainMenuLink->webmasterSection['name']);
                                    }else{
                                        $mmnnuu_link =url($MainMenuLink->webmasterSection['name']);
                                    }
                                }
                            ?>
                            <div class="Head pos-rel clearfix">
                                <h2 class="ParentCate left">
                                    <img src="/nx/img/icon-cm.png">
                                    <a href="{{ $mmnnuu_link }}">{{ $MainMenuLink->title_vi }}</a>
                                </h2>
                                <span class="line-red">.</span>
                                @if(!empty($MainMenuLink->webmasterSection->sections))
                                <div class="mini-menu c-86">&nbsp;
                                    @foreach($MainMenuLink->webmasterSection->sections as $key=>$Section)

                                        <?php
                                            if ($Section->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $Category_link_url = url(trans('backLang.code')."/" .$Section->$slug_var);
                                                }else{
                                                    $Category_link_url = url($Section->$slug_var);
                                                }
                                            } else {
                                                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                    $Category_link_url = route('FrontendTopicsByCatWithLang', ["lang"=>trans('backLang.code'),"section" => $Section->webmasterSection->name, "cat" => $Section->id]);
                                                }else{
                                                    $Category_link_url = route('FrontendTopicsByCat', ["section" => $Section->webmasterSection->name, "cat" => $Section->id]);
                                                }
                                            }
                                        ?>
                                        <h6 class="d-ib" style="margin-right:5px"><a href="{{ $Category_link_url }}">{{ $Section->title_vi }}</a></h6>
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>

                        @if(!empty($MainMenuLink->webmasterSection->topics))

                        @php

                            $Tins = $MainMenuLink->webmasterSection->topics->where('status',1)->sortbyDesc('date')->take(6);

                        @endphp

                        @if (count($Tins) >0 )

                        <div class="row">

                            <!-- Post Wrapper Start -->
                            <div class="col-md-7 col-xs-12">
                                @php

                                    $Topic =  $Tins->shift();

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
                                                <h4 class="title"><a href="{{ $topic_link_url }}">{{ $Topic->title_vi }}</a></h4>
                                                <!-- Description -->
                                                <p class="sapo">{{ $Topic->sapo }}</p>

                                            </div>

                                        </div>
                                    </div><!-- Post End -->
                                </div>

                            </div><!-- Post Wrapper End -->

                             <!-- Small Post Wrapper Start -->
                             <div class="col-md-5 col-xs-12" style="padding-right:0" id="mainbox-r">

                                    @foreach ($Tins as $Topic )

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


                        @endif

                </div><!-- Post Block Wrapper End -->
                @endforeach
                @endif



        </div>



</div>
