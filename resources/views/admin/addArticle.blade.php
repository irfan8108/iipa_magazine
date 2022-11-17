@extends('layouts.admin')

@section('content')		
	<!--start page wrapper -->
	<div class="page-wrapper">
		<div class="page-content">

			<!--breadcrumb-->
			<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
				<div class="breadcrumb-title pe-3">Article</div>
				<div class="ps-3">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb mb-0 p-0">
							<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
							</li>
							<li class="breadcrumb-item active" aria-current="page">@if(@$article) Update Article @else Add New Article @endif</li>
						</ol>
					</nav>
				</div>
			</div>
			<!--end breadcrumb-->

          <div class="card">
          	@include('admin.inc.message')
			  <div class="card-body p-4">
				  <h5 class="card-title">@if(@$article) Update Article @else Add New Article @endif</h5>
				  <hr/>
                   <div class="form-body mt-4">
                   	<form action="@if(@$article){{ route('article.update', $article->id) }}@else{{ route('article.store') }}@endif" method="post" enctype="multipart/form-data">
                   		@csrf
                   		@if(@$article)
                   			@method('put')
                   		@endif
					    <div class="row">
						   <div class="col-lg-12">
	                       <div class="border border-3 p-4 rounded">
	                       	  <div class="mb-3">
								<label for="bstatus" class="form-label">Select Magazine *</label>
								<small class="text-danger">@error('blog_id'){{ $message }}@enderror</small>
								  <select name="blog_id" class="form-select mb-3" aria-label="Default select example" id="bstatus">
								  	<option value="">Select Magazine</option>
									@foreach(@$blogs as $blog)
									<option value="{{ $blog->id }}"{{ @$article->blog_id==$blog->id ? 'selected': '' }}>{{ $loop->iteration }}. {{ $blog->title }}</option>
									@endforeach
								  </select>
							  </div>
							  <div class="mb-3">
								<label for="categorytitle" class="form-label">Article Title *</label>
								<small class="text-danger">@error('title'){{ $message }}@enderror</small>
								<input type="text" name="title" @if(@$article)value="{{ $article->title }}"@endif class="form-control" id="categorytitle" placeholder="Enter Article title">
							  </div>
							  <div class="mb-3">
								<label for="formFile" class="form-label">Article's image (Optional)</label>
								@if(@$article)
								<img src="{{ asset("uploads/article/$article->image") }}" width="70">
								@endif
								<small class="text-danger">@error('image'){{ $message }}@enderror</small>
								<input class="form-control" name="image" type="file" id="formFile">
							  </div>
							  <div class="mb-3">
								<label for="editorname" class="form-label">Article Editor Name </label>
								<small class="text-danger">@error('editor'){{ $message }}@enderror</small>
								<input type="text" name="editor" @if(@$article)value="{{ $article->editor }}"@endif class="form-control" id="editorname" placeholder="Article Editor's Name">
							  </div>
							  <div class="mb-3">
								<label for="formFile" class="form-label">Article's pdf <small>( Optional )</small></label>
								@if(@$article)
								<iframe src="{{ asset("uploads/article/$article->pdf") }}" style="width:150px; height:70px;" frameborder="0"></iframe>
								@endif
								<small class="text-danger">@error('pdf'){{ $message }}@enderror</small>
								<input class="form-control" name="pdf" type="file" id="formFile">
							  </div>
							  <div class="col-12">
								<label for="about" class="form-label">Article's Description</label>
								<small class="text-danger">@error('description'){{ $message }}@enderror</small>
								<textarea class="form-control" name="description" id="editor" placeholder="Write Article's description..." rows="8">{!! htmlspecialchars_decode(@$article->description) !!}</textarea>
							  </div>
							  <div class="mb-3 mt-3">
								<label for="bstatus" class="form-label">Select Status</label>
								  <select name="status" class="form-select mb-3" aria-label="Default select example" id="bstatus">
										<option value="1" {{ @$article->status===1 ? 'selected': '' }}>Active</option>
										<option value="0" {{ @$article->status===0 ? 'selected': '' }}>De-Active</option>
								  </select>
							  </div>	  
							   <div class="d-grid text-center mt-4">
	                              <input type="submit" class="btn btn-primary" value="{{ @$article ? 'Update Article' : 'Save Article' }}"/>
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