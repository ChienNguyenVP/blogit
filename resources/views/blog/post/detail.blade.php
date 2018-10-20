@extends('blog.layouts.master')

@section('title')
	@if(isset($post->title)) {{ $post->title }} @endif
@endsection

@section('head')
	{{-- add meta --}}
	<meta property="og:url"           content="{{ url()->current() }}" />
	<meta property="og:type"          content="" />
	<meta property="og:title"         content="@if($post) {{ $post->title }} @endif" />
	<meta property="og:description"   content="@if($post) {{ $post->description }} @endif" />
	<meta property="og:image"         content="http://android.coloawap.net/wp-content/uploads/2014/01/710.png" />
	{{-- end add meta --}}
@endsection
@section('content')
	@if(isset($post))
		<div class="col-xs-12 col-sm-8 col-md-8">
		    <div class="post-detail-box">
		    	<div class="detail-post-info">
			        <div class="block-postMeta postMeta-previewHeader">
			            <div class="u-floatLeft">
			                <div class="postMetaInline-avatar">
			                    <a class="link avatar u-color--link" href="#">
			                        <img class="img-responsive avatar-image u-xs-size32x32 u-sm-size36x36" src="{{asset($post->author['avatar']) }}">
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
	                                    	<span class="fb-comments-count" data-href="{{ url()->current() }}">0</span>
	                                    </a>
                                    </div>
			                    </span>
			                </div>
			            </div>
			        </div>
			    </div>
			    <div class="detail-post-headding">
			    	<h1 class="title">{{ $post->title }}</h1>
			    	<div class="detail-post-description">
			    		<blockquote><p><i>{{ $post->description }}</i></p></blockquote>
			    	</div>
			    </div>
			   {{--  @if($post->thumbnail)
			    	<div class="img-post">
			    		<div class="embed-responsive embed-responsive-16by9">
			    			<img src="{{ $post->thumbnail }}">
			    		</div>
			    	</div>
			   	@endif --}}
		    	<div class="content-post">
		    		{!!  $post->content !!}
		    	</div>
		    	<div class="share-post">
			    	<div class="share">
			    		<h3 class="sd-title">Chia sẻ</h3>
			    		<ul class="social-network social-circle">
			    			{{-- share facebook --}}
			    			<li>
			    				<div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2F127.0.0.1%3A8000%2F&amp;src=sdkpreparse">Share</a></div>
			    			</li>
			    			{{-- end share facebook --}}
			    		</ul>
			    	</div>
			    	<div class="share">
			    		<h3 class="sd-title">
			    			Tags:
			    			@if($post->tags)
				    			@foreach ($post->tags as $tag)
				    				<a href="{{ url('blog/tag/'.$tag->id.'/'.$tag->slug ) }}" class="tag">
				    					<span>{{ $tag->name }}</span>
				    				</a>
				    			@endforeach
			    			@endif
			    		</h3>
			    	</div>
			    	<div class="share">
			    		<div class="author-info">
			    			<div class="author-avatar">
			    				<img src="{{ asset($post->author['avatar'] )}}" class="avatar avatar-96 photo im-responsive" style="max-width: 100px;">
			    			</div>
			    			<div class="author-description">
			    				<h3 class="author-title">
			    					<a href="#" class="author-link">{{ $post->author['name'] }}</a>
			    				</h3>
			    				<p>{{ $post->author['email'] }}</p>
			    				<div class="icon-social-follow">
									<div class="fb-follow" data-href="https://www.facebook.com/nguyenmanh1997" data-layout="button_count" data-size="small" data-show-faces="true"></div>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    	<div class="clearfix"></div>
			    	<div class="share" id="comments">
			    		<div class="fb-comments" data-href="{{ url()->current() }}" data-width="100%" data-numposts="5"></div>
			    	</div>
			    </div>
		    </div>
		</div>
	@endif
@endsection

@section('sidebarRight')
    @include('blog.layouts.sidebarRight')
@endsection