@extends('blog.layouts.master')

@section('title')
    {{ "Search || " . $tuKhoa }}
@endsection

<?php 
    function doimau($str, $tuKhoa){
        
        return str_replace($tuKhoa, "<span style='color:red;'>$tuKhoa</span>", $str);
    }
?>

@section('content')
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row well text-center ">
            @if(isset($tuKhoa))
                <h3>Từ khóa: <strong>{{ $tuKhoa }}</strong></h3>
            @else
                <h4>Không có dữ liệu!</h4>
            @endif
        </div>
        @if(isset($posts))
            @foreach ($posts as $post)
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="https://scontent.fhan2-3.fna.fbcdn.net/v/t1.0-9/23032754_1319030634909161_8414838974445845780_n.jpg?oh=ff67e0299b2a3e30c556bac49c904748&oe=5A69004F">
                                    </a>
                                </div>
                                <div class="postMetaInline-feedSummary">
                                    <a class="link link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link" href="#">
                                        {{ $post->author['name'] }}
                                    </a>
                                    <span class="POSTMETAINLINE postMetaInline--supplemental">
                                        {{ $post->created_at->diffForHumans() }}
                                        <div class="view_count">
                                            <i class="fa fa-eye" aria-hidden="true"></i> {{ $post->view_count }}
                                        </div>
                                        <div class="comment_count">
                                            <a href="{{ route('blog.post.detail', [$post->slug]) }}#comments">
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                <span class="fb-comments-count" data-href="{{ route('blog.post.detail', [$post->slug]) }}">0</span>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <a href="{{ route('blog.post.detail',[$post->slug]) }}">
                            <h3 class="title">{!! doimau($post->title, $tuKhoa) !!}</h3>
                        </a>
                        <span>
                            {!! doimau($post->description, $tuKhoa) !!}
                            <a href="{{ route('blog.post.detail',[$post->slug]) }}"> Xem thêm</a>
                        </span>
                    </div>
                </article>
            @endforeach
            <div class="text-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection

@section('sidebarRight')
    @include('blog.layouts.sidebarRight')
@endsection
