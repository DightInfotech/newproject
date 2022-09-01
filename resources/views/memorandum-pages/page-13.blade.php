<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<h3>Location Highlights</h3>
			<div class="row text-content">
				<div style="width: 30%;float: left;" class="list-circle">
					{!! $pd->column1 !!}
				</div>
				<div style="width: 30%;float: left; margin-left: 5%;">
					{!! $pd->column2 !!}
				</div>
				<div style="width: 30%;float: right;">
					{!! $pd->column3 !!}
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