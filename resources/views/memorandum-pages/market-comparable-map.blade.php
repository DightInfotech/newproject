<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>MARKET COMPARABLES</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<div class="row">
				<h3>Market Comparable Map</h3>
				<div style="width: 70%; float: left;">
					<div class="map-box"><img style="height: 700px;" src="{{Storage::disk('s3')->url('assets/'.$mcf->map_image)}}" alt="map"/></div>
				</div>
				<div style="width: 25%; float: right;">
					<h3>Subject</h3>
					{!! $mcf->map_subjects !!}
				</div>
			</div>
		</div>
	 </div>
</div>
	<div class="footer">
		<div class="page-footer">
			<div class="footer-content">
				<div class="footer-logo"><img src="{{base_path('public/pdf-assets/images/footer-logo.jpg')}}" alt="img"/></div>
				<div class="footer-info">{!! $memorandum->footer !!}</div>
				<div class="footer-page-count">
					<span>{{$page_number}}</span>
				</div><br style="clear: both;"/>
			</div>
		</div>
	</div>
