<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>DEMOGRAPHIC ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 50px 50px 0 50px;">
		<div class="container-content">
			<div style="width: 47%; float:left;margin-left:3%;position: relative;"><img style="height: 700px;" src="{{Storage::disk('s3')->url('assets/'.$demographic->image5)}}" alt="image"></div>
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