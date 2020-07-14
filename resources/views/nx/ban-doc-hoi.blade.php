@extends('nx.layout')

@php

    $slug_var = "seo_url_slug_" . trans('backLang.boxCode');

@endphp

@section('meta')

    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Bạn đọc hỏi, cơ quan chức năng trả lời" />
    <meta property="og:description" content="Bạn đọc hỏi, cơ quan chức năng trả lời" />
    <meta property="og:image" itemprop="image" content="{{ URL::asset('/uploads/banners/15682751454481.jpg') }}" />

@stop

@section('content')

<div class="post-block-wrapper">
    
    <!-- Post Block Head Start -->
    <div class="head">
        
        <!-- Title -->
        <h4 class="title">Đặt câu hỏi tại đây</h4>
        
    </div><!-- Post Block Head End -->
    
    <!-- Post Block Body Start -->
    <div class="body">
        
        <div class="post-comment-form">

                <div id="sendmessage"><i class="fa fa-check-circle"></i>
                    &nbsp;Bình luận của bạn đã được gửi thành công. Cảm ơn bạn! &nbsp; 
                    <a href="{{ URL::current() }}">
                        <i class="fa fa-refresh"></i> Làm mới
                    </a>
                </div>
                <div id="errormessage">Lỗi: Vui lòng thử lại</div>

                {{ Form::open(['route'=>['Home'],'method'=>'POST','class'=>'commentForm']) }}

                <div class="form-group">
                    {!! Form::text('comment_name',"", array('placeholder' => trans('frontLang.yourName'),'class' => 'form-control','id'=>'comment_name', 'data-msg'=> trans('frontLang.enterYourName'),'data-rule'=>'minlen:4')) !!}
                    <div class="alert alert-warning validation"></div>
                </div>
                <div class="form-group">
                    {!! Form::email('comment_email',"", array('placeholder' => trans('frontLang.yourEmail'),'class' => 'form-control','id'=>'comment_email', 'data-msg'=> trans('frontLang.enterYourEmail'),'data-rule'=>'email')) !!}
                    <div class="validation"></div>
                </div>
                <div class="form-group">
                    {!! Form::textarea('comment_message','', array('placeholder' => trans('frontLang.comment'),'class' => 'form-control','id'=>'comment_message','rows'=>'5', 'data-msg'=> trans('frontLang.enterYourComment'),'data-rule'=>'required')) !!}
                    <div class="validation"></div>
                </div>
                
                <div class="float-right">
                    <button type="submit"
                            class="btn btn-theme">{{ trans('frontLang.sendQuestion') }}</button>
                </div>

                {{Form::close()}}
            
        </div>
        
    </div><!-- Post Block Body End -->
    
</div><!-- Post Block Wrapper End -->

@stop
