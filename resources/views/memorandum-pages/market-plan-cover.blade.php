<div class="page w-100 padding-zero">
	<div class="div-header header-height dot-bg" style="background-image: url({{base_path('public/pdf-assets/images/v-dot.jpg')}});">
		<div class="logo-absolute text-center">
			<h1><a href="#"><img src="{{base_path('public/pdf-assets/images/logo.png')}}" alt="logo"/></a></h1>
		</div>
	</div>
	<div class="main page-24-bg page-4" style="@if(!is_null($mp)) background: url('{{Storage::disk('s3')->url('assets/'.$mp->section_cover)}}')no-repeat center center; @endif
			background-size: cover; height: 805px;">
		<div class="cover-overlay"></div>
		<div class="center-wrap">
			<div class="center-wrap-inner">
				<div class="box-bottom mt-auto text-center">
					<h3>{!! $memorandum->property_title !!}</h3>
					<p>{!! $memorandum->address.'<br>'.$memorandum->city.', '.$memorandum->state.' ',$memorandum->zip !!}</p>
				</div>
			</div>
		</div>
		<h2 class="title-absolute">Marketing Plan</h2>
	</div>
</div>
<div class="footer blank-footer-height dot-bg" style="background-image: url({{base_path('public/pdf-assets/images/v-dot.jpg')}}); min-height: 88px;"></div>