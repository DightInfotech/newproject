<div class="page w-100 padding-zero">
	<div class="div-header">
			<div class="page-header page-2-header">
			<h1>PRICING & FINANCIAL ANALYSIS</h1>
		</div>
	</div>
	 <div class="main" style="padding: 20px 50px 0 50px;">
		 <div class="height-full">
			 <div class="div-block">
				 <div class="container-content">
					 <h3 style="margin-bottom: 5px;">10 Year Projection</h3>
					 <div class="table-box">
						 <table class="projection-table" style="margin-bottom: 5px;">
							 <tr class="table-head">
								<td>Income</td>
								<td>Pro Forma</td>
								<td>Year 2</td>
								<td>Year 3</td>
								<td>Year 4</td>
								<td>Year 5</td>
								<td>Year 6</td>
								<td>Year 7</td>
								<td>Year 8</td>
								<td>Year 9</td>
								<td>Year 10</td>
							</tr>
							 @if(!empty($proj_increments))
								 @foreach($proj_increments as $proj)

								 @endforeach
							 @endif

							<tr>
								<td>Gross Market Rent</td>
								<td>${!! $in_exp->gross_potential_rent_proforma !!}</td>
								<td>${!! $g_m_r_year2 = number_format(cleanString($in_exp->gross_potential_rent_proforma) + (cleanString($in_exp->gross_potential_rent_proforma)*(!empty($y_2) ? $y_2->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year3 = number_format(cleanString($g_m_r_year2) + (cleanString($g_m_r_year2) * (!empty($y_3) ? $y_3->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year4 = number_format(cleanString($g_m_r_year3) + (cleanString($g_m_r_year3) * (!empty($y_4) ? $y_4->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year5 = number_format(cleanString($g_m_r_year4) + (cleanString($g_m_r_year4) * (!empty($y_5) ? $y_5->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year6 = number_format(cleanString($g_m_r_year5) + (cleanString($g_m_r_year5) * (!empty($y_6) ? $y_6->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year7 = number_format(cleanString($g_m_r_year6) + (cleanString($g_m_r_year6) * (!empty($y_7) ? $y_7->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year8 = number_format(cleanString($g_m_r_year7) + (cleanString($g_m_r_year7) * (!empty($y_8) ? $y_8->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year9 = number_format(cleanString($g_m_r_year8) + (cleanString($g_m_r_year8) * (!empty($y_9) ? $y_9->market_rents/100 : '0.03'))) !!}</td>
								<td>${!! $g_m_r_year10 = number_format(cleanString($g_m_r_year9) + (cleanString($g_m_r_year9) * (!empty($y_10) ? $y_10->market_rents/100 : '0.03'))) !!}</td>
							</tr>

							<tr>
								<td>Loss to Lease</td>
								<td>${!! $yp->loss_to_lease !!}</td>
								<td>${!! $lease_year2 = number_format(cleanString($yp->loss_to_lease) + (cleanString($yp->loss_to_lease)*(!empty($y_2) ? $y_2->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year3 = number_format(cleanString($lease_year2) + (cleanString($lease_year2) * (!empty($y_3) ? $y_3->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year4 = number_format(cleanString($lease_year3) + (cleanString($lease_year3) * (!empty($y_4) ? $y_4->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year5 = number_format(cleanString($lease_year4) + (cleanString($lease_year4) * (!empty($y_5) ? $y_5->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year6 = number_format(cleanString($lease_year5) + (cleanString($lease_year5) * (!empty($y_6) ? $y_6->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year7 = number_format(cleanString($lease_year6) + (cleanString($lease_year6) * (!empty($y_7) ? $y_7->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year8 = number_format(cleanString($lease_year7) + (cleanString($lease_year7) * (!empty($y_8) ? $y_8->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year9 = number_format(cleanString($lease_year8) + (cleanString($lease_year8) * (!empty($y_9) ? $y_9->loss_to_lease/100 : '0.03'))) !!}</td>
								<td>${!! $lease_year10 = number_format(cleanString($lease_year9) + (cleanString($lease_year9) * (!empty($y_10) ? $y_10->loss_to_lease/100 : '0.03'))) !!}</td>
							</tr>
							<tr class="text-bold bg-light">
								<td>Adjusted Gross Potential Rent</td>
								<td>${!! $adj_gross_rent = number_format(cleanString($in_exp->gross_potential_rent_proforma) + cleanString($in_exp->loss_to_lease)) !!}</td>
								<td>${!! $adj_gross_rent_year2 = number_format(cleanString($g_m_r_year2) + (cleanString($lease_year2))) !!}</td>
								<td>${!! $adj_gross_rent_year3 = number_format(cleanString($g_m_r_year3) + (cleanString($lease_year3))) !!}</td>
								<td>${!! $adj_gross_rent_year4 = number_format(cleanString($g_m_r_year4) + (cleanString($lease_year4))) !!}</td>
								<td>${!! $adj_gross_rent_year5 = number_format(cleanString($g_m_r_year5) + (cleanString($lease_year5))) !!}</td>
								<td>${!! $adj_gross_rent_year6 = number_format(cleanString($g_m_r_year6) + (cleanString($lease_year6))) !!}</td>
								<td>${!! $adj_gross_rent_year7 = number_format(cleanString($g_m_r_year7) + (cleanString($lease_year7))) !!}</td>
								<td>${!! $adj_gross_rent_year8 = number_format(cleanString($g_m_r_year8) + (cleanString($lease_year8))) !!}</td>
								<td>${!! $adj_gross_rent_year9 = number_format(cleanString($g_m_r_year9) + (cleanString($lease_year9))) !!}</td>
								<td>${!! $adj_gross_rent_year10 = number_format(cleanString($g_m_r_year10) + (cleanString($lease_year10))) !!}</td>
							</tr>

							<tr>
								<td></td>
								<td></td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
							</tr>
							<tr>
								<td>Vacancy Loss</td>
								<td>${!! $vac_loss = number_format(cleanString($in_exp->vacancy_collection_reserve_proforma)) !!}</td>
								<td>${!! $vac_loss_year2 = number_format(cleanString($vac_loss) + (cleanString($vac_loss) * (!empty($y_2) ? $y_2->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year3 = number_format(cleanString($vac_loss_year2) + (cleanString($vac_loss_year2) * (!empty($y_3) ? $y_3->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year4 = number_format(cleanString($vac_loss_year3) + (cleanString($vac_loss_year3) * (!empty($y_4) ? $y_4->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year5 = number_format(cleanString($vac_loss_year4) + (cleanString($vac_loss_year4) * (!empty($y_5) ? $y_5->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year6 = number_format(cleanString($vac_loss_year5) + (cleanString($vac_loss_year5) * (!empty($y_6) ? $y_6->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year7 = number_format(cleanString($vac_loss_year6) + (cleanString($vac_loss_year6) * (!empty($y_7) ? $y_7->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year8 = number_format(cleanString($vac_loss_year7) + (cleanString($vac_loss_year7) * (!empty($y_8) ? $y_8->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year9 = number_format(cleanString($vac_loss_year8) + (cleanString($vac_loss_year8) * (!empty($y_9) ? $y_9->vacancy_loss/100 : '0.03'))) !!}</td>
								<td>${!! $vac_loss_year10 = number_format(cleanString($vac_loss_year9) + (cleanString($vac_loss_year9) * (!empty($y_10) ? $y_10->vacancy_loss/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Concessions</td>
								<td>${!! $con = number_format($yp->concession) !!}</td>
								<td>${!! $con_year2 = number_format(cleanString($con) + (cleanString($con) * (!empty($y_2) ? $y_2->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year3 = number_format(cleanString($con_year2) + (cleanString($con_year2) * (!empty($y_3) ? $y_3->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year4 = number_format(cleanString($con_year3) + (cleanString($con_year3) * (!empty($y_4) ? $y_4->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year5 = number_format(cleanString($con_year4) + (cleanString($con_year4) * (!empty($y_5) ? $y_5->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year6 = number_format(cleanString($con_year5) + (cleanString($con_year5) * (!empty($y_6) ? $y_6->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year7 = number_format(cleanString($con_year6) + (cleanString($con_year6) * (!empty($y_7) ? $y_7->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year8 = number_format(cleanString($con_year7) + (cleanString($con_year7) * (!empty($y_8) ? $y_8->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year9 = number_format(cleanString($con_year8) + (cleanString($con_year8) * (!empty($y_9) ? $y_9->concessions/100 : '0.03'))) !!}</td>
								<td>${!! $con_year10 = number_format(cleanString($con_year9) + (cleanString($con_year9) * (!empty($y_10) ? $y_10->concessions/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Non Revenue Units</td>
								<td>${!! $non_rev = number_format($yp->non_revenue_units) !!}</td>
								<td>${!! $non_rev_year2 = number_format(cleanString($non_rev) + (cleanString($non_rev) * (!empty($y_2) ? $y_2->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year3 = number_format(cleanString($non_rev_year2) + (cleanString($non_rev_year2) * (!empty($y_3) ? $y_3->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year4 = number_format(cleanString($non_rev_year3) + (cleanString($non_rev_year3) * (!empty($y_4) ? $y_4->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year5 = number_format(cleanString($non_rev_year4) + (cleanString($non_rev_year4) * (!empty($y_5) ? $y_5->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year6 = number_format(cleanString($non_rev_year5) + (cleanString($non_rev_year5) * (!empty($y_6) ? $y_6->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year7 = number_format(cleanString($non_rev_year6) + (cleanString($non_rev_year6) * (!empty($y_7) ? $y_7->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year8 = number_format(cleanString($non_rev_year7) + (cleanString($non_rev_year7) * (!empty($y_8) ? $y_8->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year9 = number_format(cleanString($non_rev_year8) + (cleanString($non_rev_year8) * (!empty($y_9) ? $y_9->non_revenue_units/100 : '0.03'))) !!}</td>
								<td>${!! $non_rev_year10 = number_format(cleanString($non_rev_year9) + (cleanString($non_rev_year9) * (!empty($y_10) ? $y_10->non_revenue_units/100 : '0.03'))) !!}</td>
							</tr>
							<tr class="text-bold bg-light">
								<td>Total Rental Income</td>
								<td>${!! $total_rent_income = number_format(cleanString($adj_gross_rent) - cleanString($vac_loss)) !!}</td>
								<td>${!! $total_rent_income_year2 = number_format(cleanString($adj_gross_rent_year2) - cleanString($vac_loss_year2)) !!}</td>
								<td>${!! $total_rent_income_year3 = number_format(cleanString($adj_gross_rent_year3) - cleanString($vac_loss_year3)) !!}</td>
								<td>${!! $total_rent_income_year4 = number_format(cleanString($adj_gross_rent_year4) - cleanString($vac_loss_year4)) !!}</td>
								<td>${!! $total_rent_income_year5 = number_format(cleanString($adj_gross_rent_year5) - cleanString($vac_loss_year5)) !!}</td>
								<td>${!! $total_rent_income_year6 = number_format(cleanString($adj_gross_rent_year6) - cleanString($vac_loss_year6)) !!}</td>
								<td>${!! $total_rent_income_year7 = number_format(cleanString($adj_gross_rent_year7) - cleanString($vac_loss_year7)) !!}</td>
								<td>${!! $total_rent_income_year8 = number_format(cleanString($adj_gross_rent_year8) - cleanString($vac_loss_year8)) !!}</td>
								<td>${!! $total_rent_income_year9 = number_format(cleanString($adj_gross_rent_year9) - cleanString($vac_loss_year9)) !!}</td>
								<td>${!! $total_rent_income_year10 = number_format(cleanString($adj_gross_rent_year10) - cleanString($vac_loss_year10)) !!}</td>
							</tr>
							<tr>
								<td>Economic Occupancy</td>
								<td>{!! $ec_occupancy = $yp->economic_occupancy !!}%</td>
								<td>{!! $ec_occupancy_year2 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year3 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year4 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year5 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year6 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year7 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year8 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year9 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
								<td>{!! $ec_occupancy_year10 = number_format(cleanString($ec_occupancy) + 3) !!}%</td>
							</tr>
							<tr>
								<td>Short-Term Premiums</td>
								<td>${!! $s_t_p = $yp->short_term_premiums !!}</td>
								<td>${!! $s_t_p_year2 = number_format(cleanString($s_t_p) + (cleanString($s_t_p)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year3 = number_format(cleanString($s_t_p_year2) + (cleanString($s_t_p_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year4 = number_format(cleanString($s_t_p_year3) + (cleanString($s_t_p_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year5 = number_format(cleanString($s_t_p_year4) + (cleanString($s_t_p_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year6 = number_format(cleanString($s_t_p_year5) + (cleanString($s_t_p_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year7= number_format(cleanString($s_t_p_year6) + (cleanString($s_t_p_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year8 = number_format(cleanString($s_t_p_year7) + (cleanString($s_t_p_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year9 = number_format(cleanString($s_t_p_year8) + (cleanString($s_t_p_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $s_t_p_year10 = number_format(cleanString($s_t_p_year9) + (cleanString($s_t_p_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Carport and Garages</td>
								<td>${!! $c_g = $yp->carport_garages !!}</td>
								<td>${!! $c_g_year2 = number_format(cleanString($c_g) + (cleanString($c_g)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year3 = number_format(cleanString($c_g_year2) + (cleanString($c_g_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year4 = number_format(cleanString($c_g_year3) + (cleanString($c_g_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year5 = number_format(cleanString($c_g_year4) + (cleanString($c_g_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year6 = number_format(cleanString($c_g_year5) + (cleanString($c_g_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year7 = number_format(cleanString($c_g_year6) + (cleanString($c_g_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year8 = number_format(cleanString($c_g_year7) + (cleanString($c_g_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year9 = number_format(cleanString($c_g_year8) + (cleanString($c_g_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $c_g_year10 = number_format(cleanString($c_g_year9) + (cleanString($c_g_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Electricity-Tenant Reim</td>
								<td>${!! $e_t = $yp->electricity_tenant_reim !!}</td>
								<td>${!! $e_t_year2 = number_format(cleanString($e_t) + (cleanString($e_t)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year3 = number_format(cleanString($e_t_year2) + (cleanString($e_t_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year4 = number_format(cleanString($e_t_year3) + (cleanString($e_t_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year5 = number_format(cleanString($e_t_year4) + (cleanString($e_t_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year6 = number_format(cleanString($e_t_year5) + (cleanString($e_t_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year7 = number_format(cleanString($e_t_year6) + (cleanString($e_t_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year8 = number_format(cleanString($e_t_year7) + (cleanString($e_t_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year9 = number_format(cleanString($e_t_year8) + (cleanString($e_t_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_t_year10 = number_format(cleanString($e_t_year9) + (cleanString($e_t_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Other Income</td>
								<td>${!! $o_i = $in_exp->other_income_proforma !!}</td>
								<td>${!! $o_i_year2 = number_format(cleanString($o_i) + (cleanString($o_i)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year3 = number_format(cleanString($o_i_year2) + (cleanString($o_i_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year4 = number_format(cleanString($o_i_year3) + (cleanString($o_i_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year5 = number_format(cleanString($o_i_year4) + (cleanString($o_i_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year6 = number_format(cleanString($o_i_year5) + (cleanString($o_i_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year7 = number_format(cleanString($o_i_year6) + (cleanString($o_i_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year8 = number_format(cleanString($o_i_year7) + (cleanString($o_i_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year9 = number_format(cleanString($o_i_year8) + (cleanString($o_i_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $o_i_year10 = number_format(cleanString($o_i_year9) + (cleanString($o_i_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Total Other Income</td>
								<td>${!! $t_o_i = $in_exp->other_income_proforma !!}</td>
								<td>${!! $t_o_i_year2 = number_format(cleanString($t_o_i) + (cleanString($t_o_i)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year3 = number_format(cleanString($t_o_i_year2) + (cleanString($t_o_i_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year4 = number_format(cleanString($t_o_i_year3) + (cleanString($t_o_i_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year5 = number_format(cleanString($t_o_i_year4) + (cleanString($t_o_i_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year6 = number_format(cleanString($t_o_i_year5) + (cleanString($t_o_i_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year7 = number_format(cleanString($t_o_i_year6) + (cleanString($t_o_i_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year8 = number_format(cleanString($t_o_i_year7) + (cleanString($t_o_i_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year9 = number_format(cleanString($t_o_i_year8) + (cleanString($t_o_i_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $t_o_i_year10 = number_format(cleanString($t_o_i_year9) + (cleanString($t_o_i_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr class="text-bold bg-light">
								<td>Effective Gross Income</td>
								<td>${!! $e_g_in = $in_exp->effective_gross_income_proforma !!}</td>
								<td>${!! $e_g_in_year2 = number_format(cleanString($e_g_in) + (cleanString($e_g_in)*(!empty($y_2) ? $y_2->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year3 = number_format(cleanString($e_g_in_year2) + (cleanString($e_g_in_year2)*(!empty($y_3) ? $y_3->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year4 = number_format(cleanString($e_g_in_year3) + (cleanString($e_g_in_year3)*(!empty($y_4) ? $y_4->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year5 = number_format(cleanString($e_g_in_year4) + (cleanString($e_g_in_year4)*(!empty($y_5) ? $y_5->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year6 = number_format(cleanString($e_g_in_year5) + (cleanString($e_g_in_year5)*(!empty($y_6) ? $y_6->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year7 = number_format(cleanString($e_g_in_year6) + (cleanString($e_g_in_year6)*(!empty($y_7) ? $y_7->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year8 = number_format(cleanString($e_g_in_year7) + (cleanString($e_g_in_year7)*(!empty($y_8) ? $y_8->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year9 = number_format(cleanString($e_g_in_year8) + (cleanString($e_g_in_year8)*(!empty($y_9) ? $y_9->other_income/100 : '0.03'))) !!}</td>
								<td>${!! $e_g_in_year10 = number_format(cleanString($e_g_in_year9) + (cleanString($e_g_in_year9)*(!empty($y_10) ? $y_10->other_income/100 : '0.03'))) !!}</td>
							</tr>
							<tr class="table-head">
								<td>Operating Expenses</td>
								<td></td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
								<td>$0</td>
							</tr>
							<tr>
								<td>Professional Fees</td>
								<td>${!! $p_f = $in_exp->professional_fees_proforma !!}</td>
								<td>${!! $p_f_year2 = number_format(cleanString($p_f) + (cleanString($p_f)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year3 = number_format(cleanString($p_f_year2) + (cleanString($p_f_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year4 = number_format(cleanString($p_f_year3) + (cleanString($p_f_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year5 = number_format(cleanString($p_f_year4) + (cleanString($p_f_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year6 = number_format(cleanString($p_f_year5) + (cleanString($p_f_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year7 = number_format(cleanString($p_f_year6) + (cleanString($p_f_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year8 = number_format(cleanString($p_f_year7) + (cleanString($p_f_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year9 = number_format(cleanString($p_f_year8) + (cleanString($p_f_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $p_f_year10 = number_format(cleanString($p_f_year9) + (cleanString($p_f_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Offsite Management</td>
								<td>${!! $o_m = $in_exp->offsite_management_proforma !!}</td>
								<td>${!! $o_m_year2 = number_format(cleanString($o_m) + (cleanString($o_m)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year3 = number_format(cleanString($o_m_year2) + (cleanString($o_m_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year4 = number_format(cleanString($o_m_year3) + (cleanString($o_m_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year5 = number_format(cleanString($o_m_year4) + (cleanString($o_m_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year6 = number_format(cleanString($o_m_year5) + (cleanString($o_m_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year7 = number_format(cleanString($o_m_year6) + (cleanString($o_m_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year8 = number_format(cleanString($o_m_year7) + (cleanString($o_m_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year9 = number_format(cleanString($o_m_year8) + (cleanString($o_m_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $o_m_year10 = number_format(cleanString($o_m_year9) + (cleanString($o_m_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Administrative</td>
								<td>${!! $adm = $in_exp->administration_proforma !!}</td>
								<td>${!! $adm_year2 = number_format(cleanString($adm) + (cleanString($adm)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year3 = number_format(cleanString($adm_year2) + (cleanString($adm_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year4 = number_format(cleanString($adm_year3) + (cleanString($adm_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year5 = number_format(cleanString($adm_year4) + (cleanString($adm_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year6 = number_format(cleanString($adm_year5) + (cleanString($adm_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year7 = number_format(cleanString($adm_year6) + (cleanString($adm_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year8 = number_format(cleanString($adm_year7) + (cleanString($adm_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year9 = number_format(cleanString($adm_year8) + (cleanString($adm_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $adm_year10 = number_format(cleanString($adm_year9) + (cleanString($adm_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Marketing & Promotions</td>
								<td>${!! $mark_p = $in_exp->marketing_proforma !!}</td>
								<td>${!! $mark_p_year2 = number_format(cleanString($mark_p) + (cleanString($mark_p)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year3 = number_format(cleanString($mark_p_year2) + (cleanString($mark_p_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year4 = number_format(cleanString($mark_p_year3) + (cleanString($mark_p_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year5 = number_format(cleanString($mark_p_year4) + (cleanString($mark_p_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year6 = number_format(cleanString($mark_p_year5) + (cleanString($mark_p_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year7 = number_format(cleanString($mark_p_year6) + (cleanString($mark_p_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year8 = number_format(cleanString($mark_p_year7) + (cleanString($mark_p_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year9 = number_format(cleanString($mark_p_year8) + (cleanString($mark_p_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mark_p_year10 = number_format(cleanString($mark_p_year9) + (cleanString($mark_p_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Repairs & Maintenance</td>
								<td>${!! $rep_m = $in_exp->maintenance_proforma !!}</td>
								<td>${!! $rep_m_year2 = number_format(cleanString($rep_m) + (cleanString($rep_m)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year3 = number_format(cleanString($rep_m_year2) + (cleanString($rep_m_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year4 = number_format(cleanString($rep_m_year3) + (cleanString($rep_m_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year5 = number_format(cleanString($rep_m_year4) + (cleanString($rep_m_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year6 = number_format(cleanString($rep_m_year5) + (cleanString($rep_m_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year7 = number_format(cleanString($rep_m_year6) + (cleanString($rep_m_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year8 = number_format(cleanString($rep_m_year7) + (cleanString($rep_m_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year9 = number_format(cleanString($rep_m_year8) + (cleanString($rep_m_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rep_m_year10 = number_format(cleanString($rep_m_year9) + (cleanString($rep_m_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Contracts</td>
								<td>${!! $cont = $in_exp->contract_services_proforma !!}</td>
								<td>${!! $cont_year2 = number_format(cleanString($cont) + (cleanString($cont)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year3 = number_format(cleanString($cont_year2) + (cleanString($cont_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year4 = number_format(cleanString($cont_year3) + (cleanString($cont_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year5 = number_format(cleanString($cont_year4) + (cleanString($cont_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year6 = number_format(cleanString($cont_year5) + (cleanString($cont_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year7 = number_format(cleanString($cont_year6) + (cleanString($cont_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year8 = number_format(cleanString($rep_m_year7) + (cleanString($rep_m_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year9 = number_format(cleanString($rep_m_year8) + (cleanString($rep_m_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $cont_year10 = number_format(cleanString($rep_m_year9) + (cleanString($rep_m_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Utilities</td>
								<td>${!! $ut = $in_exp->utilities_proforma !!}</td>
								<td>${!! $ut_year2 = number_format(cleanString($ut) + (cleanString($ut)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year3 = number_format(cleanString($ut_year2) + (cleanString($ut_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year4 = number_format(cleanString($ut_year3) + (cleanString($ut_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year5 = number_format(cleanString($ut_year4) + (cleanString($ut_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year6 = number_format(cleanString($ut_year5) + (cleanString($ut_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year7 = number_format(cleanString($ut_year6) + (cleanString($ut_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year8 = number_format(cleanString($ut_year7) + (cleanString($ut_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year9 = number_format(cleanString($ut_year8) + (cleanString($ut_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ut_year10 = number_format(cleanString($ut_year9) + (cleanString($ut_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Internet/Cable</td>
								<td>${!! $ic = $yp->internet_cable !!}</td>
								<td>${!! $ic_year2 = number_format(cleanString($ic) + (cleanString($ic)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year3 = number_format(cleanString($ic_year2) + (cleanString($ic_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year4 = number_format(cleanString($ic_year3) + (cleanString($ic_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year5 = number_format(cleanString($ic_year4) + (cleanString($ic_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year6 = number_format(cleanString($ic_year5) + (cleanString($ic_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year7 = number_format(cleanString($ic_year6) + (cleanString($ic_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year8 = number_format(cleanString($ic_year7) + (cleanString($ic_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year9 = number_format(cleanString($ic_year8) + (cleanString($ic_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ic_year10 = number_format(cleanString($ic_year9) + (cleanString($ic_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Management Fee</td>
								<td>${!! $mf = $in_exp->onsite_management_proforma !!}</td>
								<td>${!! $mf_year2 = number_format(cleanString($mf) + (cleanString($mf)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year3 = number_format(cleanString($mf_year2) + (cleanString($mf_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year4 = number_format(cleanString($mf_year3) + (cleanString($mf_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year5 = number_format(cleanString($mf_year4) + (cleanString($mf_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year6 = number_format(cleanString($mf_year5) + (cleanString($mf_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year7 = number_format(cleanString($mf_year6) + (cleanString($mf_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year8 = number_format(cleanString($mf_year7) + (cleanString($mf_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year9 = number_format(cleanString($mf_year8) + (cleanString($mf_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $mf_year10 = number_format(cleanString($mf_year9) + (cleanString($mf_year9)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Insurance</td>
								<td>${!! $ins = $in_exp->insurance_proforma !!}</td>
								<td>${!! $ins_year2 = number_format(cleanString($ins) + (cleanString($ins)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year3 = number_format(cleanString($ins_year2) + (cleanString($ins_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year4 = number_format(cleanString($ins_year3) + (cleanString($ins_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year5 = number_format(cleanString($ins_year4) + (cleanString($ins_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year6 = number_format(cleanString($ins_year5) + (cleanString($ins_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year7 = number_format(cleanString($ins_year6) + (cleanString($ins_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year8 = number_format(cleanString($ins_year7) + (cleanString($ins_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year9 = number_format(cleanString($ins_year8) + (cleanString($ins_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $ins_year10 = number_format(cleanString($ins_year9) + (cleanString($ins_year7)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr>
								<td>Real Estate Taxes</td>
								<td>${!! $rst = $in_exp->real_estate_taxes_proforma !!}</td>
								<td>${!! $rst_year2 = number_format(cleanString($rst) + (cleanString($rst)*(!empty($y_2) ? $y_2->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year3 = number_format(cleanString($rst_year2) + (cleanString($rst_year2)*(!empty($y_3) ? $y_3->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year4 = number_format(cleanString($rst_year3) + (cleanString($rst_year3)*(!empty($y_4) ? $y_4->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year5 = number_format(cleanString($rst_year4) + (cleanString($rst_year4)*(!empty($y_5) ? $y_5->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year6 = number_format(cleanString($rst_year5) + (cleanString($rst_year5)*(!empty($y_6) ? $y_6->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year7 = number_format(cleanString($rst_year6) + (cleanString($rst_year6)*(!empty($y_7) ? $y_7->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year8 = number_format(cleanString($rst_year7) + (cleanString($rst_year7)*(!empty($y_8) ? $y_8->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year9 = number_format(cleanString($rst_year8) + (cleanString($rst_year8)*(!empty($y_9) ? $y_9->total_operating_expenses/100 : '0.03'))) !!}</td>
								<td>${!! $rst_year10 = number_format(cleanString($rst_year9) + (cleanString($rst_year7)*(!empty($y_10) ? $y_10->total_operating_expenses/100 : '0.03'))) !!}</td>
							</tr>
							<tr class="text-bold bg-light">
								<td>Operating Expense</td>
								<td>${{$op_exp = number_format(cleanString($p_f) + cleanString($o_m) + cleanString($adm) + cleanString($mark_p) + cleanString($rep_m) + cleanString($cont) + cleanString($ut) + cleanString($ic) + cleanString($mf) + cleanString($ins) + cleanString($rst))}}</td>
								<td>${{$op_exp_year2 = number_format(cleanString($p_f_year2) + cleanString($o_m_year2) + cleanString($adm_year2) + cleanString($mark_p_year2) + cleanString($rep_m_year2)  + cleanString($cont_year2) + cleanString($ut_year2) + cleanString($ic_year2) + cleanString($mf_year2) + cleanString($ins_year2) + cleanString($rst_year2))}}</td>
								<td>${{$op_exp_year3 = number_format(cleanString($p_f_year3) + cleanString($o_m_year3) + cleanString($adm_year3) + cleanString($mark_p_year3) + cleanString($rep_m_year3)  + cleanString($cont_year3) + cleanString($ut_year3) + cleanString($ic_year3) + cleanString($mf_year3) + cleanString($ins_year3) + cleanString($rst_year3))}}</td>
								<td>${{$op_exp_year4 = number_format(cleanString($p_f_year4) + cleanString($o_m_year4) + cleanString($adm_year4) + cleanString($mark_p_year4) + cleanString($rep_m_year4)  + cleanString($cont_year4) + cleanString($ut_year4) + cleanString($ic_year4) + cleanString($mf_year4) + cleanString($ins_year4) + cleanString($rst_year4))}}</td>
								<td>${{$op_exp_year5 = number_format(cleanString($p_f_year5) + cleanString($o_m_year5) + cleanString($adm_year5) + cleanString($mark_p_year5) + cleanString($rep_m_year5)  + cleanString($cont_year5) + cleanString($ut_year5) + cleanString($ic_year5) + cleanString($mf_year5) + cleanString($ins_year5) + cleanString($rst_year5))}}</td>
								<td>${{$op_exp_year6 = number_format(cleanString($p_f_year6) + cleanString($o_m_year6) + cleanString($adm_year6) + cleanString($mark_p_year6) + cleanString($rep_m_year6)  + cleanString($cont_year6) + cleanString($ut_year6) + cleanString($ic_year6) + cleanString($mf_year6) + cleanString($ins_year6) + cleanString($rst_year6))}}</td>
								<td>${{$op_exp_year7 = number_format(cleanString($p_f_year7) + cleanString($o_m_year7) + cleanString($adm_year7) + cleanString($mark_p_year7) + cleanString($rep_m_year7)  + cleanString($cont_year7) + cleanString($ut_year7) + cleanString($ic_year7) + cleanString($mf_year7) + cleanString($ins_year7) + cleanString($rst_year7))}}</td>
								<td>${{$op_exp_year8 = number_format(cleanString($p_f_year8) + cleanString($o_m_year8) + cleanString($adm_year8) + cleanString($mark_p_year8) + cleanString($rep_m_year8)  + cleanString($cont_year8) + cleanString($ut_year8) + cleanString($ic_year8) + cleanString($mf_year8) + cleanString($ins_year8) + cleanString($rst_year8))}}</td>
								<td>${{$op_exp_year9 = number_format(cleanString($p_f_year9) + cleanString($o_m_year9) + cleanString($adm_year9) + cleanString($mark_p_year9) + cleanString($rep_m_year9)  + cleanString($cont_year9) + cleanString($ut_year9) + cleanString($ic_year9) + cleanString($mf_year9) + cleanString($ins_year9) + cleanString($rst_year9))}}</td>
								<td>${{$op_exp_year10 = number_format(cleanString($p_f_year10) + cleanString($o_m_year10) + cleanString($adm_year10) + cleanString($mark_p_year10) + cleanString($rep_m_year10)  + cleanString($cont_year10) + cleanString($ut_year10) + cleanString($ic_year10) + cleanString($mf_year10) + cleanString($ins_year10) + cleanString($rst_year10))}}</td>
							</tr>
							<tr class="bg-blue">
								<td>Net Operating Income</td>
								<td>${{$n_op_in = $in_exp->net_operating_income_proforma }}</td>
								<td>${{$n_op_in_year2 = number_format(cleanString($e_g_in_year2) - (cleanString($op_exp_year2)))}}</td>
								<td>${{$n_op_in_year3 = number_format(cleanString($e_g_in_year3) - (cleanString($op_exp_year3)))}}</td>
								<td>${{$n_op_in_year4 = number_format(cleanString($e_g_in_year4) - (cleanString($op_exp_year4)))}}</td>
								<td>${{$n_op_in_year5 = number_format(cleanString($e_g_in_year5) - (cleanString($op_exp_year5)))}}</td>
								<td>${{$n_op_in_year6 = number_format(cleanString($e_g_in_year6) - (cleanString($op_exp_year6)))}}</td>
								<td>${{$n_op_in_year7 = number_format(cleanString($e_g_in_year7) - (cleanString($op_exp_year7)))}}</td>
								<td>${{$n_op_in_year8 = number_format(cleanString($e_g_in_year8) - (cleanString($op_exp_year8)))}}</td>
								<td>${{$n_op_in_year9 = number_format(cleanString($e_g_in_year9) - (cleanString($op_exp_year9)))}}</td>
								<td>${{$n_op_in_year10 = number_format(cleanString($e_g_in_year10) - (cleanString($op_exp_year10)))}}</td>
							</tr>
							<tr>
								<td>Reserves & Replacements</td>
								<td>${!! $res_rep = $in_exp->reserves_proforma !!}</td>
								<td>${!! $res_rep_year2 = number_format(cleanString($res_rep) + (cleanString($res_rep)*0.03)) !!}</td>
								<td>${!! $res_rep_year3 = number_format(cleanString($res_rep_year2) + (cleanString($res_rep_year2)*0.03)) !!}</td>
								<td>${!! $res_rep_year4 = number_format(cleanString($res_rep_year3) + (cleanString($res_rep_year3)*0.03)) !!}</td>
								<td>${!! $res_rep_year5 = number_format(cleanString($res_rep_year4) + (cleanString($res_rep_year4)*0.03)) !!}</td>
								<td>${!! $res_rep_year6 = number_format(cleanString($res_rep_year5) + (cleanString($res_rep_year5)*0.03)) !!}</td>
								<td>${!! $res_rep_year7 = number_format(cleanString($res_rep_year6) + (cleanString($res_rep_year6)*0.03)) !!}</td>
								<td>${!! $res_rep_year8 = number_format(cleanString($res_rep_year7) + (cleanString($res_rep_year7)*0.03)) !!}</td>
								<td>${!! $res_rep_year9 = number_format(cleanString($res_rep_year8) + (cleanString($res_rep_year8)*0.03)) !!}</td>
								<td>${!! $res_rep_year10 = number_format(cleanString($res_rep_year9) + (cleanString($res_rep_year9)*0.03)) !!}</td>
							</tr>
							<tr class="bg-blue">
								<td>Net Cash Flow After Reserves</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="table-head">
								<td></td>
								<td>Pro Forma</td>
								<td>Year 2</td>
								<td>Year 3</td>
								<td>Year 4</td>
								<td>Year 5</td>
								<td>Year 6</td>
								<td>Year 7</td>
								<td>Year 8</td>
								<td>Year 9</td>
								<td>Year 10</td>
							</tr>
							 @if($proj_increments->isNotEmpty())
							<tr>
								<td>Projecting Increase in Market Rents</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->market_rents}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Loss to Lease</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->loss_to_lease}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Vacancy Loss</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->vacancy_loss}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Concessions</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->concessions}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Non Revenue Units</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->non_revenue_units}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Other Income</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->other_income}}%</td>
								@endforeach
							</tr>
							<tr>
								<td>Total Operating Expense</td>
								@foreach($proj_increments as $proj)
									<td>{{$proj->total_operating_expenses}}%</td>
								@endforeach
							</tr>
							 @else
								 <tr>
									 <td>Projecting Increase in Market Rents</td>
									 <td>0</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
								 </tr>
								 <tr>
									 <td>Loss to Lease</td>
									 <td>0</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
								 </tr>
								 <tr>
									 <td>Vacancy Loss</td>
									 <td>0</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
								 </tr>
								 <tr>
									 <td>Concessions</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
									 <td>1%</td>
								 </tr>
								 <tr>
									 <td>Non Revenue Units</td>
									 <td>0%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
								 </tr>
								 <tr>
									 <td>Other Income</td>
									 <td>0%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
								 </tr>
								 <tr>
									 <td>Total Operating Expense</td>
									 <td>0%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
									 <td>3%</td>
								 </tr>
							 @endif
						</table>
						</div>
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