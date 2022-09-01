<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
				<h3>Sales Range</h3>
				<div class="fair-table">
			<table>
				<tr>
					<td>Price</td>
					<td>${!! $sales_range->sales_range_price1 !!}</td>
					<td>${!! $sales_range->sales_range_price2 !!}</td>
					<td>${!! $sales_range->sales_range_price3 !!}</td>

				</tr>
				<tr>
					<td>Existing Debt Retirement</td>
					<td>${!! $sales_range->existing_debt_retirement1 !!}</td>
					<td> ${!! $sales_range->existing_debt_retirement2 !!}</td>
					<td>${!! $sales_range->existing_debt_retirement3 !!}</td>

				</tr>
				<tr>
					<td>Sales and Escrow Fees</td>
					<td>${!! $sales_range->sales_escrow_fees1 !!}</td>
					<td> ${!! $sales_range->sales_escrow_fees2 !!}</td>
					<td>${!! $sales_range->sales_escrow_fees3 !!}</td>

				</tr>
				<tr>
					<td>Seller's Net Proceeds</td>
					<td>${!! $sales_range->seller_net_proceeds1 !!}</td>
					<td> ${!! $sales_range->seller_net_proceeds2 !!}</td>
					<td>${!! $sales_range->seller_net_proceeds3 !!}</td>

				</tr>
				<tr>
					<td>Sellers Actual Income</td>
					<td>${!! $sales_range->seller_actual_income1 !!}</td>
					<td> ${!! $sales_range->seller_actual_income2 !!}</td>
					<td>${!! $sales_range->seller_actual_income3 !!}</td>
				</tr>
				<tr class="t-f bg-blue">
					<td>Seller's Return On Equity</td>
					<td>{!! $sales_range->seller_return_equity1 !!}%</td>
					<td>{!! $sales_range->seller_return_equity2 !!}%</td>
					<td>{!! $sales_range->seller_return_equity3 !!}%</td>
				</tr>
			</table>
		</div>
				@php
					 $exchange_option1 = json_decode($sales_range->exchange_option_1);
					 $exchange_option2 = json_decode($sales_range->exchange_option_2);
				@endphp
				<div style="width: 100%;margin-top: 40px;">
					<div style="width: 47%; float: left;">
						<h4 class="font-10">Exchange Option 1</h4>
						<div class="fair-table">
							<table>
								<tr class="table-head-d">
									<td class="st-td"></td>
									<td>{{ isset($exchange_option1[0]) ? $exchange_option1[0] : '' }}</td>
								</tr>
								<tr>
									<td>Property Type</td>
									<td>{{ isset($exchange_option1[1]) ? $exchange_option1[1] : '' }}</td>
								</tr>
								<tr>
									<td>Price</td>
									<td>${{ isset($exchange_option1[2]) ? $exchange_option1[2] : '' }} </td>
								</tr>
								<tr>
									<td>Cap Rate</td>
									<td>{{ isset($exchange_option1[3]) ? $exchange_option1[3] : '' }}%</td>
								</tr>
								<tr>
									<td>Down Payment</td>
									<td>${{ isset($exchange_option1[4]) ? $exchange_option1[4] : '' }} </td>
								</tr>
								<tr>
								<tr>
									<td>New Loan</td>
									<td>${{ isset($exchange_option1[5]) ? $exchange_option1[5] : '' }} </td>
								</tr>
								<tr>
									<td>Interest Rate </td>
									<td>${{ isset($exchange_option1[6]) ? $exchange_option1[6] : '' }}%</td>
								</tr>
								<tr>
									<td>Amortization</td>
									<td>{{ isset($exchange_option1[7]) ? $exchange_option1[7] : '' }} </td>
								</tr>
								<tr>
									<td>Net Operating Income </td>
									<td>${{ isset($exchange_option1[8]) ? $exchange_option1[8] : '' }} </td>
								</tr>
								<tr>
									<td>Debtservice</td>
									<td>${{ isset($exchange_option1[9]) ? $exchange_option1[9] : '' }} </td>
								</tr>
								<tr class="t-f bg-blue">
									<td>Net Cash Flow After Debt Service</td>
									<td>${{ isset($exchange_option1[10]) ? $exchange_option1[10] : '' }} </td>
								</tr>
								<tr>
									<td>Principle Reduction</td>
									<td>${{ isset($exchange_option1[11]) ? $exchange_option1[11] : '' }} </td>
								</tr>
								<tr class="t-f bg-blue">
									<td>Total Return</td>
									<td>${{ isset($exchange_option1[12]) ? $exchange_option1[12] : '' }}</td>
								</tr>
							</table>
						</div>
					</div>
					<div style="width: 47%; float: right;">
						<h4 class="font-10">Exchange Option 2</h4>
						<div class="fair-table">
							<table>
								<tr class="table-head-d">
									<td class="st-td"></td>
									<td>{{ isset($exchange_option2[0]) ? $exchange_option2[0] : '' }}</td>
								</tr>
								<tr>
									<td>Property Type</td>
									<td>{{ isset($exchange_option2[1]) ? $exchange_option2[1] : '' }}</td>
								</tr>
								<tr>
									<td>Price</td>
									<td>${{ isset($exchange_option2[2]) ? $exchange_option2[2] : '' }}  </td>
								</tr>
								<tr>
									<td>Cap Rate</td>
									<td>{{ isset($exchange_option2[3]) ? $exchange_option2[3] : '' }}%</td>
								</tr>
								<tr>
									<td>Down Payment</td>
									<td>${{ isset($exchange_option2[4]) ? $exchange_option2[4] : '' }} </td>
								</tr>
								<tr>
								<tr>
									<td>New Loan</td>
									<td>{{ isset($exchange_option2[5]) ? $exchange_option2[5] : '' }} </td>
								</tr>
								<tr>
									<td>Interest Rate </td>
									<td>{{ isset($exchange_option2[6]) ? $exchange_option2[6] : '' }}%</td>
								</tr>
								<tr>
									<td>Amortization</td>
									<td>{{ isset($exchange_option2[7]) ? $exchange_option2[7] : '' }} </td>
								</tr>
								<tr>
									<td>Net Operating Income </td>
									<td>${{ isset($exchange_option2[8]) ? $exchange_option2[8] : '' }} </td>
								</tr>
								<tr>
									<td>Debtservice</td>
									<td>${{ isset($exchange_option2[9]) ? $exchange_option2[9] : '' }}</td>
								</tr>
								<tr class="t-f bg-blue">
									<td>Net Cash Flow After Debt Service</td>
									<td>${{ isset($exchange_option2[10]) ? $exchange_option2[10] : '' }} </td>
								</tr>
								<tr>
									<td>Principle Reduction</td>
									<td>${{ isset($exchange_option2[11]) ? $exchange_option2[11] : '' }}</td>
								</tr>
								<tr class="t-f bg-blue">
									<td>Total Return</td>
									<td>${{ isset($exchange_option2[12]) ? $exchange_option2[12] : '' }}</td>
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
