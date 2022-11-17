@extends('layouts.admin')

@section('content')		
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">

			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Magazines</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">@if(@$blog) Update Magazine @else Add New Magazine @endif</li>
						</ol>
					</nav>
				</div>
			</div>
			<!--end breadcrumb-->

          <div class="card">
			  @include('admin.inc.message')
			  <div class="card-body p-4">
				  <h5 class="card-title">@if(@$blog) Update Magazine @else Add New Magazine @endif</h5>
				  <hr/>
                   <div class="form-body mt-4">
                   	<form action="@if(@$blog){{ route('blog.update', $blog->id) }}@else{{ route('blog.store') }}@endif" method="post" enctype="multipart/form-data">
                   		@csrf
                   		@if(@$blog)
                   		  @method('put')
                   		  <input type="hidden" name="role_id" value="{{ $blog->role_id }}">
                   		@endif  

					    <div class="row">
						   <div class="col-lg-12">
	                       <div class="border border-3 p-4 rounded">
							  <div class="mb-3">
								<label for="blogt" class="form-label">Magazine Title *</label>
								<small class="text-danger">@error('title'){{ $message }}@enderror</small>
								<input type="text" name="title" @if(@$blog)value="{{ $blog->title }}"@endif class="form-control" id="blogt" placeholder="Enter Magazine title">
							  </div>
							  <div class="mb-3">
								<label for="formFile" class="form-label">Choose image *</label>
								@if(@$blog)<img src="{{ asset("uploads/blog/$blog->image") }}" width="80">@endif
								<small class="text-danger">@error('image'){{ $message }}@enderror</small>
								<input class="form-control" type="file" name="image" id="formFile">
							  </div>
							  <div class="mb-3">
								<label for="formFile" class="form-label">Choose Banner image *</label>
								@if(@$blog)<img src="{{ asset("uploads/blog/$blog->banner") }}" width="80">@endif
								<small class="text-danger">@error('banner'){{ $message }}@enderror</small>
								<input class="form-control" type="file" name="banner" id="formFile">
							  </div>
							  <div class="mb-3">
								<label for="edit" class="form-label">Magazine Editor Name *</label>
								<small class="text-danger">@error('editor'){{ $message }}@enderror</small>
								<input type="text" name="editor" @if(@$blog)value="{{ $blog->editor }}"@endif class="form-control" id="edit" placeholder="Enter Magazine Editor's Name">
							  </div>
							  <div class="mb-3">
								<label for="edit" class="form-label">Magazine Short Description <small>(Optional)</small></label>
								<small class="text-danger">@error('short_description'){{ $message }}@enderror</small>
								<input type="text" name="short_description" @if(@$blog)value="{{ $blog->short_description }}"@endif class="form-control" id="edit" placeholder="Enter Magazine's Short Description">
							  </div>
							  <div class="mb-3">
								<label for="formFile" class="form-label">Magazine PDF<small> (Optional)</small></label>
								@if(@$blog->pdf!==null)
								<iframe src="{{ asset("uploads/blog/$blog->pdf") }}" style="width:150px; height:70px;" frameborder="0"></iframe>
								@endif
								<small class="text-danger">@error('pdf'){{ $message }}@enderror</small>
								<input class="form-control" type="file" name="pdf" id="formFile">
							  </div>
							  <div class="col-12">
								<label class="form-label">Magazine's Description</label>
								<small class="text-danger">@error('description'){{ $message }}@enderror</small>
								<textarea class="form-control" name="description" id="editor" placeholder="Write Magazine's description..." rows="8">
									{{ @$blog->description }}
								</textarea>
							  </div>
							  <div class="mb-3 mt-2">
								<label for="bstatus" class="form-label">Select Status *</label>
								  <select name="status" class="form-select mb-3" aria-label="Default select example" id="bstatus">
									<option value="1" {{ @$blog->status===1 ? 'selected': '' }}>Active</option>
									<option value="0" {{ @$blog->status===0 ? 'selected': '' }}>De-Active</option>
								  </select>
							  </div>	  
							   <div class="d-grid text-center mt-4">
	                              <input type="submit" class="btn btn-primary"/ value="{{ @$blog ? 'Update Magazine': 'Save Magazine' }}">
							   </div>
	                        </div>
						   </div>
					   	</div>
					</form>   	
				</div>
			  </div>
		  </div>

		</div>
	</div>
	<!--end page wrapper -->
@endsection
@push('styles')
	<style type="text/css">
		.ck-editor__editable[role="textbox"] {
	        /* editing area */
	        min-height: 200px;
	    }
	</style>            
@endpush

@push('scripts')

{{-- Ck Editor scripts  --}}
  <script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>
	<script>
        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
@endpush	