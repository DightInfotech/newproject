<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
						<h3>Unit Mix</h3>
						<div class="table-unit-mix">
							<table cellpadding="0" cellspacing="0">
								<tr class="t-head">
									<td>No.of <br/>Units</td>
									<td>Unit Type</td>
									<td>Approx.<br/> Square Feet</td>
									<td>Current<br/> Rents</td>
									<td>Rent/SF</td>
									<td>Monthly<br/> Income</td>
									<td>ProForma<br/> Rents</td>
									<td>Rent/SF</td>
									<td>Monthly<br/> Income</td>
								</tr>
								@if(!empty($mix_units))
									@php $total_units=0;$total_units_per_sf=0;$total_monthly_income=0;$total_monthly_income_proforma=0; @endphp
									@foreach($mix_units as $mix)
								<tr>
									<td>{{$mix->number_of_units}}</td>
									<td>{{$mix->unit_type}}</td>
									<td>{{$mix->sq_feet}}</td>
									@if(number_format(cleanString($mix->current_rent_min)) == number_format(cleanString($mix->current_rent_max)))
										<td>${{number_format(cleanString($mix->current_rent_min))}}</td>
									@else
										<td>${{number_format(cleanString($mix->current_rent_min)).'-$'.number_format(cleanString($mix->current_rent_max))}}</td>
									@endif
									<td>${{$mix->rent_per_sf}}</td>
									<td>${{number_format(cleanString($mix->monthly_income))}}</td>
									@if(number_format(cleanString($mix->proforma_rent_min)) == number_format(cleanString($mix->proforma_rent_max)))
										<td>${{number_format(cleanString($mix->proforma_rent_min))}}</td>
									@else
										<td>${{number_format(cleanString($mix->proforma_rent_min)).'-$'.number_format(cleanString($mix->proforma_rent_max))}}</td>
									@endif
									<td>${{$mix->rent_per_sf2}}</td>
									<td>${{number_format(cleanString($mix->monthly_income2))}}</td>
									@php
										$total_monthly_income+= cleanString($mix->monthly_income);
										$total_monthly_income_proforma+=cleanString($mix->monthly_income2);
									@endphp
								</tr>
									@endforeach
								@endif
								<tr class="t-foot">
									<td>{{$pf->number_of_units}}</td>
									<td>TOTAL</td>
									<td>{{$pf->rentable_square_feet}}</td>
									<td></td>
									<td></td>
									<td>${{number_format($total_monthly_income)}}</td>
									<td></td>
									<td></td>
									<td>${{number_format($total_monthly_income_proforma)}}</td>
								</tr>
							</table>
						</div>	
						<div class="grap">
							<div style="width: 50%; float: left;">
								<img src="{{base_path('storage/app/public/graph-images/'.$pf->unit_type_graph)}}" alt="units" />
							</div>
							<div style="width: 50%; float: left;">
								<img src="{{base_path('storage/app/public/graph-images/'.$pf->unit_rent_sf)}}" alt="units" />
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