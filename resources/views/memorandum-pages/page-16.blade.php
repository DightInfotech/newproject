<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="container-content">
			<h3 class="h3">Property Summary</h3>
			<div class="row">
				<div style="width: 50%; float: left;">
					<div class="fair-table">
						<h4 class="h4">The Offering</h4>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Property</td>
								<td>{!! $memorandum->property_title !!}</td>
							</tr>
							<tr>
								<td>Property Address</td>
								<td>{!! $memorandum->address.' '.$memorandum->city.','. $memorandum->state.' '.$memorandum->zip !!}</td>
							</tr>
							<tr>
								<td>Assessor's Parcel Numbers</td>
								<td>{!! $pd->parcel_number !!}</td>
							</tr>
							<tr>
								<td>Zoning</td>
								<td>{!! $pd->zoning !!}</td>
							</tr>
						</table>
						<h4 class="h4">Site Description</h4>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Number of Units</td>
								<td>{!! $pf->number_of_units !!}</td>
							</tr>
							<tr>
								<td>Number of Buildings</td>
								<td>{!! $pf->number_of_buildings !!}</td>
							</tr>
							<tr>
								<td>Number of Stories</td>
								<td>{!! $pf->number_of_stories !!}</td>
							</tr>
							<tr>
								<td>Year Built</td>
								<td>{!! $pf->year_built !!} @if($pf->year_rennovated) / {!! $pf->year_rennovated !!} (Renovated) @endif</td>
							</tr>
							<tr>
								<td>Rentable Square Feet</td>
								<td>{!! $pf->rentable_square_feet !!}</td>
							</tr>
							<tr>
								<td>Lot Size (Acre)</td>
								<td>{!! $pf->lot_size !!}</td>
							</tr>
							<tr>
								<td>Type of Ownership</td>
								<td>{!! $pd->type_of_ownership !!}</td>
							</tr>
							<tr>
								<td>Density of Units Per Acre</td>
								<td>{!! $pd->density_units_per_acre !!}</td>
							</tr>
							<tr>
								<td>Parking</td>
								<td>{!! $pd->parking!!}</td>
							</tr>
							<tr>
								<td>Parking Ratio</td>
								<td>{!! $pd->parking_ratio !!}</td>
							</tr>
							<tr>
								<td>Landscaping</td>
								<td>{!! $pd->landscaping !!}</td>
							</tr>
							<tr>
								<td>Topography</td>
								<td>{!! $pd->topography !!}</td>
							</tr>
						</table>
					</div>
				</div>
				<div style="width: 45%; float: right;">
					<div class="fair-table">
						<h4 class="h4">Utilities</h4>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Water</td>
								<td>{!! $pd->water !!}</td>
							</tr>
							<tr>
								<td>Electric</td>
								<td>{!! $pd->electric !!}</td>
							</tr>
							<tr>
								<td>Gas</td>
								<td>{!! $pd->gas !!}</td>
							</tr>
						</table>
						<h4 class="h4">Construction</h4>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>Foundation</td>
								<td>{!! $pd->foundation !!}</td>
							</tr>
							<tr>
								<td>Framing</td>
								<td>{!! $pd->framing !!}</td>
							</tr>
							<tr>
								<td>Exterior</td>
								<td>{!! $pd->exterior !!}</td>
							</tr>
							<tr>
								<td>Parking Surface</td>
								<td>{!! $pd->parking_surface !!}</td>
							</tr>
							<tr>
								<td>Roof</td>
								<td>{!! $pd->roof !!}</td>
							</tr>
						</table>
						<h4 class="h4">Mechanical</h4>
						<table cellpadding="0" cellspacing="0">
							<tr>
								<td>HVAC</td>
								<td>{!! $pd->hvac !!}</td>
							</tr>
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