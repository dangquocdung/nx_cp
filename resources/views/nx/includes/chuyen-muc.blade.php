@if (!empty($MenuLinks->where('father_id',1)))

<div class="Head pos-rel clearfix">
    <h2 class="ParentCate left">
        <img src="/nx/img/icon-cm.png">

        <a href="/cong-khai-minh-bach-thong-tin">Công khai, minh bạch</a>
    </h2>
    <span class="line-red">.</span>
</div>

<div class="right_1 mb-10">

        <div class="right-item">
            <a href="{{ URL::to('lich-cong-tac') }}" target="_blank" title="Lịch công tác ngày">
                <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                <span class="nav-text">Lịch công tác ngày</span>
            </a>
        </div>

        <!-- <div class="right-item">
            <a href="{{ URL::to('lich-cong-tac-tuan') }}" target="_blank" title="Lịch công tác tuần">
                <i class="fa fa-calendar fa-2x" aria-hidden="true"></i>
                <span class="nav-text">Lịch công tác tuần</span>
            </a>
        </div> -->



        
    @foreach($MenuLinks->where('father_id',284)->sortby('row_no') as $RightMenuLink)

        @foreach($RightMenuLink->webmasterSection->sections as $key=>$Section)

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


            <div class="right-item">
    
                <a href="{{ $Category_link_url }}" title="{{ $Section->title_vi }}">
    
                    @if (!empty($Section->icon))
                        
                        <i class="fa {{$Section->icon}} fa-2x" aria-hidden="true"></i>
    
                    @else
        
                        <i class="fa fa-folder-open-o fa-2x" aria-hidden="true"></i>
    
                    @endif
        
                    <span class="nav-text">{{ $Section->title_vi }}</span>
                </a>
            </div>

        @endforeach

        



        

       
    
    @endforeach

</div>
@endif
