<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>MARKETING PLAN</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<h3>Market Timeline</h3>
			<div class="row text-content">
				<div style="width: 47%;float: left;">
					<div class="left-column">
						{!! $timeline_page->column1 !!}
					</div>
				</div>
				<div style="width: 47%;float: left; margin-left: 5%;">
					<div class="right-column">
						{!! $timeline_page->column2 !!}
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