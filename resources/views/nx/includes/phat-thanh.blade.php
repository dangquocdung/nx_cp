<div class="col-md-12 mb-15 clearfix">
    <div class="row">
        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                <img src="/nx/img/icon-cm.png">
                <a href="phat-thanh">Phát thanh</a>
            </h2>
            <span class="line-red">.</span>
        </div>
    </div>
            
    <div class="row sidebar">

        <div id="phat-thanh" style="overflow:hidden">

            <audio id="audio" preload="auto" tabindex="0" controls="" type="audio/mpeg">
                <source type="audio/mp3" src="">
                Sorry, your browser does not support HTML5 audio.
            </audio>
            <ul class="title" id="playlist">

                @if ( !empty($Audios) )
                @foreach ($Audios->topics->where('status',1)->sortbydesc('date') as $Topic )
                    <li class="mb-1">
                        <a href="/uploads/topics/{{ $Topic->audio_file}}">
                            <i class="fa fa-volume-up" aria-hidden="true" style="font-size:20px;color:blue;"></i>  {{$Topic->title_vi}}
                        </a>
                    </li>
                @endforeach
                @endif
            </ul>
        </div>
        
    </div>
            
</div>

