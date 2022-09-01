<div class="page w-100 padding-zero">
<div class="div-header">
			<div class="page-header page-2-header">
			<h1>TABLE OF CONTENTS</h1>
		</div>
</div>
 <div class="main">
	 <div class="center-content">
		 <div class="center-inner">
			 <table cellpadding="0" cellspacing="0">
				 <tbody><tr>
					 <td class="first-td"><span>Pricing &amp; Financial Analysis</span></td>
					 <td align="right"><strong>{{$pricing_section_number}}</strong></td>
				 </tr>
				 <tr>
					 <td class="first-td"><span>Property Description</span></td>
					 <td align="right"><strong>{{$desc_section_number}}</strong></td>
				 </tr>
				 <tr>
					 <td class="first-td"><span>Recent Sales</span></td>
					 <td align="right"><strong>{{$recent_section_number}}</strong></td>
				 </tr>
				 <tr>
					 <td class="first-td"><span>Rent Comparables</span></td>
					 <td align="right"><strong>{{$rent_section_number}}</strong></td>
				 </tr>
				 <tr>
					 <td class="first-td"><span>Demographic Analysis</span></td>
					 <td align="right"><strong>{{$demographic_section_number}}</strong></td>
				 </tr>
				 </tbody></table>
		 </div>
	 </div>
 </div>
</div>
<div class="page-footer">
	<div class="footer-content">
		<div class="footer-logo"><img src="{{base_path('public/pdf-assets/images/footer-logo.jpg')}}" alt="img"/></div>
		<div class="footer-info">{!! $memorandum->footer !!}</div>
		<div class="footer-page-count">
			<span>{{$page_number}}</span>
		</div><br style="clear: both;"/>
	</div>
</div>