<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>MARKET COMPARABLES</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-content">
			<div class="row">
				<div style="width: 100%;float: left;"><h3>Market Comparables</h3></div>

				@if(!empty($market_comparables))
					@if($l == 1)
						<div style="width: 30%; float: left; margin-right: 3%;">
							<div class="sales-item-box">
								<div class="sales-item-image">
									<img style="width:99.8%;height: 210px;" src="{{Storage::disk('s3')->url('assets/'.$memorandum->subject_property_thumbnail)}}" alt="image"/>
								</div>
								<div class="box-header">
									<h3>{!! $memorandum->property_title !!}</h3>
									<p>{!! $memorandum->address.'<br>'.$memorandum->city.', '.$memorandum->state.' '.$memorandum->zip !!}</p>
								</div>
								<div class="unit-type-and-number">
									<table style="width: 100%;" cellpadding="0" cellspacing="0">
										<tr class="t-head"><td>Unit Type:</td> <td>No. of Units</td></tr>
										@if(!empty($mix_units))
											@foreach($mix_units as $mix)
												<tr>
													<td>{{$mix->unit_type}}</td>
													<td>{{$mix->number_of_units}}</td>
												</tr>
											@endforeach
										@endif
									</table>
								</div>
								<div class="house-info">
									<table style="width: 100%;" >
										<tr><td>No. of Units:</td><td>{!! $pf->number_of_units !!}</td></tr>
										<tr><td>Year Built:</td><td>{!! $pf->year_built !!} @if($pf->year_rennovated) / {!! $pf->year_rennovated !!} (Renovated) @endif</td></tr>
										<tr><td>Sale Price:</td><td>${!! $pf->price !!}</td></tr>
										<tr><td>Price/Unit:</td><td>${!! number_format(cleanString($pf->price_per_unit),2,'.',',') !!}</td></tr>
										<tr><td>Price/SF:</td><td>${!! number_format(cleanString($pf->price_per_sf),2,'.',',') !!}</td></tr>
										<tr><td>CAP Rate:</td><td>{!! number_format($pf->cap_rate_current,2,'.',',') !!}%</td></tr>
										<tr><td>GRM:</td><td>{!! number_format($pf->grm_current,2,'.',',') !!}</td></tr>
									</table>
								</div>
							</div>
						</div>
					@endif
					@foreach($market_comparables as $sale)
						<div style="width: 30%; margin-right: 3%;  @if($loop->iteration%3 == 0) float: right; @else float: left;  @endif" >
							<div class="sales-item-box">
								<div class="sales-item-image">
									<div class="image-caption"><table><tbody><tr><td>On Market Date</td><td>{!! date('m-d-Y',strtotime($sale->on_market_date)) !!}</td></tr></tbody></table></div>
									<img style="width:99.8%;height: 210px;" src="{!! Storage::disk('s3')->url('assets/'.$sale->image) !!}" alt="image"/>
								</div>
								<div class="box-header">
									<h3>{!! $sale->name !!}</h3>
									<p>{!! $sale->address !!}</p>
								</div>
								<div class="unit-type-and-number">

									@php $units = json_decode($sale->units); @endphp
									<table style="width: 100%;"  cellpadding="0" cellspacing="0">
										<tr class="t-head"><td>Unit Type:</td> <td>No. of Units</td></tr>
										@for($i=0;$i<count($units);$i++)
											<tr>
												<td>{{key($units[$i])}}
												</td>
												<td>
													{!!  $units[$i]->{key($units[$i])} !!}
												</td>
											</tr>
										@endfor
									</table>
								</div>
								<div class="house-info">
									<table style="width: 100%;" >
										<tr><td>No. of Units:</td><td>{!! $sale->total_units !!}</td></tr>
										<tr><td>Year Built:</td><td>{!! $sale->year_built !!}</td></tr>
										<tr><td>Sale Price:</td><td>${!! $sale->sale_price !!}</td></tr>
										<tr><td>Price/Unit:</td><td>${!! number_format(cleanString($sale->price_per_unit)) !!}</td></tr>
										<tr><td>Price/SF:</td><td>${!! number_format(cleanString($sale->price_per_sf),2,'.',',') !!}</td></tr>
										<tr><td>CAP Rate:</td><td>{!! $sale->cap_rate !!}%</td></tr>
										<tr><td>GRM:</td><td>{!! $sale->grm !!}</td></tr>
									</table>
								</div>
								<div class="info-bottom">
									{!! $sale->notes !!}
								</div>
							</div>
						</div>
					@endforeach
				@endif
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