<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>RENT COMPARABLES</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<div class="row">
				<div  style="width: 100%; float: left;"><h3>Occupancy & Average Rents</h3></div>
				<div style="width: 50%; float: left; margin-top: 50px;">
					<div class="d-flex flex-height  flex-column">
						<div style="text-align: center" class="text-center"><h5>1 Bedroom 1 Bath</h5></div>
						<div class="chart-box mt-auto">
							<img src="{{base_path('storage/app/public/graph-images/'.$rcf->avg_rent_1bd)}}" alt="img"/>
						</div>
					</div>
				</div>
				<div style="width: 47%; float: right; margin-top: 50px;">
					<div class="d-flex flex-height  flex-column">
						<div style="text-align: center" class="text-center"><h5>2 Bedroom 2 Bath</h5></div>
						<div class="chart-box mt-auto">
							<img src="{{base_path('storage/app/public/graph-images/'.$rcf->avg_rent_2bd)}}" alt="img"/>
						</div>
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