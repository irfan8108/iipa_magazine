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
		            <div class="row search_row">
		                
		                <select class="searchbar searchtype" name="type" style="border:none">
		                    <option value="magazine_title">Name of Magazine</option>
		                    <option value="magazine_date">Date of Publication</option>
		                    <option value="magazine_date">Month of Publication</option>
		                    <option value="magazine_date">Year of Publication</option>
		                    <option value="magazine_title">Subject</option>
		                    <option value="magazine_title">Title</option>
		                    <option value="magazine_editor">Author Name</option>
		                </select>
		                
		                <input class="searchbar searchtext" type="text" name="search" placeholder="Type to search..." class="searchbar">
		                
		                <div class="searcMagazineModalBtn">
		                    <button type="button" class="close_modal">
		                        <img src="{{ asset('images/close_icon.png') }}">
		                    </button>
		                    <button type="submit" class="search_btn"><img src="{{ asset('images/search_icon.png') }}"></button>
		                </div>

		            </div>
		          </form>
		            
		        </div>
		        
		      </div>
				<p class="filter_link">Filter By:
					<a href="">All Results</a> <span>|</span>
					<a href="">Magazine</a> <span>|</span> 
					<a href="">Article</a> <span>|</span>
					<a href="">Popular</a>
				</p>
		      
		    </div>
		</div>
	  </div>
	</div>
</section>

<section id="search_section">
	{{-- {{ dd($magazines) }} --}}
	<div class="container">
	@php $no = count($magazines) + count($articles)@endphp		
	<p>Showing Results: {{ $no }}</p>	
		@if(count($magazines) >0  )

		@foreach($magazines as $magazine)
		  <div class="row">
			<div class="col-sm-12 ">

	           <h3><a href="{{ route('article', $magazine->id) }}">{{ucfirst($magazine->title)}}</a></h3>

	           <p>{{ ucfirst($magazine->short_description) }}</p>

	           @php $date = date('d-M-Y', strtotime($magazine['created_at']))@endphp

	           <p class="text-muted search_date">Magazine | {{ $magazine->editor!==null ?  $magazine->editor.'|' : ''}}  {{ $date }}</p>

	           <hr/>

	        </div>
	      </div>
	    @endforeach
	    @endif

	    @if(count($articles) >0)
	    @foreach($articles as $article)
		  <div class="row">
			<div class="col-sm-12 ">

	           <h3><a href="{{ route('article', $article->blog_id) }}">{{ucfirst($article->title)}}</a></h3>

	           {{-- <p>{!! htmlspecialchars_decode(ucfirst($article->description)) !!}</p> --}}

	           @php $date = date('d-M-Y', strtotime($article['created_at']))@endphp

	           <p class="text-muted search_date">Article | {{ $article->editor!==null ?  $article->editor.'|' : ''}}  {{ $date }}</p>

	           <hr/>

	        </div>
	      </div>
	    @endforeach 
	    @endif

	    @if(count($magazines)<=0 && count($articles)<=0 )
	    <div class="search-not-found">
	    	<h3>We found 0 results for <b>{{ @$search }}</b> Please try a new search.</h3>
	    </div>
	    @endif

	</div>
</section>

@endsection

@push('styles')
<style type="text/css">
	.search_row{
		box-shadow: 0 0 2px  #000;
	}
	.search_row:hover{
		box-shadow: 0 0 2px 1px  #2251ff;
	}
	#search_section{
		padding-top: 5rem;
    	padding-bottom: 6rem;
	}
	#search_section h3 a{
		color: #000;
    	font-family: 'McKinsey Sans';
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
	.nav_modal{
		display: none;
	}
	.search_btn_nav{
		display: none;
	}
	.filter_link{
		padding-top: 2rem;
		font-family: 'McKinsey Sans';
	}
	.filter_link span{
		font-size: 20px;
        font-family: fantasy;
	}
	.filter_link a{
		color: #000;
		font-family: none;
	}
	.filter_link a:hover{
		color: #2251ff;
	}
	.searcMagazineModalBtn .search_btn img{
		width: 80%!important;
	}
	.search-not-found{
		padding-bottom: 20em;
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
