@extends('layouts.admin')	

@section('content')

	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">

			{{-- <hr/> --}}
			@include('admin.inc.message')
			<div class="card">
				<div class="card-body">
					<div class="d-lg-flex align-items-center mb-4 gap-3">
					  <div class=""><a href="{{ route('blog.create') }}" class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>Add New Magazine</a></div>
					</div>
					<div class="table-">
						<table id="example2" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th width="3%">Sr.N</th>
									<th width="10%">image</th>
									<th>Title</th>
									<th width="15%">Short Desc..</th>
									<th>Description</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>

							  @foreach($blogs as $blog)
								<tr>
									<td class="text-center">{{ $loop->iteration }}<p>{{ ucfirst($blog->editor) }}</p></td>
									<td>
										<div class="product-img bg-transparent border">
											<img src="{{ asset("uploads/blog/$blog->image") }}" class="p-1 img-responsive" alt="">
										</div>	
										<div class="product-img bg-transparent border">	
											<img src="{{ asset("uploads/blog/$blog->banner") }}" class="p-1 img-responsive" alt="">
										</div>
										@if($blog->pdf!==null)
											<iframe src="{{ asset("uploads/blog/$blog->pdf") }}" class="mt-2" style="width:100%; height:60px;" frameborder="0"></iframe>
										@endif
									</td>
									<td><small>{{ ucfirst($blog->title) }}</small></td>
									<td><small>{{ ucfirst($blog->short_description) }}</small></td>
									<td><small>{!!htmlspecialchars_decode(ucfirst($blog->description))  !!}</small></td>								
									<td>
									  @if($blog->status===1 or $blog->status==='1')
										<div class="badge rounded-pill text-success bg-light-success p-2 text-uppercase px-3">Active</div>
									  @else
									    <div class="badge rounded-pill text-danger bg-light-danger p-2 text-uppercase px-3">De Active</div>
									  @endif   
									</td>  
									<td>
										<div class="d-flex order-actions">
											<a href="{{ route('blog.edit', $blog->id) }}" class="ms-3"><i class='bx bxs-edit'></i></a>
											<form action="{{ route('blog.destroy', $blog->id) }}" method="post">
											@csrf
											@method('delete')	
											<button class="ms-2" type="submit" onclick="return confirm(&quot;Confirm delete ?&quot;)"><i class='bx bxs-trash'></i></button>
											</form>
										</div>
									</td>
								</tr>
							  @endforeach		
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--end page wrapper -->
@endsection	
@push('styles')
	<link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
	<style>
	.product-img {
     width: unset; 
     height: unset; 
     border-radius: unset;
     }
     .product-img img{
     	width: 100%;
     	height: unset;
     }
	</style>
@endpush

@push('scripts')
	<script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	<script>
		$(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
	</script>
@endpush