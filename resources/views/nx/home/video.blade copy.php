        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                <a href="/video"><i class="fa fa-video-camera"></i></span> Truyền hình Nghi Xuân</a>
            </h2>
            <span class="line-red">.</span>
        </div>

        <div class="clearfix"></div>

        <div class="three-column-post-carousel column-post-carousel post-block-carousel dark life-style-post-carousel row">

            @if (!empty($Videos))

            @php
                $Video = $Videos->topics->where('status',1)->sortbydesc('date')->take(10)
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
                <div class="post post-overlay hero-post col-md-4">
                    <div class="post-wrap">

                        <!-- Image -->
                        <a class="image img-fluid" href="{{ $topic_link_url }}">
                            @if (empty($Topic->photo_file))
                                <img src="/nx/img/post/post-42.jpg" alt="{{ $Topic->title_vi }}">
                            @else
                                <img src="/uploads/topics/{{ $Topic->photo_file}}" alt="{{ $Topic->title_vi }}"></a>
                            @endif

                            <span class="video-btn"><i class="fa fa-play"></i></span>
                            <span class="title-video">
                                <i class="fa fa-clock-o"></i>&nbsp;{{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y') }}
                            </span>
                        </a>

                        <!-- Content -->
                        <div class="content">

                            <!-- Title -->
                            <h4 class="title">
                                <a href="{{ $topic_link_url }}">
                                    {{-- @if($Topic->icon !="")
                                        <i class="fa {!! $Topic->icon !!}"></i>&nbsp;
                                    @endif --}}
                                    {{ $Topic->title_vi }}
                                </a>
                            </h4>

                            <!-- Meta -->
                            {{-- <div class="meta fix">
                                <span class="meta-item date">
                                    <i class="fa fa-clock-o"></i>
                                    {{ \Carbon\Carbon::parse($Topic->date)->format('d/m/Y')}}
                                </span>
                            </div> --}}
                        </div>

                    </div>
                </div><!-- Overlay Post End -->
            @endforeach

            @endif

        </div>


