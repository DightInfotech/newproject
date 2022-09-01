<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
				<h3>Pricing - Proforma</h3>
				<div class="fair-table">
					<table>
						<tr class="table-head">
							<td class="st-td">INCOME</td>
							<td colspan="2">LIST PRICE</td>
							<td colspan="4">SALES RANGE</td>
						</tr>
						<tr>
							<td>Price</td>
							<td></td>
							<td>${{$pf->price}} </td>
							<td></td>
							<td>${{$p_p_list->price}}</td>
							<td></td>
							<td>${{$p_p_range->price}} </td>
						</tr>
						<tr>
							<td>Down Payment</td>
							<td>{{$pf->down_payment_perc}}%</td>
							<td>${{$pf->down_payment}}</td>
							<td>{{$p_p_list->down_payment_perc}}%</td>
							<td>${{$p_p_list->down_payment}} </td>
							<td>{{$p_p_range->down_payment_perc}}%</td>
							<td>${{$p_p_range->down_payment}} </td>
						</tr>
						<tr>
							<td>First Trust Deed/Mortgage </td>
							<td></td>
							<td>${{$pf->trust_loan_amount}} </td>
							<td></td>
							<td>${{$p_p_list->first_trust_mortage}} </td>
							<td></td>
							<td>${{$p_p_range->first_trust_mortage}} </td>
						</tr>
						<tr>
							<td>Interest Rate/Amortization</td>
							<td></td>
							<td>{{$pf->interest_rate}}%</td>
							<td></td>
							<td>{{$p_p_list->interest_rate}}% </td>
							<td></td>
							<td>{{$p_p_range->interest_rate}}%  </td>
						</tr>
						<tr>
							<td><strong>NET OPERATING INCOME</strong></td>
							<td></td>
							<td>${{$pf->net_operating_income_proforma}}</td>
							<td></td>
							<td>${{$p_p_list->net_operating_income}}  </td>
							<td></td>
							<td>${{$p_p_range->net_operating_income}} </td>
						</tr>
						<tr>
							<td class="st-td">CASH FLOW ANALYSIS</td>
							<td></td>
							<td></td>
							<td></td>
							<td> </td>
							<td></td>
							<td> </td>
						</tr>
						<tr>
							<td>Debt Service</td>
							<td></td>
							<td>${!! number_format(cleanString($pf->payment)*12) !!}</td>
							<td></td>
							<td>${{$p_p_list->debt_service}}  </td>
							<td></td>
							<td>${{$p_p_range->debt_service}}  </td>
						</tr>
						<tr>
							<td>Debt Coverage Ratio</td>
							<td></td>
							<td>{{$pf->debt_coverage_ratio_proforma}} </td>
							<td></td>
							<td>{{$p_p_list->debt_coverage_ratio}}  </td>
							<td></td>
							<td>{{$p_p_range->debt_coverage_ratio}}  </td>
						</tr>
						<tr>
							<td>Net Cash Flow After </td>
							<td></td>
							<td>${{$pf->net_cash_flow_after_debt_proforma}} </td>
							<td></td>
							<td>${{$p_p_list->net_cash_flow_after}}  </td>
							<td></td>
							<td>${{$p_p_range->net_cash_flow_after}}  </td>
						</tr>
						<tr>
							<td>Debt Service Return %</td>
							<td></td>
							<td>{{number_format((cleanString($pf->net_cash_flow_after_debt_proforma)/cleanString($pf->down_payment))*100,2,'.',',')}}% </td>
							<td></td>
							<td>{{$p_p_list->debt_service_return}}%  </td>
							<td></td>
							<td>{{$p_p_range->debt_service_return}}%  </td>
						</tr>
						<tr>
							<td>Principal Reduction</td>
							<td></td>
							<td>${!! number_format(cleanString($pf->principle_reduction)*12) !!}</td>
							<td></td>
							<td>${{$p_p_list->principal_reduction}}  </td>
							<td></td>
							<td>${{$p_p_range->principal_reduction}}  </td>
						</tr>
						<tr>
							<td>Total Return</td>
							<td></td>
							<td>${{$pf->total_return_proforma}} </td>
							<td></td>
							<td>${{$p_p_list->total_return}}  </td>
							<td></td>
							<td>${{$p_p_range->total_return}}  </td>
						</tr>
						<tr>
							<td>Total Return %</td>
							<td></td>
							<td>{{number_format((cleanString($pf->total_return_proforma)/cleanString($pf->down_payment))*100,2,'.',',')}}% </td>							<td></td>
							<td>{{$p_p_list->total_return_perc}}%  </td>
							<td></td>
							<td>{{$p_p_range->total_return_perc}}%  </td>
						</tr>
						<tr>
							<td class="st-td">VALUE INDICATORS</td>
							<td></td>
							<td></td>
							<td></td>
							<td> </td>
							<td></td>
							<td> </td>
						</tr>
						<tr>
							<td>CAP Rate</td>
							<td></td>
							<td>{{$pf->cap_rate_proforma}}% </td>
							<td></td>
							<td>{{$p_p_list->cap_rate}}%  </td>
							<td></td>
							<td>{{$p_p_range->cap_rate}}%  </td>
						</tr>
						<tr>
							<td>GRM</td>
							<td></td>
							<td>{{$pf->grm_proforma}} </td>
							<td></td>
							<td>{{$p_p_list->grm}}  </td>
							<td></td>
							<td>{{$p_p_range->grm}}  </td>
						</tr>
						<tr>
							<td>Price/Unit </td>
							<td></td>
							<td>${{$pf->price_per_unit}} </td>
							<td></td>
							<td>${{$p_p_list->price_per_unit}}  </td>
							<td></td>
							<td>${{$p_p_range->price_per_unit}}  </td>
						</tr>
						<tr>
							<td>Price/SF</td>
							<td></td>
							<td>${{$pf->price_per_sf}} </td>
							<td></td>
							<td>${{$p_p_list->price_per_sf}}  </td>
							<td></td>
							<td>${{$p_p_range->price_per_sf}}  </td>
						</tr>
					</table>
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
