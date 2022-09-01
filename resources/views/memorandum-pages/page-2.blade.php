<div id="page" class="page clearfix">
		<div class="page-header page-2-header">
			<h1>Confidentiality and disclaimer</h1>
		</div>
		<div class="page-main">
			<div class="main-left">
				{!! $memorandum->text !!}
			</div>
			<div class="main-right">
				<div class="card-box">
					<div class="visit-card"><img src="{{Storage::disk('s3')->url('assets/'.$memorandum->business_card_1)}}" alt="img"/></div>
				</div>
				<div class="card-box">
					<div class="visit-card"><img src="{{Storage::disk('s3')->url('assets/'.$memorandum->business_card_2)}}" alt="img"/></div>
				</div><br style="clear:both;"/>
			</div>
		</div>
</div>
<div class="page-footer">
	<div class="footer-content">
		<div class="footer-logo"><img src="{{base_path('public/pdf-assets/images/footer-logo.jpg')}}" alt="img"/></div>
		<div class="footer-info">{!! $memorandum->footer !!}</div>
		<div class="footer-page-count">
			<span>{{$page_number}}</span>
		</div><br style="clear: both;"/>
	</div>
</div>