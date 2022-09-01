<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>RENT COMPARABLES</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-content">
			<div class="row">
				<div style="width: 100%;float: left;"><h3>Rent Comparables</h3></div>

				@if(!empty($rent_comparables))
					@if($k == 1)
						<div style="width: 30%; float: left; margin-right: 3%;">
							<div class="sales-item-box">
								<div class="sales-item-image">
									<img style="width:99.8%;height: 210px;" src="{{Storage::disk('s3')->url('assets/'.$memorandum->subject_property_thumbnail)}}" alt="image"/>
								</div>
								<div class="box-header">
									<h3>{!! $memorandum->property_title !!}</h3>
									<p>{!! $memorandum->address.'<br>'.$memorandum->city.', '.$memorandum->state.' '.$memorandum->zip !!}</p>
								</div>

								<div class="house-info">
									<table>
										<tr><td>No. of Units:</td><td>{!! $pf->number_of_units !!}</td></tr>
										<tr><td>Occupancy:</td><td>{!! $yp->economic_occupancy	 !!}%</td></tr>
										<tr><td>Year Built:</td><td>{!! $pf->year_built !!} @if($pf->year_rennovated) / {!! $pf->year_rennovated !!} (Renovated) @endif</td></tr>
									</table>
								</div>
								<div class="unit-type-and-number">
									<table cellpadding="0" cellspacing="0">
										<tr class="t-head">
											<td>Unit Type:</td>
											<td>No. of Units</td>
											<td>SquareFeet</td>
											<td>Rent</td>
											<td>Rent/SF</td>
										</tr>
										@if(!empty($mix_units))
											@foreach($mix_units as $mix)
												<tr>
													<td>{{$mix->unit_type}}</td>
													<td>{{$mix->number_of_units}}</td>
													<td>{{$mix->sq_feet}}</td>
													<td>${{$mix->current_rent_min}}@if($mix->current_rent_max){{'-$'.$mix->current_rent_max}}@endif</td>
													<td>{{$mix->rent_per_sf}}</td>
												</tr>
											@endforeach
										@endif
									</table>
								</div>
								<div class="info-bottom">
									Subject Property
								</div>
							</div>
						</div>
					@endif
					@foreach($rent_comparables as $sale)
						<div style="width: 30%; margin-right: 3%;  @if($loop->iteration%3 == 0) float: right; @else float: left;  @endif" >
							<div class="sales-item-box">
								<div class="sales-item-image">
									<img style="width:99.8%;height: 210px;" src="{!! Storage::disk('s3')->url('assets/'.$sale->image) !!}" alt="image"/>
								</div>
								<div class="box-header">
									<h3>{!! $sale->name !!}</h3>
									<p>{!! $sale->address !!}</p>
								</div>
								<div class="house-info">
									<table style="width: 100%;">
										<tr><td>No. of Units:</td><td>{!! $sale->total_units !!}</td></tr>
										<tr><td>Occupancy:</td><td>{!! $sale->occupancy !!}%</td></tr>
										<tr><td>Year Built:</td><td>{!! $sale->year_built !!}</td></tr>
									</table>
								</div>
								<div class="unit-type-and-number">

									@php $units = json_decode($sale->units); @endphp
									<table style="width: 100%;" cellpadding="0" cellspacing="0">
										<tr class="t-head">
											<td>Unit Type:</td>
											<td>No. of Units</td>
											<td>SquareFeet</td>
											<td>Rent</td>
											<td>Rent/SF</td>
										</tr>
										@for($i=0;$i<count($units);$i++)
										<tr>
											<td>{{key($units[$i])}}</td>
											@php  $valArr = $units[$i]->{key($units[$i])}; @endphp
											<td> {!! $valArr[0] !!}</td>
											<td> {!! $valArr[1] !!}</td>
											<td> ${!! number_format(cleanString($valArr[2])) !!}</td>
											<td> ${!! number_format($valArr[3],'2','.',',') !!}</td>
										</tr>
										@endfor
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
