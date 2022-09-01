<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<h3>Investment Highlights</h3>
			<div class="row text-content">
				<div style="width: 30%;float: left;" class="list-circle">
					{!! $pd->invest_highlights1 !!}
				</div>
				<div style="width: 66%;float: right;">
					<img style="width: 100%; height: 340px;" src="{{Storage::disk('s3')->url('assets/'.$pd->highlights_image1)}}" alt="img" width="618" height="245" />
					<img style="width: 100%; height: 340px; margin-top: 20px;"  src="{{Storage::disk('s3')->url('assets/'.$pd->highlights_image2)}}" alt="img" width="618" height="245" />
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