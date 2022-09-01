<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-content">
			<h3>Plat Maps</h3>
			<div class="row" style="margin-left:170px; margin-right: 170px; ">
				<div style="width: 100%; float: left; margin-bottom: 60px;"><img style="width:100%;height: 300px;" src="{{Storage::disk('s3')->url('assets/'.$pd->plat_map1)}}" alt="img"/></div>
				<div style="width: 100%; float: left;"><img style="width:100%;height: 300px;" src="{{Storage::disk('s3')->url('assets/'.$pd->plat_map2)}}" alt="img"/></div>
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
