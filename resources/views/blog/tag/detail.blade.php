@extends('blog.layouts.master')

@section('title')
    {{ "tag || " . $tag->name }}
@endsection


@section('content')
    <div class="col-xs-12 col-sm-8 col-md-8">
        <div class="row well text-center "><h3>Tag: <strong>{{ $tag->name }}</strong></h3></div>
        @if(isset($posts))
            @foreach ($posts as $post)
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="{{ $post->author['avatar'] }}">
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
                                                <span class="fb-comments-count" data-href="{{ url()->current() }}">0</span>
                                            </a>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($post->thumbnail)
                        <div class="col-xs-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <img src="{{ $post->thumbnail }}" style="min-width: 100%; max-width: 100%;" alt="{{ $post->title }}">
                            </div>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <a href="{{ route('blog.post.detail',[$post->slug]) }}">
                            <h3 class="title">{{ $post->title }}</h3>
                        </a>
                        <span>
                            {{ \Illuminate\Support\Str::words($post->description , 30, ' ...') }}
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
