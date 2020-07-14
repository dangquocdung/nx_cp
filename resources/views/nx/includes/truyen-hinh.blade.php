<div class="col-md-12 mb-15 clearfix mt-10" id="mnu-truyen-hinh-right">
    <div class="row">
        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                <img src="/nx/img/icon-cm.png">
                <a href="{{ URL::asset('truyen-hinh') }}">Truyền hình</a>
            </h2>
            <span class="line-red">.</span>
        </div>
    </div>
            
    <div class="row sidebar">

        @if (!empty($Videos))

            @php
                $Video = $Videos->topics->where('status',1)->sortbydesc('date')->take(5)
            @endphp


                @foreach ($Video as $Topic )
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


                <!-- Overlay Post Start -->
                <div class="post post-overlay hero-post">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a class="image img-fluid" href="{{ $topic_link_url }}">
                            @if (empty($Topic->photo_file))
                                <img src="/nx/img/post/post-42.jpg" alt="{{ $Topic->title_vi }}">
                            @else
                                <img src="/uploads/topics/{{ $Topic->photo_file}}" alt="{{ $Topic->title_vi }}">
                            @endif

                            <span class="video-btn"><i class="fa fa-play"></i></span>
                        </a>

                        <!-- Content -->
                        <div class="truyen-hinh">

                            <!-- Title -->
                            <h4 class="title">
                                <a href="{{ $topic_link_url }}">
                                    
                                    {{ $Topic->title_vi }}
                                </a>
                            </h4>

                        </div>

                    </div>
                </div><!-- Overlay Post End -->
            @endforeach

        @endif

        
        
    </div>
            
</div>

