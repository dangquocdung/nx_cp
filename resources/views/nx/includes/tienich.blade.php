<div class="col-md-12 mb-15">
    <div class="row">
        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                <img src="/nx/img/icon-cm.png">

                <a href="#">Tiện ích</a>
            </h2>
            <span class="line-red">.</span>
        </div>
    </div>

    <div class="row post-wrap">

        <ul>

            @foreach($Banners->where('section_id',3) as $Banner)

                <li class="mb-1"> 

                    <a href="{{ $Banner->link_url }}" style="width:100%" class="mb-1" target="_blank" title="{{ $Banner->title_vi }}">
                        <img class="img-fluid" src="/uploads/banners/{{ $Banner->file_vi}}" width="100%" />
                    </a>

                </li>

            @endforeach
        </ul>

    </div>


</div>

