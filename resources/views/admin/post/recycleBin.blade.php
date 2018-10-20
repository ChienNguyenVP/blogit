@extends('admin.layouts.master')

@section('head')
	{{-- <link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/datatables/jquery.dataTables.min.css') }}"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/datatables/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa fa-newspaper-o"></i> RECYCLE BIN ( POSTS )
						</h3>
					</div>
					<div class="box-body">
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
				"ajax": '{!! route('admin.recycleBin.posts.json.listPost') !!}',
				"columns": [
					{"data": "id"},
					{"data": "title"},
					{"data": "created_at" },
					{"data" : "is_featured" },
					{"data": "status"},
					{ "data": "action", orderable: false, searchable: false}
				]
			} ); 

			$('#posts-table').on('click', '.delete-post',function(){
				swal({
				  title: "Are you sure?",
				  text: "Nếu bấm chọn xóa, bài viết sẽ mất vĩnh viễn khỏi hệ thống!",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
					    $.ajax({
			    			method: "POST",
			    			url: '{!! route('admin.recycleBin.posts.delete') !!}',
			    			data: { 
			    				id: $(this).siblings('input[name="id"]').val(), 
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