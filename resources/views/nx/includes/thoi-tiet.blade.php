

<div class="col-md-12 mb-15">
    <div class="row">
        <div class="Head pos-rel clearfix">
            <h2 class="ParentCate left">
                    <img src="/nx/img/icon-cm.png">

                <a href="#">Thời tiết Hà Tĩnh</a>
            </h2>
            <span class="line-red">.</span>
        </div>
    </div>
            
    <div class="row sidebar">
            
            <div class="box-banner box-thoi-tiet" style="text-align:center">

                <div style="padding: 5px 15px">
    
                    <table style="text-align:left; margin-bottom: 5px;">
                        <tr>
                            <td>Nhiệt độ: &emsp;</td>
                            <th style="color:red">{{ round(intval($ThoiTiet->main->temp) - 273.15) }}&#8451;</th>
                        </tr>
                        <tr>
                            <td>Độ ẩm: &emsp;</td>
                            <th>{{ $ThoiTiet->main->humidity }}%</th>
                        </tr>
                        <tr>
                            <td>Tốc độ gió: &emsp;</td>
                            <th style="color:blue">{{ round(floatval($ThoiTiet->wind->speed)*1.852) }} km/h</th>
                        </tr>
                    </table>
                </div>
            </div>
                
    </div>
            
</div>
    