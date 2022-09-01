<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>RENT COMPARABLES</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-fluid">
			<div class="row">
				<div  style="width: 100%; float: left;"><h3>{{$graph_page_title}}</h3></div>
				@if($rent_comp_graphs->isNotEmpty())
					@foreach($rent_comp_graphs as $graph)
						<div style="margin-top: 50px; @if($loop->iteration == 2) width:47%; float: right; @else width: 50%; float: left; @endif">
							<div class="d-flex flex-height  flex-column">
								<div style="text-align: center" class="text-center"></div>
								<div class="chart-box mt-auto">
									<img src="{{base_path('storage/app/public/graph-images/'.$graph->graph_image)}}" alt="img"/>
								</div>
							</div>
						</div>
					@endforeach
				@endif
				</div>
				{{--<div style="width: 47%; float: right; margin-top: 50px;">
					<div class="d-flex flex-height  flex-column">
						<div style="text-align: center" class="text-center"><h5></h5></div>
						<div class="chart-box mt-auto">
							<img src="{{Storage::disk('s3')->url('assets/'.$rcf->occupancy_graph2_image)}}" alt="img"/>
						</div>
					</div>
				</div>--}}
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