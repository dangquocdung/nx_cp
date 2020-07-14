<!-- Post Block Wrapper Start -->
<div class="col-md-12" id="leftdiv">

    <div class="row mb-10">

            <!-- Breaking News Wrapper Start -->
            <div class="breaking-news-wrapper">

                <!-- Breaking News Title -->
                <h5 class="breaking-news-title float-left">Tiêu điểm</h5>

                <!-- Breaking Newsticker Start -->
                <ul class="breaking-news-ticker float-left">

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


</div><!-- Post Block Wrapper End -->