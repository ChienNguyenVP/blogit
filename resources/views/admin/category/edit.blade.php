@extends('admin.layouts.master')

@section('head')

@endsection

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Danh mục
        <small>Bảng điều khiển </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('admin.categories.index') }}">Danh mục</a></li>
        <li class="active">Cập nhật</li>
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
							<i class="fa fa fa-newspaper-o"></i> CHỈNH SỬA DANH MỤC
						</h3>
					</div>
					@if(isset($category))
						<div class="box-body">
							<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
								{{ csrf_field() }}
								<input type="hidden" name="_method" value="PUT">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
										  <label for="name-category">Tên danh mục (<span style="color: red;">*</span>)</label>
										  	@if ($errors->has('name'))
			                                    <span class="help-block" style="color: red;">
			                                        <strong>{{ $errors->first('name') }}</strong>
			                                    </span>
			                                @endif
										  <input type="text" class="form-control" id="name-category" placeholder="Title .. " name="name" value="{{ $category->name }}">
										</div>
										<div class="form-group">
										  <label for="description-category">Mô tả (<span style="color: red;">*</span>)</label>
										  	@if ($errors->has('description'))
			                                    <span class="help-block" style="color: red;">
			                                        <strong>{{ $errors->first('description') }}</strong>
			                                    </span>
			                                @endif
										  <textarea class="form-control" rows="5" id="description-category" placeholder="Description ... " name="description">{!! $category->description !!}</textarea>
										</div>

										<!-- THUMBNAIL -->
										<label for="lfm">Ảnh thu nhỏ</label>
										<div class="thumbnail">
											<img src="{{ $category->thumbnail }}" alt="@if( $category->thumbnail != '') {{ 'No Image' }} @else {{ $category->thumbnail }} @endif" alt="No Image" style="min-width: 250px; min-height: 200px;" id="holder">
											<input id="thumbnail" class="form-control" type="hidden" name="thumbnail" value="{{ $category->thumbnail }}" alt="@if( $category->thumbnail != '') {{ 'No Image' }} @else {{ $category->thumbnail }} @endif">
										</div>
										<button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i>CHOOSE</button>
										<!-- END THUMBNAIL -->
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
														<option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Publish</option>
														<option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Draft</option>
													</select>
												</div> 
												<div class="form-group">
													<div class="pull-right">
														<button type="submit" class="btn btn-primary">PUBLISH</button>
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
													<i class="fa fa-list" aria-hidden="true"></i> Danh mục cha
												</h3>
											</div>
											<div class="box-body">
												<div class="form-group">
													<select class="form-control" id="sel1" name="parent_id">
														<option value="">Chọn</option>
														@if(isset($categories))
															@foreach ($categories as $category1)
																@if(($category1->id != $category->id) and ($category1->id != 1))
																	<option value="{{ $category1->id }}" {{ $category1->id == $category->parent_id ? 'selected' : '' }}>
																		{{ $category1->name }}
																	</option>
																@endif
															@endforeach
														@endif
													</select>
												</div> 
											</div>
										</div>
										<!-- END CATEGORIES -->
									</div>
								</div>
							</form>
						</div>
					@endif
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
		$('#lfm').filemanager('image',  {prefix: "/files"});
	</script>
@endsection