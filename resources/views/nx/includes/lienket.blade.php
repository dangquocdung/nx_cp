

<div class="col-md-12 mb-15 clearfix" id="mnu-lien-ket-right">
    <div class="row">
        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                <img src="/nx/img/icon-cm.png">

                <a href="javascript:void(0)">Liên kết</a>
            </h2>
            <span class="line-red">.</span>
        </div>
    </div>

    <div class="row post-wrap">

        <ul>

            @foreach($Banners->where('section_id',4) as $Banner)

                <li>

                    <a href="{{ $Banner->link_url }}" style="width:100%" class="mb-1" target="_blank">
                        <img class="img-fluid" src="/uploads/banners/{{ $Banner->file_vi}}" width="100%"/>
                    </a>

                </li>

            @endforeach
        </ul>

    </div>

</div>
