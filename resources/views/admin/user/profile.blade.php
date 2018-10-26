@extends('admin.layouts.master')

@section('head')

@endsection

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa fa-newspaper-o"></i> Thông tin
        <small>Bảng điều khiển</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li>Chỉnh sửa thông tin cá nhân</li>
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
							<i class="fa fa-plus" aria-hidden="true"></i> CHỈNH SỬA THÔNG TIN CÁ NHÂN
						</h3>
						@if (session('success'))
						    <div class="alert" style="color: green; font-size: larger;">
						        {{session('success') }}
						    </div>
						@endif
					</div>
					<div class="box-body">
						<form action="{{ route('profile',$user->id)}}" method="post">
							{{ csrf_field() }}
							<div class="row">
								<div class="col-lg-8">
									<div class="form-group">
									  <label for="title-post">Họ Tên(<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('name'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
									  <input type="text" class="form-control" id="title-post" placeholder="Điền Họ Tên " name="name" value="{{ $user->full_name }}">
									</div>
									<div class="form-group">
									  <label for="title-post">User Name(<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('name'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
									  <input type="text" class="form-control" id="title-post" placeholder="User Name " name="username" value="{{ $user->username}}">
									</div>
									<div class="form-group">
									  <label for="title-post">Email(<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('email'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
									  <input type="email" class="form-control" id="title-post" placeholder="Email " name="email" value="{{$user->email}}">
									</div>
									<div class="form-group">
									  <label for="title-post">Số Điện Thoại(<span style="color: red;">*</span>)</label>
									  	@if ($errors->has('phone'))
		                                    <span class="help-block" style="color: red;">
		                                        <strong>{{ $errors->first('phone') }}</strong>
		                                    </span>
		                                @endif
									  <input type="number" class="form-control" id="title-post" placeholder="Số điện thoại " name="phone" value="{{ $user->phone_number}}">
									</div>
									<div class="pull-left">
													<button type="submit" class="btn btn-primary">Lưu Thông Tin </button>
									</div>
								</div>
								<div class="col-lg-4">
									<!-- STATUS POST-->
									<div class="box box-primary">
										<!-- Content Header (Page header) -->
										<div class="box-header with-border">
											<h3 class="box-title">
												<i class="fa fa-picture-o" aria-hidden="true"></i>Ảnh đại diện
											</h3>
										</div>
										<div class="box-body">
											<div class="thumbnail">
												<img src="{{ $user->avatar }}" alt="No Image" style="width: 250px; height: 200px;" id="holder">
												<input id="thumbnail" class="form-control" type="hidden" name="thumbnail" style="width: 250px; height: 200px;" value="{{  $user->avatar }}">
											</div>
											<button type="button" id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary"><i class="fa fa-picture-o" aria-hidden="true"></i>Chọn ảnh </button>
										</div>
									</div>
									<!-- END STATUS POST -->
									<!-- CATEGORIES -->
									
									<!-- END CATEGORIES -->
									<!-- THUMBNAIL -->
									
									<!-- END THUMBNAIL -->
									<!-- TAGS -->
									
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
		// Editor('content-post');
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