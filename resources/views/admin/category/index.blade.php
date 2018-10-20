@extends('admin.layouts.master')

@section('head')
	<link rel="stylesheet" type="text/css" href="{{ asset('admin_assets/css/datatables/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Danh mục
        <small>Bảng điểu khiển </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Tất cả danh mục</li>
      </ol>
    </section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="box">
					<!-- Content Header (Page header) -->
					<div class="box-header with-border">
						<h3 class="box-title">
							<i class="fa fa-briefcase"></i> TẤT CẢ DANH MỤC
						</h3>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="pull-left bottom">
									<a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-circle">
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
										<table class="table table-hover" id="categories-table">
											<thead>
								              <tr>
								                <th class="text-center">#</th>
								                <th class="text-center">Tên</th>
								                <th class="text-center">Ngày tạo</th>
								                <th class="text-center">Parent</th>
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
			var table = $('#categories-table').DataTable( {
				processing: true,
				serverSide: true,
				responsive:true,
				"ajax": '{!! route('admin.categories.json.list') !!}',
				"columns": [
					{"data": "id"},
					{"data": "name"},
					{"data": "created_at" },
					{"data" : "parent_id" },
					{"data": "status"},
					{ "data": "action", orderable: false, searchable: false}
				]
			} );

			$('#categories-table').on('click', '.delete-category',function(){
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
			    			
			    			url: '{{ url('/admin/categories') }}'+'/'+$(this).siblings('input[name="id"]').val(),
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