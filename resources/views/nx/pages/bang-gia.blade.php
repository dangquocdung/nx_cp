@extends('nx.layout')

@section('meta')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $PageTitle }}" />
    <meta property="og:description" content="{{ $PageDescription }}" />
    <meta property="og:image" itemprop="image" content="{{ URL::asset('/img/logo-footer.png') }}"/>
    
@stop

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    
@endsection

@section('content')

    @php

        $slug_var = "seo_url_slug_" . trans('backLang.boxCode');

    @endphp

    <!-- Blog Section Start -->
    <div class="col-md-12 section mb-10">
        <div class="row">  
                
            <div class="col-md-9">

                <div class="single-blog mb-15">
                    <div class="blog-wrap">

                        <!-- Meta -->
                        <div class="meta fix">
                            <a href="javascript:void(0)" class="meta-item category music">
                                Dịch vụ
                            </a>
                        </div>

                        <div class="post-heading mt-15 mb-50" style="text-align:center"> 
                            <h3>{{ $PageTitle }}</h3> 
                        </div>

                        <div class="mb-25">

                            <table id="bang-gia" class="table table-striped table-bordered mt-15" style="width:100%">
                                <thead>
                                    <tr >
                                        <th style="text-align:center">TT</th>
                                        <th>Dịch vụ</th>
                                        <th style="text-align:center">Đơn giá</th>
                                        <th style="text-align:center">Ghi chú</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Models as $key=>$item)



                                        <tr>
                                            <td style="text-align:center">{{ $key+1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td style="text-align:right">{{ $item->price }}</td>
                                            <td style="text-align:right">{{ $item->note }}</td>

                                        </tr>
                                        
                                    @endforeach
                                    
                                </tbody>
                            </table>

                        </div>

                        <div class="tags-social float-left">

                            <div class="blog-social float-right">
                                <a href="{{ Helper::SocialShare("facebook", $PageTitle)}}" class="facebook" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a>
                                <a href="{{ Helper::SocialShare("twitter", $PageTitle)}}" class="twitter" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="{{ Helper::SocialShare("google", $PageTitle)}}" class="google-plus" data-placement="top" title="Google+"><i class="fa fa-google-plus"></i></a>
                            </div>
            
                        </div>
                    </div>
                </div>

            </div>
            
           <!-- Sidebar Start -->
           <div class="col-md-3">

                @include('nx.includes.ban-do')
 
                @include('nx.includes.dichvu')

                @include('nx.includes.thongbao')
                
                @include('nx.includes.tienich')

                @include('nx.includes.lienket')

                @include('nx.home.video-yt')

                
            </div><!-- Sidebar End -->
            
        </div><!-- Feature Post Row End -->
    </div>
            
@stop

@section('js')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#bang-gia').DataTable({
            "pageLength": 50,
            
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Vietnamese.json"
            }
        });
    } );
</script>
    
@endsection