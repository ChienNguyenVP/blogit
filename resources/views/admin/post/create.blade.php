@extends('admin.layouts.master')

@section('head')

@endsection

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa fa-newspaper-o"></i> Bài viết
        <small>Bảng điều khiển</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.posts.index') }}">Tất cả bài viết</a></li>
        <li>Thêm mới </li>
      </ol>
    </section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12 connectedSortable">
				<div class="box box-default">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-plus" aria-hidden="true"></i> THÊM MỚI BÀI VIẾT
						</h3>
					</div>
					<div class="box-body">
						<form action="{{ route('admin.posts.store') }}" method="post">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
									  <label for="title-post">Tiêu đề(<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('title'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('title') }}</strong>
		                                    </span>
		                                @endif
									  <input type="text" class="form-control" id="title-post" placeholder="Title .. " name="title" value="{{ old('title') }}">
									</div>
									<div class="form-group">
									  <label for="description-post">Mô tả (<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('description'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('description') }}</strong>
		                                    </span>
		                                @endif
									  <textarea class="form-control" rows="5" id="description-post" placeholder="Description ... " name="description">{{ old('description') }}</textarea>
									</div>
									<div class="form-group">
										<label for="content-post">Nội dung (<span style="color: red;">*</span>)</label>
										@if ($errors->has('content'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('content') }}</strong>
		                                    </span>
		                                @endif
										<textarea class="form-control" cols="50" rows="10" id="content-post" placeholder="Content..." name="content">{!! old('content') !!}</textarea>
									</div>
								</div>
								<div class="col-lg-4">
									<!-- STATUS POST-->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-bookmark" aria-hidden="true"></i> Trạng thái
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<select class="form-control" id="sel1" name="status">
											@role('admin')	<option value="1" @if(old('status') != null ) {{ old('status') == 1 ? 'selected' : '' }} @endif>Publish</option> @endrole
													<option value="0" @if(old('status') != null ) {{ old('status') == 0 ? 'selected' : '' }} @endif>Draft</option>
												</select>
											</div> 
											<div class="form-group">
												<label class="checkbox-inline">
													<input name="is_featured" type="checkbox" value="1" {{ old('is_featured') == 1 ? 'checked' : '' }}> Featured
												</label>
												<div class="pull-right">
													<button type="submit" class="btn btn-primary">Đăng bài </button>
												</div>
											</div>
										</div>
									</div>
									<!-- END STATUS POST -->
									<!-- CATEGORIES -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-list" aria-hidden="true"></i> Danh mục
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<select class="form-control" id="sel1" name="category_id">
													@if(isset($categories))
														@foreach ($categories as $category)
															<option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}>
																{{ $category->name }}
															</option>
														@endforeach
													@endif
												</select>
											</div> 
										</div>
									</div>
									<!-- END CATEGORIES -->
									<!-- THUMBNAIL -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-picture-o" aria-hidden="true"></i> Ảnh thu nhỏ
											</h3>
										</div>
										<div class="box-body">
											<div class="thumbnail">
												<img src="{{ old('thumbnail') }}" alt="No Image" style="width: 250px; height: 200px;" id="holder">
												<input id="thumbnail" class="form-control" type="hidden" name="thumbnail" style="width: 250px; height: 200px;" value="{{ old('thumbnail') }}">
											</div>
											<button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i>Chọn ảnh </button>
										</div>
									</div>
									<!-- END THUMBNAIL -->
									<!-- TAGS -->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-tags" aria-hidden="true"></i> Tags
											</h3>
										</div>
										<div class="box-body">
											<div class="form-group">
												<input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{ old('tags') }}">
											</div>
										</div>
									</div>
									<!-- END TAGS -->
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Main row -->
	</section>
	<!-- /.content -->
@endsection

@section('footer')
	<script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
	<script>
		Editor('content-post');
		$('#lfm').filemanager('image',  {prefix: "/files"});

		$(function(){
			$('form').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
			    e.preventDefault();
			    return false;
			  }
			});
		});
	</script>
@endsection