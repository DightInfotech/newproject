<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<h3 class="h3">Financial Overview</h3>
			<div class="row">
				<div style="width: 50%;float: left;">
					<h4>Proposed Financing</h4>
					<div class="fair-table">
						<table>
							<tr><td>Price</td>   <td>${!! $pf->price !!}</td></tr>
							<tr><td>Down Payment</td>   <td>${!! $pf->down_payment !!}</td></tr>
							<tr><td>Number of Units</td>   <td>{!! $pf->number_of_units !!}</td></tr>
							<tr><td>Price/Unit</td>   <td>{!! isset($pf->price_per_unit) ? '$'.number_format(cleanString($pf->price_per_unit)) : '' !!}</td></tr>
							<tr><td>Rentable Square Feet</td>   <td>{!! $pf->rentable_square_feet !!}</td></tr>
							<tr><td>Price/SF</td>   <td>{!! isset($pf->price_per_sf) ? '$'.$pf->price_per_sf : '' !!}  </td></tr>
							<tr><td>CAP Rate - Current</td>   <td>{!! $pf->cap_rate_current !!}%</td></tr>
							<tr><td>CAP Rate- Pro Forma</td>   <td>{!! $pf->cap_rate_proforma !!}%</td></tr>
							<tr><td>GRM - Current</td>   <td>{!! $pf->grm_current !!}</td></tr>
							<tr><td>GRM- Proforma</td>   <td>{!! $pf->grm_proforma !!}</td></tr>
							{{--<tr><td>Year Built</td>   <td>{!! $pf->year_built !!} / {!! $pf->year_rennovated !!}</td></tr>--}}
							<tr><td>Year Built</td>   <td>{!! $pf->year_built !!}</td></tr>
							<tr><td>Lot Size</td>   <td>{!! $pf->lot_size !!}</td></tr>
							<tr><td>Type of Ownership</td>   <td>{!! $pd->type_of_ownership !!}</td></tr>
						</table>
					</div>
				</div>
				<div style="width: 45%; float: right;">
					<div class="address-highlight">
						<div class="location">
							Location
						</div>
						<div class="location-address-box">
							{!! $memorandum->address.'<br>'.$memorandum->city.', '.$memorandum->state.' ',$memorandum->zip !!}
							<div class="blue-border"></div>
						</div>
					</div>
					<div class="fair-table">
						<h4>Financing</h4>
						<table class="projection-table">
							<tr class="table-head">
								<td>FIRST TRUST DEED</td>
								<td></td>
							</tr>
							<tr>
								<td>Loan Amount</td>
								<td>${!! $pf->trust_loan_amount !!}</td>
							</tr>
							<tr>
								<td>Loan Type</td>
								<td>{!!  $pf->trust_loan_type !!}</td>
							</tr>
							<tr>
								<td>Interest Rate</td>
								<td>${!! $pf->trust_interest_rate !!}%</td>
							</tr>
							<tr><td>Amortization</td>     	<td>{!! $pf->trust_amortization !!}</td></tr>
							<tr><td>Program</td>     		<td>Loan Paydown</td></tr>
							<tr><td>Loan to Value</td>     	<td>{!! $pf->trust_loan_value !!}%</td></tr>
							<tr><td colspan="2">Loan information is time sensitive and subject to change. </td> </tr>
						</table>
					</div>
				</div>
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