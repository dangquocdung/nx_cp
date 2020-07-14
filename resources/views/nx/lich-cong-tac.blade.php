@php
    $link_title_var = "title_" . trans('backLang.boxCode');
    $title_var = "title_" . trans('backLang.boxCode');
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
@endphp

@extends('nx.layout-lct')

@section('meta')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $PageTitle }}" />
    <meta property="og:description" content="{{ $PageDescription }}" />
    <meta property="og:image" itemprop="image" content="{{ URL::asset('/nx/img/logo-footer.png') }}"/>
    
@endsection

@section('content')

    <!-- Post Block Wrapper Start -->
    <div class="pos-rel clearfix mb-30">
        <h2 class="ParentCate left">
            <!-- Title -->
            {!! trans('frontLang.lich-cong-tac-lanh-dao') !!} 
            
            @php
                $date = Carbon\Carbon::parse($ngay);

                switch ($date->format('N')){
                    case 1: 
                        echo 'Thứ 2, ngày '.$date->format('d-m-Y');
                        break;
                    case 2: 
                        echo 'Thứ 3, ngày '.$date->format('d-m-Y');
                        break;
                    case 3: 
                        echo 'Thứ 4, ngày '.$date->format('d-m-Y');
                        break;
                    case 4: 
                        echo 'Thứ 5, ngày '.$date->format('d-m-Y');
                        break;
                    case 5: 
                        echo 'Thứ 6, ngày '.$date->format('d-m-Y');
                        break;
                    case 6: 
                        echo 'Thứ 7, ngày '.$date->format('d-m-Y');
                        break;
                    default:
                        echo 'Chủ nhật, ngày '.$date->format('d-m-Y');
                } 

            @endphp
        </h2>
        <span class="line-red">.</span>
    </div>

    <div class="clearfix"></div>

    @if (count($Topics) >0)


    <div id="lct-desktop">
        <table class="table table-condensed table-bordered table-hover no-margin tableCalendar on" width="100%" cellspacing="0" border="0">
            <thead>
                <tr>
                <th scope="col" width="2%">TT</th>
                <th scope="col" width="8%">Thời gian</th>
                <th scope="col" width="50%">Nội dung</th>
                <th scope="col" width="10%">Chủ trì</th>
                <th scope="col" width="20%">Địa điểm</th>
                <th scope="col" width="10%">Phương tiện</th>

                </tr>
            </thead>
            <tbody>

                @foreach ($Topics as $Topic)

                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        
                    {{--Additional Feilds--}}
                    @if(count($WebmasterSection->customFields) >0)
                        <?php
                        $cf_title_var = "title_" . trans('backLang.boxCode');
                        $cf_title_var2 = "title_" . trans('backLang.boxCodeOther');
                        ?>
                        @foreach($WebmasterSection->customFields as $customField)
                            <?php
                            if ($customField->$cf_title_var != "") {
                                $cf_title = $customField->$cf_title_var;
                            } else {
                                $cf_title = $customField->$cf_title_var2;
                            }

                            // check field language status
                            $cf_land_identifier = "";
                            $cf_land_active = false;
                            $cf_land_dir = trans('backLang.direction');
                            if (Helper::GeneralWebmasterSettings("vi_box_status") && Helper::GeneralWebmasterSettings("en_box_status")) {
                                if ($customField->lang_code == "vi") {
                                    $cf_land_identifier = trans('backLang.vietnamBox');
                                } elseif ($customField->lang_code == "en") {
                                    $cf_land_identifier = trans('backLang.englishBox');
                                }
                            }
                            if (Helper::GeneralWebmasterSettings("vi_box_status") && $customField->lang_code == "vi") {
                                $cf_land_active = true;
                                $cf_land_dir = "rtl";
                            }
                            if (Helper::GeneralWebmasterSettings("en_box_status") && $customField->lang_code == "en") {
                                $cf_land_active = true;
                                $cf_land_dir = "ltr";
                            }
                            if ($customField->lang_code == "all") {
                                $cf_land_active = true;
                            }
                            // required Status
                            $cf_required = "";
                            if ($customField->required) {
                                $cf_required = "required";
                            }

                            $cf_saved_val = "";
                            $cf_saved_val_array = array();
                            if (count($Topic->fields) > 0) {
                                foreach ($Topic->fields as $t_field) {
                                    if ($t_field->field_id == $customField->id) {
                                        if ($customField->type == 7) {
                                            // if multi check
                                            $cf_saved_val_array = explode(", ", $t_field->field_value);
                                        } else {
                                            $cf_saved_val = $t_field->field_value;
                                        }
                                    }
                                }
                            }

                            ?>

                            @if($cf_land_active)
                                @if($customField->type ==5)
                                {{--Date & Time--}}
                                    <td style="color:blue">
                                        <strong>
                                            {!! Carbon\Carbon::parse($cf_saved_val)->format('G:i') !!}
                                        </strong>
                                    </td>
                                    <td>
                                        {!! $Topic->title_vi !!}
                                    </td>
                                @else
                                    {{--Text Box--}}
                                    <td style="{{ ($loop->iteration==2)? 'color:red; font-weight:600':'' }}">
                                        {!! $cf_saved_val !!}
                                    </td>
                                @endif
                            @endif
                        @endforeach
                    @endif

                    </tr>

                @endforeach
                
            </tbody>
        </table>
    </div>

    <!-- Lich mobile -->

    <div id="lct-mobile" style="display:none">
        @foreach ($Topics as $Topic)

            {{--Additional Feilds--}}
            @if(count($WebmasterSection->customFields) >0)
                <?php
                $cf_title_var = "title_" . trans('backLang.boxCode');
                $cf_title_var2 = "title_" . trans('backLang.boxCodeOther');
                ?>
                @foreach($WebmasterSection->customFields as $customField)
                    <?php
                    if ($customField->$cf_title_var != "") {
                        $cf_title = $customField->$cf_title_var;
                    } else {
                        $cf_title = $customField->$cf_title_var2;
                    }

                    // check field language status
                    $cf_land_identifier = "";
                    $cf_land_active = false;
                    $cf_land_dir = trans('backLang.direction');
                    if (Helper::GeneralWebmasterSettings("vi_box_status") && Helper::GeneralWebmasterSettings("en_box_status")) {
                        if ($customField->lang_code == "vi") {
                            $cf_land_identifier = trans('backLang.vietnamBox');
                        } elseif ($customField->lang_code == "en") {
                            $cf_land_identifier = trans('backLang.englishBox');
                        }
                    }
                    if (Helper::GeneralWebmasterSettings("vi_box_status") && $customField->lang_code == "vi") {
                        $cf_land_active = true;
                        $cf_land_dir = "rtl";
                    }
                    if (Helper::GeneralWebmasterSettings("en_box_status") && $customField->lang_code == "en") {
                        $cf_land_active = true;
                        $cf_land_dir = "ltr";
                    }
                    if ($customField->lang_code == "all") {
                        $cf_land_active = true;
                    }
                    // required Status
                    $cf_required = "";
                    if ($customField->required) {
                        $cf_required = "required";
                    }

                    $cf_saved_val = "";
                    $cf_saved_val_array = array();
                    if (count($Topic->fields) > 0) {
                        foreach ($Topic->fields as $t_field) {
                            if ($t_field->field_id == $customField->id) {
                                if ($customField->type == 7) {
                                    // if multi check
                                    $cf_saved_val_array = explode(", ", $t_field->field_value);
                                } else {
                                    $cf_saved_val = $t_field->field_value;
                                }
                            }
                        }
                    }

                    ?>

                    @if($cf_land_active)
                        @if($customField->type ==5)
                        {{--Date & Time--}}
                            <strong>
                                <i class="fa fa-clock-o"></i>&nbsp;{!! Carbon\Carbon::parse($cf_saved_val)->format('G:i') !!}:&nbsp;
                            </strong>
                            <span style="color:blue; font-weight:550">
                                {!! $Topic->title_vi !!}
                            </span>
                        @else
                            <br>
                            <strong>

                            {!!  $cf_title !!}:&nbsp;
                                
                            </strong>
                            
                            {!! $cf_saved_val !!}
                        @endif
                    @endif
                @endforeach

                <hr>
            @endif


        @endforeach
    
    </div>

    @else

    <p>
        Ngày này chưa có lịch công tác!
    </p>


    @endif





    <br>
    <!-- Previous & Next Post Start -->
    <div class="post-nav mb-15">
        
        <a href="{{ route('lich-cong-tac-tuan',Carbon\Carbon::parse($ngay)->subDay()->format('Y-m-d')) }}" class="prev-post">
                <span><i class="fa fa-angle-double-left"></i>&nbsp;Ngày trước</span>

        </a>
    
        <a href="{{ route('lich-cong-tac-tuan',Carbon\Carbon::parse($ngay)->addDay()->format('Y-m-d')) }}" class="next-post">
            <span>Ngày sau&nbsp;<i class="fa fa-angle-double-right"></i></span>
                
        </a>

    </div>
    <!-- Previous & Next Post End -->
 @stop