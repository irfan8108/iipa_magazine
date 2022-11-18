@extends('layouts.front')

@section('content') 

<section id="welcome_banner" class="mt-4">
	<div class="container">
	  <div class="row">
	  	<h1 class="main-heading">About Us</h1>
	  	<p class="abouttext">A collection of stories about our people, our capabilities, our research, and <br>the ever-changing face of our firm.</p>
	  </div>
	</div>
</section>

<section id="list_blogs">

	<div class="container">
		
		<div class="row">
			<p>Climate change is a global phenomenon with several ramifications, including sea level rise, increase in extreme weather events such as floods, droughts and storms, air pollution and the spread of tropical diseases. Right now almost half of the world’s population lives in urban areas. They consumes three fourth of the energy production and account for almost equal share of global CO2 gas emissions. In case of India, urban areas contribute to nearly 44% of India’s carbon emissions, driven by transport, industry, building and waste1. Since, most of the cities are densely populated and located either in coastal or floodplain areas, rise in sea level or frequent floods have huge impacts on cities’ basic services, infrastructure, housing, human livelihoods and health. At the same time, most of the cities are dependent on distantly located water resources, even a small drought creates water crises for cities. The other consequences of climate change are urban heat island effect and air pollution which has increased the risk of health hazards in cities. </p>

		</div>
		
	</div>

</section>

@endsection


@push('styles')
<style>
	#list_blogs{
		padding-bottom: 2em;
	}
	a.issue_pdf {
    border: 1px solid #004aad;
    padding: 5px 15px;
    border-radius: 3px;
    color: #004aad;
}
</style>

@endpush

@push('scripts')
@endpush