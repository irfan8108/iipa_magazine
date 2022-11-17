@include('front.header')

{{-- @include('.sidebar') --}}

@include('front.navbar')

	@yield('content')
	
@include('front.footer')