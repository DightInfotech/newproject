<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-content">
			<h3 class="h3">Location Amenities</h3>
			<div class="row">
				<div style="width: 30%;float: left;" class="list-circle">
					{!! $pd->loc_amenities !!}
					<h3 class="h3">Unit Amenities</h3>
					{!! $pd->unit_amenities !!}
				</div>
				<div style="width: 60%;float: right;">
					<div class="row">
						<div class="image m-b-50" style="float: left;width: 41%;"><img style="width: 282px; height: 245px;" src="{{Storage::disk('s3')->url('assets/'.$pd->amenity_image1)}}" alt="img"/></div>
						<div class="image m-b-50" style="float: left;width: 41%; margin-left: 50px;"><img style="width: 282px; height: 245px;" src="{{Storage::disk('s3')->url('assets/'.$pd->amenity_image2)}}" alt="img"/></div>
						<div class="image m-t-50" style="float: left;width: 100%;"><img style="height: 245px;" src="{{Storage::disk('s3')->url('assets/'.$pd->amenity_image3)}}" alt="img"/></div>
					</div>
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