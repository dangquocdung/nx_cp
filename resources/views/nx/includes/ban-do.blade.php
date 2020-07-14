

<div class="col-md-12 mb-15">
        <div class="row">
            <div class="Head pos-rel clearfix">
                <h2 class="ParentCate left">
                    <img src="/nx/img/icon-cm.png">

                    <a href="#">Huyện Nghi Xuân</a>
                </h2>
                <span class="line-red">.</span>
            </div>
        </div>

        <div class="row sidebar">

            @php

                $Bando = $Banners->where('section_id',2)->first();

            @endphp

            <a href="{{ $Bando->link_url }}" target="_blank">

                <img src="/uploads/banners/{{ $Bando->file_vi }}" alt="{{ $Bando->details_vi }}" title="{{ $Bando->title_vi }}" width="100%">
            </a>

        </div>

    </div>
