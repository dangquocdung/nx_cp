
    @if (count($HotTopics) > 0)

    <div class="col-lg-12 mb-15">

    <div class="row">

        <div class="col-md-7 col-xs-12">
            <div class="row">

                <!-- Post Start -->
                <div class="post feature-post post-separator-border">
                    <div class="post-wrap">

                        <div id="tinNoiBatChinh" style="margin-bottom:10px">

                            @php
                                $HotTopic = $HotTopics->first();

                            @endphp

                            <?php

                                if ($HotTopic->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                        $topic_link_url = url(trans('backLang.code') . "/" . $HotTopic->$slug_var);
                                    } else {
                                        $topic_link_url = url($Topic->$slug_var);
                                    }
                                } else {
                                    if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                        $topic_link_url = route('FrontendTopicByLang', ["lang" => trans('backLang.code'), "section" => $HotTopic->webmasterSection->name, "id" => $HotTopic->id]);
                                    } else {
                                        $topic_link_url = route('FrontendTopic', ["section" => $HotTopic->webmasterSection->name, "id" => $HotTopic->id]);
                                    }
                                }
                            ?>

                            <div class="hot-news" style="margin-bottom: 0px;">

                                <a href="{{ $topic_link_url }}" class="hot-news-thumb-nail mb-20">
                                    <img src="/uploads/topics/{{ $HotTopic->photo_file }}" alt="{{ $HotTopic->$link_title_var }}" class="w3-animate-left" width="100%">
                                </a>

                                <div class="hot-news-title">
                                    <h4 class="title" style="font-weight:500">
                                        <a href="{{ $topic_link_url }}">{{ $HotTopic->$link_title_var }}</a>
                                    </h4>
                                    <p class="sapo">{{ $HotTopic->sapo }}</p>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-5 col-xs-12">

            <div class="row">

                <div id="tin-noi-bat">
                    <ul>

                        @foreach($HotTopics as $key=>$Topic)

                            <?php
                                if ($Topic->$title_var != "") {
                                    $title = $Topic->$title_var;
                                } else {
                                    $title = $Topic->$title_var2;
                                }

                                $section = "";
                                try {
                                    if ($Topic->section->$title_var != "") {
                                        $section = $Topic->section->$title_var;
                                    } else {
                                        $section = $Topic->section->$title_var2;
                                    }
                                } catch (Exception $e) {
                                    $section = "";
                                }

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
                            ?>

                            <li class="post post-small post-list feature-post post-separator-border">
                                    <!-- Post Small Start -->
                                <div class="post-wrap hot-news-block">

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

                                        

                                          

                                        <h5 class="title">

                                            

                                            <a href="{{ $topic_link_url }}">
                                                @if ($Topic->webmasterSection->type == 2)
                                                    <i class="fa fa-video-camera" aria-hidden="true" style="color:red"></i>&nbsp;

                                                @endif
                                                
                                                {{ $Topic->title_vi }}</a>
                                        </h5>

                                        <p class="sapo" style="display:none">{{ $Topic->sapo }}</p>



                                        <!-- Title -->


                                        
                                        <!-- Meta -->
                                        {{--  <div class="meta fix">
                                            <span class="meta-item date"><i class="fa fa-clock-o"></i>{{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y')}}</span>
                                        </div>  --}}

                                    </div>
                                </div>
                            </li>

                        @endforeach

                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>

    @endif
