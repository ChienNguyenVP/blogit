@extends('admin.layouts.master')

@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/datatables/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<!-- Widget: user widget style 1 -->
	          <div class="box box-widget widget-user">
	            <!-- Add the bg color to the header using any of the bg-* classes -->
	            <div class="widget-user-header bg-black" style="background: url('{{ $category->thumbnail }}') center center;">
	              <h3 class="widget-user-username">{{ $category->name }}</h3>
	              <h5 class="widget-user-desc">{{ $category->description }}</h5>
	            </div>
	            <div class="box-footer">
	              <div class="row">
	                <div class="col-sm-4 border-right">
	                  <div class="description-block">
	                    <h5 class="description-header"></h5>
	                    <span class="description-text"></span>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	                <!-- /.col -->
	                <div class="col-sm-4 border-right">
	                  <div class="description-block">
	                    <h5 class="description-header">@if(isset($countPost)) {{ $countPost }} @endif</h5>
	                    <span class="description-text">Bài Viết</span>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	                <!-- /.col -->
	                <div class="col-sm-4">
	                  <div class="description-block">
	                    <h5 class="description-header"> </h5>
	                    <span class="description-text"></span>
	                  </div>
	                  <!-- /.description-block -->
	                </div>
	                <!-- /.col -->
	              </div>
	              <!-- /.row -->
	            </div>
	          </div>
	          <!-- /.widget-user -->
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa fa-newspaper-o"></i> LIST POST IN CATEGORY : <strong>{{  $category->name }}</strong>
						</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-left bottom">
									<a href="{{ route('admin.posts.create') }}" class="btn btn-primary btn-circle">
										<i class="fa fa-plus"></i>Thêm mới
									</a>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div >
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-hover" id="posts-table">
											<thead>
								              <tr>
								                <th class="text-center">#</th>
								                <th class="text-center">title</th>
								                <th class="text-center">Ngày tạo</th>
								                <th class="text-center">Featured</th>
								                <th class="text-center">Trạng thái</th>
								                <th class="text-center">Hành động</th>
								              </tr>
								            </thead>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main row -->
	</section>
	<!-- /.content -->
@endsection

@section('footer')
	<script type="text/javascript" src="{{ asset('admin_assets/js/datatables/jquery.dataTables.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('admin_assets/js/datatables/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		
	    $(function () {
			var table = $('#posts-table').DataTable( {
				processing: true,
				serverSide: true,
				responsive:true,
				"ajax": '{!! route('admin.categories.json.posts', $category->id) !!}',
				"columns": [
					{ "data": "id"},
					{ "data": "title"},
					{ "data": "created_at" },
					{"data" : "is_featured" },
					{"data": "status"},
					{ "data": "action", orderable: false, searchable: false}
				]
			} );

			$('#posts-table').on('click', '.delete-post',function(){
				swal({
				  title: "Are you sure?",
				  text: "Nếu bấm chọn xóa, bài viết sẽ bị xóa!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
					    $.ajax({
			    			method: "POST",
			    			
			    			url: '{{ url('/admin/posts') }}'+'/'+$(this).siblings('input[name="id"]').val(),
			    			data: { 
			    				// id: $(this).siblings('input[name="id"]').val(), 
			    				_token : $('meta[name="csrf-token"]').attr('content'),
			    				_method : "DELETE"
			    			}
							,
			    			success: function(result){
			    				table.ajax.reload();
			    				swal("Sucess! Bạn đã xóa thành công!", {
							      icon: "success",
							    });
							    $.notify("Bạn đã xóa thành công!","success", {autoHideDelay: 5000 });
					        },
					        error: function(){
					        	aswal("warning! Xóa thất bại!", {
							      icon: "warning",
							    });
					        }
			    		});
					}else{
						$.notify("Hủy thao tác!", {autoHideDelay: 5000 });
					}
				});
		    });
	    });
	</script>
@endsection