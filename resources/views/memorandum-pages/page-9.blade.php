<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
				<h3>Income & Expenses</h3>
				<div class="fair-table">
					<table>
						<tr class="table-head">
							<td class="st-td">INCOME</td>
							<td>CURRENT</td>
							<td>PER UNIT</td>
							<td>PRO FORMA</td>
							<td>PER UNIT</td>
						</tr>
						<tr>
							<td>Gross Potential Rent</td>
							<td>${!! $in_exp->gross_potential_rent !!} </td>
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
                                    $g_p_r_current = number_format(cleanString($in_exp->gross_potential_rent)/$number_of_units);
                                    $g_p_r_proforma = number_format(cleanString($in_exp->gross_potential_rent_proforma)/$number_of_units);
							@endphp
							<td>${!! ($g_p_r_current == '0.00') ? '0' : $g_p_r_current  !!} </td>
							<td>${!! $in_exp->gross_potential_rent_proforma !!} </td>
							<td>${!! ($g_p_r_proforma == '0.00') ? '0' : $g_p_r_proforma !!} </td>
						</tr>
						<tr>
							<td>Other Income</td>
							<td>${!! $in_exp->other_income !!} </td>
							@php
								$o_i_current = number_format(cleanString($in_exp->other_income)/$number_of_units);
								$o_i_proforma = number_format(cleanString($in_exp->other_income_proforma)/$number_of_units);
							@endphp
							<td>${!! ($o_i_current == '0.00') ? '0' : $o_i_current  !!} </td>
							<td>${!! $in_exp->other_income_proforma !!} </td>
							<td>${!! ($o_i_proforma == '0.00') ? '0' : $o_i_proforma  !!} </td>
						</tr>
						<tr>
							<td>Gross Potential Income</td>
							<td>${!! $in_exp->gross_potential_income !!} </td>
							@php
								$g_p_i_current = number_format(cleanString($in_exp->gross_potential_income)/$number_of_units);
								$g_p_i_proforma = number_format(cleanString($in_exp->gross_potential_income_proforma)/$number_of_units);
							@endphp
							<td>${!! ($g_p_i_current == '0.00') ? '0' : $g_p_i_current  !!} </td>
							<td>${!! $in_exp->gross_potential_income_proforma !!} </td>
							<td>${!! ($g_p_i_proforma == '0.00') ? '0' : $g_p_i_proforma  !!} </td>
						</tr>
						<tr>
							<td>Vacancy (GPR) Collection Reserve (GPR)</td>
							<td>${!! $in_exp->vacancy_collection_reserve !!} </td>
							@php
								$v_c_r_current = number_format(cleanString($in_exp->vacancy_collection_reserve)/$number_of_units);
								$v_c_r_proforma = number_format(cleanString($in_exp->vacancy_collection_reserve_proforma)/$number_of_units);
							@endphp
							<td>${!! ($v_c_r_current == '0.00') ? '0' : $v_c_r_current  !!} </td>
							<td>${!! $in_exp->vacancy_collection_reserve_proforma !!} </td>
							<td>${!! ($v_c_r_proforma == '0.00') ? '0' : $v_c_r_proforma  !!} </td>
						</tr>
						<tr class="font-bold">
							<td class="text-uppercase"><strong>Effective Gross Income</strong></td>
							<td>${!! $in_exp->effective_gross_income !!} </td>
							@php
								$e_g_i_current = number_format(cleanString($in_exp->effective_gross_income)/$number_of_units);
								$e_g_i_proforma = number_format(cleanString($in_exp->effective_gross_income_proforma)/$number_of_units);
							@endphp
							<td>${!! ($e_g_i_current == '0.00') ? '0' : $e_g_i_current  !!} </td>
							<td>${!! $in_exp->effective_gross_income_proforma !!} </td>
							<td>${!! ($e_g_i_proforma == '0.00') ? '0' : $e_g_i_proforma  !!} </td>
						</tr>
						<tr>
							<td class="text-uppercase">EXPENSES</td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td>Real Estate Taxes</td>
							<td>${!! $in_exp->real_estate_taxes !!} </td>
							@php
								$r_e_t_current = number_format(cleanString($in_exp->real_estate_taxes)/$number_of_units);
								$r_e_t_proforma = number_format(cleanString($in_exp->real_estate_taxes_proforma)/$number_of_units);
							@endphp
							<td>${!! ($r_e_t_current == '0.00') ? '0' : $r_e_t_current  !!} </td>
							<td>${!! $in_exp->real_estate_taxes_proforma !!} </td>
							<td>${!! ($r_e_t_proforma == '0.00') ? '0' : $r_e_t_proforma  !!} </td>
						</tr>
						<tr>
							<td>Marketing</td>
							<td>${!! $in_exp->marketing !!} </td>
							@php
								$m_current = number_format(cleanString($in_exp->marketing)/$number_of_units);
								$m_proforma = number_format(cleanString($in_exp->marketing_proforma)/$number_of_units);
							@endphp
							<td>${!! ($m_current == '0.00') ? '0' : $m_current  !!} </td>
							<td>${!! $in_exp->marketing_proforma !!} </td>
							<td>${!! ($m_proforma == '0.00') ? '0' : $m_proforma  !!} </td>
						</tr>
						<tr>
							<td>Onsite Management</td>
							<td>${!! $in_exp->onsite_management !!} </td>
							@php
								$o_m_current = number_format(cleanString($in_exp->onsite_management)/$number_of_units);
								$o_m_proforma = number_format(cleanString($in_exp->onsite_management_proforma)/$number_of_units);
							@endphp
							<td>${!! ($o_m_current == '0.00') ? '0' : $o_m_current  !!} </td>
							<td>${!! $in_exp->onsite_management_proforma !!} </td>
							<td>${!! ($o_m_proforma == '0.00') ? '0' : $o_m_proforma  !!} </td>
						</tr>
						<tr>
							<td>Administration</td>
							<td>${!! $in_exp->administration !!} </td>
							@php
								$admin_current = number_format(cleanString($in_exp->administration)/$number_of_units);
								$admin_proforma = number_format(cleanString($in_exp->administration_proforma)/$number_of_units);
							@endphp
							<td>${!! ($admin_current == '0.00') ? '0' : $admin_current  !!} </td>
							<td>${!! $in_exp->administration_proforma !!} </td>
							<td>${!! ($admin_proforma == '0.00') ? '0' : $admin_proforma  !!} </td>
						</tr>
						<tr>
							<td>Repair/Maintenance</td>
							<td>${!! $in_exp->maintenance !!} </td>
							@php
								$maintain_current = number_format(cleanString($in_exp->maintenance)/$number_of_units);
								$maintain_proforma = number_format(cleanString($in_exp->maintenance_proforma)/$number_of_units);
							@endphp
							<td>${!! ($maintain_current == '0.00') ? '0' : $maintain_current  !!} </td>
							<td>${!! $in_exp->maintenance_proforma !!} </td>
							<td>${!! ($maintain_proforma == '0.00') ? '0' : $maintain_proforma  !!} </td>
						</tr>
						<tr>
							<td>Contract Services</td>
							<td>${!! $in_exp->contract_services !!} </td>
							@php
								$c_s_current = number_format(cleanString($in_exp->contract_services)/$number_of_units);
								$c_s_proforma = number_format(cleanString($in_exp->contract_services_proforma)/$number_of_units);
							@endphp
							<td>${!! ($c_s_current == '0.00') ? '0' : $c_s_current  !!} </td>
							<td>${!! $in_exp->contract_services_proforma !!} </td>
							<td>${!! ($c_s_proforma == '0.00') ? '0' : $c_s_proforma  !!} </td>
						</tr>
						<tr>
							<td>Utilities</td>
							<td>${!! $in_exp->utilities !!} </td>
							@php
								$util_current = number_format(cleanString($in_exp->utilities)/$number_of_units);
								$util_proforma = number_format(cleanString($in_exp->utilities_proforma)/$number_of_units);
							@endphp
							<td>${!! ($util_current == '0.00') ? '0' : $util_current  !!} </td>
							<td>${!! $in_exp->utilities_proforma !!} </td>
							<td>${!! ($util_proforma == '0.00') ? '0' : $util_proforma  !!} </td>
						</tr>	
						<tr>
							<td>Offsite Management</td>
							<td>${!! $in_exp->offsite_management !!} </td>
							@php
								$of_m_current = number_format(cleanString($in_exp->offsite_management)/$number_of_units);
								$of_m_proforma = number_format(cleanString($in_exp->offsite_management_proforma)/$number_of_units);
							@endphp
							<td>${!! ($of_m_current == '0.00') ? '0' : $of_m_current  !!} </td>
							<td>${!! $in_exp->offsite_management_proforma !!} </td>
							<td>${!! ($of_m_proforma == '0.00') ? '0' : $of_m_proforma  !!} </td>
						</tr>	
						<tr>
							<td>Insurance</td>
							<td>${!! $in_exp->insurance !!} </td>
							@php
								$ins_current = number_format(cleanString($in_exp->insurance)/$number_of_units);
								$ins_proforma = number_format(cleanString($in_exp->insurance_proforma)/$number_of_units);
							@endphp
							<td>${!! ($ins_current == '0.00') ? '0' : $ins_current  !!} </td>
							<td>${!! $in_exp->insurance_proforma !!} </td>
							<td>${!! ($ins_proforma == '0.00') ? '0' : $ins_proforma  !!} </td>
						</tr>	
						<tr>
							<td>Professional Fees</td>
							<td>${!! $in_exp->professional_fees !!} </td>
							@php
								$prof_current = number_format(cleanString($in_exp->professional_fees)/$number_of_units);
								$prof_proforma = number_format(cleanString($in_exp->professional_fees_proforma)/$number_of_units);
							@endphp
							<td>${!! ($prof_current == '0.00') ? '0' : $prof_current  !!} </td>
							<td>${!! $in_exp->professional_fees_proforma !!} </td>
							<td>${!! ($prof_proforma == '0.00') ? '0' : $prof_proforma  !!} </td>
						</tr>	
						<tr>
							<td>Reserves</td>
							<td>${!! $in_exp->reserves !!} </td>
							@php
								$res_current = number_format(cleanString($in_exp->reserves)/$number_of_units);
								$res_proforma = number_format(cleanString($in_exp->reserves_proforma)/$number_of_units);
							@endphp
							<td>${!! ($res_current == '0.00') ? '0' : $res_current  !!} </td>
							<td>${!! $in_exp->reserves_proforma !!} </td>
							<td>${!! ($res_proforma == '0.00') ? '0' : $res_proforma  !!} </td>
						</tr>
						<tr class="font-bold">
							<td class="text-uppercase"><strong>Total Expenses</strong></td>
							@php $total_expenses = cleanString($in_exp->real_estate_taxes)+
							cleanString($in_exp->marketing)+
							cleanString($in_exp->onsite_management)+
							cleanString($in_exp->administration)+
							cleanString($in_exp->maintenance)+
							cleanString($in_exp->contract_services)+
							cleanString($in_exp->utilities)+
							cleanString($in_exp->offsite_management)+
							cleanString($in_exp->insurance)+
							cleanString($in_exp->professional_fees)+
							cleanString($in_exp->reserves); @endphp
							<td>${!! number_format($total_expenses) !!}</td>
							<td></td>
							@php $total_expenses_proforma = cleanString($in_exp->real_estate_taxes_proforma)+
							cleanString($in_exp->marketing_proforma)+
							cleanString($in_exp->onsite_management_proforma)+
							cleanString($in_exp->administration_proforma)+
							cleanString($in_exp->maintenance_proforma)+
							cleanString($in_exp->contract_services_proforma)+
							cleanString($in_exp->utilities_proforma)+
							cleanString($in_exp->offsite_management_proforma)+
							cleanString($in_exp->insurance_proforma)+
							cleanString($in_exp->professional_fees_proforma)+
							cleanString($in_exp->reserves_proforma); @endphp
							<td>${!! number_format($total_expenses_proforma) !!}</td>
							<td></td>
						</tr>	
						<tr>
							<td>Expenses per SF</td>
							<td>${!! number_format(cleanString($total_expenses)/cleanString($pf->rentable_square_feet),'2','.',',') !!}</td>
							<td></td>
							<td>${!! number_format(cleanString($total_expenses_proforma)/cleanString($pf->rentable_square_feet),'2','.',',') !!}</td>
							<td></td>
						</tr>
						<tr>
							<td>% of EGI</td>
							<td>{{ $in_exp->perc_egi }}% </td>
							<td></td>
							<td>{{ $in_exp->perc_egi_proforma }}%</td>
							<td></td>
						</tr>
						<tr class="bg-blue">
							<td>Net Operating income</td>
							<td>${{$in_exp->net_operating_income}} </td>
							@php
								$net_current = number_format(cleanString($in_exp->net_operating_income)/$dec_units);
								$net_proforma = number_format(cleanString($in_exp->net_operating_income_proforma)/$dec_units);
							@endphp
							<td>${!! ($net_current == '0.00') ? '0' : $net_current  !!} </td>
							<td>${{$in_exp->net_operating_income_proforma}} </td>
							<td>${!! ($net_proforma == '0.00') ? '0' : $net_proforma  !!} </td>
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