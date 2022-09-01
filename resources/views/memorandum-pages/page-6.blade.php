<div class="page w-100 padding-zero">
	<div class="div-header">
				<div class="page-header page-2-header">
				<h1>PRICING & FINANCIAL ANALYSIS</h1>
			</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="row">
			<h3 class="h3">Financing</h3>
						<div class="half-width" style="padding: 0 50px;">
							<div class="box-table p-r-50">
								<h4>Existing Financing</h4>
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td>Loan Amount</td>
										<td>@if(isset($pf->loan_amount))@if(ctype_digit(str_replace(',','',$pf->loan_amount))){{'$'}}@endif{!! $pf->loan_amount !!}@endif</td>
									</tr>
									<tr>
										<td>Loan Type</td>
										<td>{!! $pf->loan_type !!}</td>
									</tr>
									<tr>
										<td>Interest Rate</td>
										<td>{!! $pf->interest_rate !!}%</td>
									</tr>
									<tr>
										<td>Amortization</td>
										<td>{!! $pf->amortization !!}</td>
									</tr>
									<tr>
										<td>Due Date</td>
										<td>{!! isset($pf->due_date) ? $pf->due_date : 'TBD' !!}</td>
									</tr>
									<tr>
										<td>Lender Name</td>
										<td>{!! isset($pf->lender_name) ? $pf->lender_name : 'TBD' !!}</td>
									</tr>
								</table>
								<h4>Proposed Financing</h4>
								<table cellpadding="0" cellspacing="0">
									<tr>
										<td class="td-bold">FIRST TRUST DEED</td>
										<td></td>
									</tr>
									<tr>
										<td>Loan Amount</td>
										<td>{!! isset($pf->trust_loan_amount) ? '$'.$pf->trust_loan_amount : 'TBD' !!}</td>
									</tr>
									<tr>
										<td>Loan Type</td>
										<td>{!! $pf->trust_loan_type !!}</td>
									</tr>
									<tr>
										<td>Interest Rate</td>
										<td>{!! $pf->trust_interest_rate !!}%</td>
									</tr>
									<tr>
										<td>Amortization</td>
										<td>{!! $pf->trust_amortization !!}</td>
									</tr>
									<tr>
										<td>Program</td>
										<td>{!! $pf->trust_program !!}</td>
									</tr>
									<tr>
										<td>Loan to Value</td>
										<td>{!! isset($pf->trust_loan_value) ? $pf->trust_loan_value : 'TBD' !!}%</td>
									</tr>
									<tr>
										<td>Debt Coverage Ratio</td>
										<td>{!! isset($pf->debt_coverage_ratio_proforma) ? $pf->debt_coverage_ratio_proforma : 'TBD' !!}</td>
									</tr>
								</table>
							</div>
						</div>
						<div class="half-width" style="width: 45%;">
							<div class="box-img-right height-full">
								<img style="width: 100%; height: 700px;" src="{{Storage::disk('s3')->url('assets/'.$pf->cover_page_3)}}" alt="" />
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