@extends('admin.layouts.master')

@section('head')
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
							<i class="fa fa fa-newspaper-o"></i> CỘNG TÁC VIÊN
						</h3>
					</div>
					<div class="box-body">
						<div >
							<div class="row">
								<div class="col-lg-12">
									<div class="table-responsive">
										<table class="table table-hover" id="users-table">
											<thead>
								              <tr>
								                <th class="text-center">#</th>
								                <th class="text-center">Username</th>
								                <th class="name">Name</th>
								                <th class="text-center">Ngày đăng ký</th>
								                <th class="text-center">Trạng thái</th>
								                {{-- <th class="text-center">Admin</th> --}}
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
	    	// $('#posts-table').css('width', '100%');
			$('#users-table').DataTable( {
				processing: true,
				serverSide: true,
				responsive:true,
				"ajax": {
					url : '{!! route('admin.users.json.listUsers') !!}',
				},
				"columns": [
					{ "data": "id"},
					{ "data": "username"},
					{ "data": "name"},
					{ "data": "created_at" },
					{"data": "status"},
					// {"data": "is_admin"},
					{ "data": "action", orderable: false, searchable: false}
				]
			});
				$('#users-table').on('click', '.delete-user',function(e){
					e.preventDefault();
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
			    			
			    			url: '{{ url('/admin/users') }}'+'/'+$(this).siblings('input[name="id"]').val(),
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
					        error: function(result){
					        	swal("warning! Xóa thất bại!", {
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