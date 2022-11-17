@extends('layouts.front')

@section('content') 

<section id="welcome_banner" class="mt-4">
	<div class="container">
	  <div class="row">
	  	<!-- Modal -->
		<div class=" " id="searcMagazineModal" role="dialog">
		    <div class="modal-dialog">

		      <!-- Modal content-->
		      <div class="modal-content">

		        <div class="modal-body">

		          <form action="{{ route('search_data') }}" method="post">
            		@csrf
		            <div class="row">
		                
		                <select class="searchbar searchtype" name="type" style="border:none">
		                    <option value="magazine_title">Name of Magazine</option>
		                    <option value="magazine_date">Date of Publication</option>
		                    <option value="magazine_date">Month of Publication</option>
		                    <option value="magazine_date">Year of Publication</option>
		                    <option value="magazine_title">Subject</option>
		                    <option value="magazine_title">Title</option>
		                    <option value="magazine_editor">Author Name</option>
		                </select>
		                
		                <input class="searchbar searchtext" type="text" placeholder="Type to search..." class="searchbar">
		                
		                <div class="searcMagazineModalBtn">
		                    <button type="submit" class="close_modal">
		                        <img src="{{ asset('images/close_icon.png') }}">
		                    </button>
		                    <button type="submit"><img src="{{ asset('images/search_icon.png') }}"></button>
		                </div>

		            </div>
		          </form>
		            
		        </div>
		        
		        <!-- <div class="modal-footer">
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div> -->

		      </div>
		      
		    </div>
		</div>
	  </div>
	</div>
</section>
<section id="search_section">

	<div class="container">	
		@if($magazines!==null)

		@foreach($magazines as $magazine)
		  <div class="row">
			<div class="col-sm-12 ">

	           <h3><a href="{{ route('article', $magazine->id) }}">{{$magazine->title}}</a></h3>

	           <p>{{ $magazine->short_description }}</p>

	           @php $date = date('d-M-Y', strtotime($magazine['created_at']))@endphp

	           <p class="text-muted search_date">Magazine | {{ $magazine->editor!==null ?  $magazine->editor.'|' : ''}}  {{ $date }}</p>

	           <hr/>

	        </div>
	      </div>
	    @endforeach 
	    @endif
	</div>
</section>

@endsection

@push('styles')
<style type="text/css">
	#search_section{
		padding-top: 3rem;
    	padding-bottom: 5rem;
	}
	#search_section h3 a{
		color: #000;
		}
	#search_section h3 a:hover{
		color: #2251ff;
		}	
	#search_section hr{
		border-top: 1px solid #8e8989;
	}	
	#search_section .search_date{
		padding-top: 1rem;;
	}
	.modal-content{
		border-radius: unset;
		box-shadow: unset;
	}
	.modal-body .searchtext{
		border: none;
	}

</style>
@endpush
@push('scripts')
    <script type="text/javascript">
        $('.close_modal').on('click', function(){
            $('.searchbar.searchtext').val("");
            $('#searcMagazineModal').modal('hide');
        })
    </script>
@endpush
