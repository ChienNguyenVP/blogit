@extends('blog.layouts.master')


@section('content')
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
                                    {{-- {{ $post->author->user_name }} --}}
                                </a>
                                <span class="POSTMETAINLINE postMetaInline--supplemental">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <a href="{{ url('blog/'.$post->slug.'/'.$post->id) }}">
                        <h3 class="title">{{ $post->title }}</h3>
                    </a>
                    <span>
                        {{ \Illuminate\Support\Str::words($post->description , 30, ' ...') }}
                        <a href="{{ url('blog/'.$post->slug.'/'.$post->id) }}"> Xem thêm</a>
                    </span>
                </div>
            </article>
        @endforeach
        <div class="text-center">
            {{-- {{ $posts->links() }} --}}
        </div>
    @endif
@endsection
