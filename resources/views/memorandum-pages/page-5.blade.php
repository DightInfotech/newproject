<div class="page w-100 padding-zero">
	<div class="div-header">
			<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
				<div class="row">
					<div style="width: 50%; float: left;">
						<div class="box-img-left height-full">
							<img style="width: 100%; height: 750px; " src="{{Storage::disk('s3')->url('assets/'.$pf->cover_page_2)}}" alt="Image" />
						</div>
					</div>
					<div style="width: 45%; float: left;">
						<div class="box-table">
							<h3>Offering Summary</h3>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>Price</td>
									<td></td>
									<td>{!! isset($pf->price) ? '$'.number_format(cleanString($pf->price)) : '' !!}</td>
								</tr>
								<tr>
									<td>Down Payment</td>
									<td><b>{!! $pf->down_payment_perc !!}%</b></td>
									<td>{!! isset($pf->down_payment) ? '$'.$pf->down_payment : '' !!}</td>
								</tr>
								<tr>
									<td>Price/Unit</td>
									<td></td>
									<td>{!! isset($pf->price_per_unit) ? '$'.number_format(cleanString($pf->price_per_unit)) : '' !!}</td>
								</tr>
								<tr>
									<td>Price/SF</td>
									<td></td>
									<td>${!! $pf->price_per_sf !!}</td>
								</tr>
								<tr>
									<td>Number of Units</td>
									<td></td>
									<td>{!! $pf->number_of_units !!}</td>
								</tr>
								<tr>
									<td>Rentable Square Feet</td>
									<td></td>
									<td>{!! $pf->rentable_square_feet !!}</td>
								</tr>
								<tr>
									<td>Number of Buildings</td>
									<td></td>
									<td>{!! $pf->number_of_buildings !!}</td>
								</tr>
								<tr>
									<td>Number of Stories</td>
									<td></td>
									<td>{!! $pf->number_of_stories !!}</td>
								</tr>
								<tr>
									<td>Year Built</td>
									<td></td>
									<td>{!! $pf->year_built !!}</td>
								</tr>
								<tr>
									<td>Lot Size</td>
									<td></td>
									<td>{!! $pf->lot_size !!}</td>
								</tr>
							</table>
							<h3>Vital Data</h3>
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>CAP Rate - Current</td>
									<td>{!! $pf->cap_rate_current !!}%</td>
								</tr>
								<tr>
									<td>GRM - Current</td>
									<td>{!! $pf->grm_current !!}</td>
								</tr>
								<tr>
									<td>Net Operating Income - Current</td>
									<td>${!! $pf->net_operating_income !!}</td>
								</tr>
								<tr>
									<td>Net Cash Flow After Debt Service - Current</td>
									<td>${!! $pf->net_cash_flow_after_debt !!}</td>
								</tr>
								<tr>
									<td>Total Return - Current</td>
									<td>${!! $pf->total_return !!}</td>
								</tr>
								<tr>
									<td>CAP Rate - Pro Forma</td>
									<td>{!! $pf->cap_rate_proforma !!}%</td>
								</tr>
								<tr>
									<td>GRM - Pro Forma</td>
									<td>{!! $pf->grm_proforma !!}</td>
								</tr>
								<tr>
									<td>Net Operating Income - Pro Forma</td>
									<td>${!! $pf->net_operating_income_proforma !!}</td>
								</tr>
								<tr>
									<td>Net Cash Flow After Debt Service - Pro Forma</td>
									<td>${!! $pf->net_cash_flow_after_debt_proforma !!}</td>
								</tr>
								<tr>
									<td>Total Return - Pro Forma</td>
									<td>${!! $pf->total_return_proforma !!}</td>
								</tr>
							</table>
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