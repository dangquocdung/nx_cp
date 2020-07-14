@php
    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
@endphp

<div class="footer-bottom-section" style="background: linear-gradient(to bottom, #0494da 0, #095b8c 100%);">
    <div class="container-fluid">
                <div class="footermain">
                    <div class="row">
                        <div class="col-lg-2 col-sm-4">
                            <div class="foot-logo">
                                <a href="{{ route('HomePage') }}" style="text-align:center">
                                    <img alt="" src="/uploads/settings/{{ $WebsiteSettings->style_footer_bg }}" style="width:85%">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-10 col-sm-8">
                            <div class="foot-col">
                                <nav class="foot-menu">
                                    <ul>
                                        <li><strong>&copy; {{ $WebsiteSettings->site_title_vi }}</strong></li>
                                        {{-- <li>{{ $WebsiteSettings->giayphep }}</li> --}}
                                        <li id="tbbt">Trưởng ban biên tập: <strong>{{ $WebsiteSettings->tbt }}</strong></li>
                                        <li>Điện thoại: {{ $WebsiteSettings->contact_t3 }} - Fax: {{ $WebsiteSettings->contact_t4 }}</li>
                                        <li>Địa chỉ E-mail: {{ $WebsiteSettings->contact_t5 }} - {{ $WebsiteSettings->contact_t6 }}</li>
                                        <li><em>Vui lòng ghi rõ nguồn Cổng Thông tin điện tử huyện Nghi Xuân khi bạn phát hành lại thông tin từ Website này.</em></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        
                        {{-- <div class="col-3 hidden-sm-down">
                            <div class="foot-col">
                                <div class="title">Kết nối với chúng tôi</div>
                                <div class="foot-social">
                                    <a href="https://www.facebook.com/" target="blank"><em class="fa fa-facebook" aria-hidden="true"></em> </a>
                                    <a href="#" target="blank"><em class="fa fa-google-plus" aria-hidden="true"></em> </a>
                                    <a href="https://www.youtube.com/" target="blank"><em class="fa fa-youtube" aria-hidden="true"></em> </a>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

    </div>
</div>


