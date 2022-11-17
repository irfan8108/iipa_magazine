@extends('layouts.front')

@section('content') 

<section id="welcome_banner" class="mt-4">
	<div class="container">
	  <div class="row">
	  	<h1 class="main-heading">New at IIPA Magazines</h1>
	  	<p class="abouttext">A collection of stories about our people, our capabilities, our research, and <br>the ever-changing face of our firm.</p>
	  </div>
	</div>
</section>

<section id="list_blogs">

	<div class="container">
		
		<div class="row">
			<h5 class="brows-post">BROWSE ALL MAGAZINES</h5>
			<!-- <hr> -->
		</div>
		
		<div class="row diff_row">
			@foreach($blogs as $blog)
		    <div class="item box_readmore">
		    	<a href="{{ route('article', $blog->id) }}"><img src="{{ asset("uploads/blog/$blog->image") }}" width=""></a>
	      		<div class="well">
		       		<h4>
			       		<a href="{{ route('article', $blog->id) }}" class="headline">{{ strtolower($blog->title) }}</a>
					</h4>

					<p class="text">
			        	{!! htmlspecialchars_decode(ucfirst($blog->short_description)) !!}
			        </p>

			        <a class="mag_readmore" href="{{ route('article', $blog->id) }}">Read more..</a>

			        <!-- @if($blog->short_description)
			        	<button><i class="arrow"></i></button>
		        	@endif -->

		        	@php
				        $timestamp = strtotime($blog->created_at);
						$newDate = date('d-M-Y', $timestamp);
					@endphp 

					{{-- {{ dd($writer) }} --}}
			        
			        <div class="mag_info">
			        	<p><small>{{ $newDate }}</small></p>
			        	<p class="author"><small>{{ $blog->editor }}.</small></p>
			        </div>

		      	</div>		
		    </div>
		    @endforeach

		</div>


	</div>

</section>

@endsection


@push('styles')
	<style type="text/css">
		/* Box */
		
		.box_readmore.open {
		  max-height: 100rem;
		  transition: max-height 0.3s cubic-bezier(0.9, 0, 0.8, 0.2);
		}

		/* Text */
		@keyframes open {
		  from {
		    line-clamp: 3;
		    -webkit-line-clamp: 3;
		  }
		  to {
		    line-clamp: initial;
		    -webkit-line-clamp: initial;
		  }
		}

		@keyframes close {
		  from {
		    line-clamp: initial;
		    -webkit-line-clamp: initial;
		  }
		  to {
		    line-clamp: 3;
		    -webkit-line-clamp: 3;
		  }
		}

		.text {
		  display: -webkit-box;
		  -webkit-box-orient: vertical;
		  text-overflow: ellipsis;
		  overflow: hidden;
		  margin: 12px 0;
		  animation: close 0.1s linear 0.1s forwards;
		}
		.open .text {
		  animation: open 0.1s linear 0s forwards;
		}

		/* Irrelavant css... */
		.arrow {
		  border: solid #000;
		  border-width: 0 2px 2px 0;
		  display: inline-block;
		  padding: 4px;
		  transform: rotate(45deg);
		  -webkit-transform: rotate(45deg);
		}

		.open .arrow {
		  transform: rotate(-135deg);
		  -webkit-transform: rotate(-135deg);
		  margin-top: 5px;
		}

		button {
		  background: transparent;
		  border: 2px solid #000;
		  height: 32px;
		  width: 32px;
		  border-radius: 50%;
		  outline: none;
		  cursor: pointer;
		  font-size: 16px;
		  display: flex;
		  align-items: center;
		  justify-content: center;
		  margin: 0 auto;
		}
		.mag_info p:last-child {
		    float: right;
		    margin-top: -30px;
		}
		.mag_info {
		    position: relative;
		    margin-bottom: -15px;
		}
		a.mag_readmore {
		    position: relative;
		    margin-top: -10px;
		    display: block;
		    margin-bottom: 15px;
		}
	</style>
@endpush

@push('scripts')
	<script type="text/javascript">
		// const box = document.querySelector('.box_readmore');
		// let isOpen = false;
		// document.querySelector('button').addEventListener('click', () => {
		//   isOpen = !isOpen;
		//   isOpen ? box.classList.add('open') : box.classList.remove('open')   
		// });

		$('.box_readmore').on('click', function(){
			if($(this).hasClass('open'))
				$(this).removeClass('open')
			else
				$(this).addClass('open')
		})

	</script>
@endpush