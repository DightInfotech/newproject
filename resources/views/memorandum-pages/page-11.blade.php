<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
		<div class="main" style="padding: 20px 50px 0 50px;">
		 	<h3 class="h3">Financial Overview</h3>
		 	<h4 class="h4">Annualized Operating Data</h4>
		 	<div class="row">
				 <div style="width: 50%; float: left;">
					 <div class="fair-table">
						 <table>
							 <tr class="table-head">
								 <td class="st-td">INCOME</td>
								 <td>CURRENT</td>
								 <td>PRO FORMA</td>
							 </tr>
							<tr class="td-bottom-border text-uppercase-bold"><td class="text-gray">INCOME</td>   <td>CURRENT</td>       <td>PRO FORMA</td></tr>
							<tr><td>Gross Potential Rent</td>   <td>${!! $in_exp->gross_potential_rent !!}</td>       <td>${!! $in_exp->gross_potential_rent_proforma !!}</td></tr>
							<tr><td>Other Income</td>   <td>${!! $in_exp->other_income !!}</td>       <td>${!! $in_exp->other_income_proforma !!}</td></tr>
							<tr><td>Gross Potential Income</td>   <td>${!! $in_exp->gross_potential_income !!}</td>       <td>${!! $in_exp->gross_potential_income_proforma !!}</td></tr>
							<tr><td>Less: Vacancy/Deductions (GPR)</td>   <td>{!! $in_exp->vacancy_collection_reserve !!}</td>       <td>{!! $in_exp->vacancy_collection_reserve_proforma !!}</td></tr>
							<tr><td>Effective Gross Income</td>   <td>{!! $in_exp->effective_gross_income !!}</td>       <td>{!! $in_exp->effective_gross_income_proforma !!}</tr>
							<tr><td>Less: Expenses</td>   <td>{!! $in_exp->total_expenses !!}</td>       <td>{!! $in_exp->total_expenses_proforma !!}</td></tr>
							<tr><td>Net Operating Income</td>   <td>${!! $in_exp->net_operating_income !!}</td>       <td> ${!! $in_exp->net_operating_income_proforma !!}</td></tr>
							<tr><td>Debt Service</td>   <td>{!! number_format(cleanString($pf->payment)*12) !!}</td>       <td>{!! number_format(cleanString($pf->payment)*12) !!}</td></tr>
							<tr><td>Debt Coverage Ratio</td>   <td>{{$pf->debt_coverage_ratio_current}}</td>       <td>{{$pf->debt_coverage_ratio_proforma}}</td></tr>
							<tr><td>Net Cash Flow After Debt Service</td>   <td>{!! $pf->net_cash_flow_after_debt !!}</td>       <td>{!! $pf->net_cash_flow_after_debt_proforma !!}</td></tr>
							<tr><td>Principal Reduction</td>   <td>${!! number_format(cleanString($pf->principle_reduction)*12) !!}</td>       <td>${!! number_format(cleanString($pf->principle_reduction)*12) !!}</td></tr>
							<tr><td>Total Return</td>   <td>${!! $pf->total_return !!}</td>       <td>${!! number_format(intval(cleanString($pf->total_return_proforma))) !!}</td></tr>
						</table>
					</div>
				 </div>
				 <div style="width: 45%; float: right;">
					 <div class="fair-table">
						 <table>
							 <tr class="table-head">
								 <td class="st-td">EXPENSES</td>
								 <td>CURRENT</td>
								 <td>PRO FORMA</td>
							 </tr>
							 @php
								 $units = $pf->number_of_units;
                                     if (strpos($units, '+') !== false) {
                                         $units_arr = explode('+',$units);
                                         if(count($units_arr) > 1){
                                             $dec_units = $units_arr[0];
                                             $non_dec_units = $units_arr[1];
                                             $number_of_units = $dec_units + $non_dec_units;
                                         }
                                     }else{
                                         $data['number_of_units'] = $units;
                                         $number_of_units = $units;
                                         $dec_units = $units;
                                     }
							 @endphp
								<tr><td>Real Estate Taxes</td>     <td>{!! $in_exp->real_estate_taxes !!}</td> <td>{!! $in_exp->real_estate_taxes_proforma !!}</td></tr>
								<tr><td>Marketing</td>     <td>{!! $in_exp->marketing !!}</td> <td>{!! $in_exp->marketing_proforma !!}</td></tr>
								<tr><td>Onsite Management</td>     <td>{!! $in_exp->onsite_management !!}</td> <td>{!! $in_exp->onsite_management_proforma !!}</td></tr>
								<tr><td>Administration</td>     <td>{!! $in_exp->administration !!}</td> <td>{!! $in_exp->administration_proforma !!}</td></tr>
								<tr><td>Repair/Maintenance</td>     <td>{!! $in_exp->maintenance !!}</td> <td>{!! $in_exp->maintenance_proforma !!}</td></tr>
								<tr><td>Contract Services</td>     <td>{!! $in_exp->contract_services !!}</td> <td>{!! $in_exp->contract_services_proforma !!}</td></tr>
								<tr><td>Utilities</td>     <td>{!! $in_exp->utilities !!}</td> <td>{!! $in_exp->utilities_proforma !!}</td></tr>
								<tr><td>Offsite Management</td>     <td>{!! $in_exp->offsite_management !!} </td> <td>{!! $in_exp->offsite_management_proforma !!}</td></tr>
								<tr><td>Insurance</td>     <td>{!! $in_exp->insurance !!}</td> <td>{!! $in_exp->insurance_proforma !!}</td></tr>
								<tr><td>Professional Fees</td>     <td>{!! $in_exp->professional_fees !!}</td> <td>{!! $in_exp->professional_fees !!}</td></tr>
								<tr><td>Reserves</td>     <td>{!! $in_exp->reserves !!}</td> <td>{!! $in_exp->reserves_proforma !!}</td></tr>
								<tr><td>Total Expenses</td>     <td>${!! $in_exp->total_expenses !!} </td> <td>${!! $in_exp->total_expenses_proforma !!}</td></tr>
								<tr><td>Expenses/Unit</td>     <td>${!! number_format(cleanString($in_exp->total_expenses)/$dec_units,2,'.',',') !!} </td> <td>${!! number_format(cleanString($in_exp->total_expenses_proforma)/$dec_units) !!}</td></tr>
								<tr><td>Expenses/SF</td>     <td>${!! $in_exp->expenses_per_sf !!} </td> <td>${!! $in_exp->expenses_per_sf_proforma !!}</td></tr>
								<tr><td>% of EGI</td>     <td>{!! $in_exp->perc_egi !!}% </td> <td>{!! $in_exp->perc_egi_proforma !!}%</td></tr>
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