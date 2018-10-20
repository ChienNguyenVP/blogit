@extends('blog.layouts.master')

@section('content')
    <div class="col-xs-12 col-sm-8 col-md-8">
        @if(isset($posts))
            @foreach ($posts as $post)
                <article class="row article">
                    <div class="col-xs-12">
                        <div class="category-post">
                            <a href="{{ route('blog.category.detail',[$post->category['id'], $post->category['slug']]) }}">
                                <span class="label label-danger">{{ $post->category['name'] }}</span>
                            </a>
                        </div>
                        <div class="block-postMeta postMeta-previewHeader">
                            <div class="u-floatLeft">
                                <div class="postMetaInline-avatar">
                                    <a class="link avatar u-color--link" href="#">
                                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="{{ $post->author['avatar'] }}">
                                    </a>
                                </div>
                                <div class="postMetaInline-feedSummary">
                                    <a class="link link--darken link--accent u-accentColor--textNormal u-accentColor--textDarken u-color--link user-link" href="{{ route('user.detail',$post->author['id']) }}">
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
                    @if($post->thumbnail)
                        <div class="col-xs-12">
                            <div class="embed-responsive embed-responsive-16by9">
                                <a href="{{ route('blog.post.detail', [$post->slug]) }}">
                                    <img src="{{ $post->thumbnail }}" style="min-width: 100%; max-width: 100%;" alt="{{ $post->title }}">
                                </a>
                            </div>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <a href="{{ route('blog.post.detail', [$post->slug]) }}">
                            <h3 class="title">{{ $post->title }}</h3>
                        </a>
                        <span>
                            {{ \Illuminate\Support\Str::words($post->description , 30, ' ...') }}
                            <a class="see-more" href="{{ route('blog.post.detail', [$post->slug]) }}"> Xem thêm</a>
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

