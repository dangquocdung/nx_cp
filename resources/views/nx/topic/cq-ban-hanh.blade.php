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
    if (count($Topics->fields) > 0) {
        foreach ($Topics->fields as $t_field) {
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

        @if($customField->type ==6)
            {{--Select--}}
            <div class="form-group row">
                <label for="{{'customField_'.$customField->id}}"
                       class="col-sm-2 form-control-label">{!!  $cf_title !!}
                    {!! $cf_land_identifier !!}</label>
                <div class="col-sm-10">
                    <select name="{{'customField_'.$customField->id}}"
                            id="{{'customField_'.$customField->id}}"
                            class="form-control c-select" {{$cf_required}}>
                        <option value="">- - {!!  $cf_title !!} - -</option>
                        <?php
                        $cf_details_var = "details_" . trans('backLang.boxCode');
                        $cf_details_var2 = "details_en" . trans('backLang.boxCodeOther');
                        if ($customField->$cf_details_var != "") {
                            $cf_details = $customField->$cf_details_var;
                        } else {
                            $cf_details = $customField->$cf_details_var2;
                        }
                        $cf_details_lines = preg_split('/\r\n|[\r\n]/', $cf_details);
                        $line_num = 1;
                        ?>
                        @foreach ($cf_details_lines as $cf_details_line)
                            <option value="{{ $line_num  }}" {{ ($cf_saved_val == $line_num) ? "selected='selected'":""  }}>{{ $cf_details_line }}</option>
                            <?php
                            $line_num++;
                            ?>
                        @endforeach
                    </select>
                </div>
            </div>
        
        @endif
    @endif

@endforeach
@endif
{{--End of -- Additional Feilds--}}