<div id="page-1" class="page-home">
			<div class="header">
				<h1><a href="#"><img src="{{base_path('public/pdf-assets/images/logo.png')}}" alt="logo"/></a></h1>
			</div>
			<div class="left-bar dot-bg" style="background-image: url({{base_path('public/pdf-assets/images/v-dot.jpg')}});"></div>
			<br style="clear:both"/>
			<div class="title-box">
				<div style="height: 100%; padding: 30px;">
				<h2 style="font-size: 3.4rem; font-weight: bold;">@if($memorandum->property_title){{$memorandum->property_title}}@else {{$memorandum->address}}<br>{{$memorandum->city.', '.$memorandum->state.' ',$memorandum->zip}} @endif</h2>
				</div>
			</div>
			<div class="address-box">
				<p style="font-size: 26px; line-height: 1.2;">{{$memorandum->address}}<br>{{$memorandum->city.', '.$memorandum->state.' ',$memorandum->zip}}</p>
			</div>
			<div class="right-bar">
				<div class="cover-overlay"></div>
				<img src="{{Storage::disk('s3')->url('assets/'.$memorandum->cover_page_image)}}" alt="logo" />
			</div>
			<h3>Market <br/>Analysis</h3>
</div>
