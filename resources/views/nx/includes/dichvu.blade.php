<div class="col-md-12 mb-15">
        <div class="row">
            <div class="Head pos-rel clearfix">
                <h2 class="ParentCate left">
                    <a href="#">Dịch vụ</a>
                </h2>
                <span class="line-red">.</span>
            </div>
        </div>
                
        <div class="row sidebar">

            <div class="sidebar-social-follow mb-15">
                @foreach($DichVu as $key=>$item)
                    @php
                    
                        switch ($key%4) {
                            case 1:
                                $icon = 'google-plus';
                                break;
                            case 2:
                                $icon = 'twitter';
                                break;
                            case 3:
                                $icon = 'dribbble';
                                break;
                            default:
                                $icon = 'facebook';
                                break;
                        }

                    @endphp

                    <div>
                        <a href="{{ $item->link }}" class="{{ $icon }}">
                            <i class="fa fa-user-md"></i>
                            <span>{{ $item->title_vi }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
</div>

