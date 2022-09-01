<div class="page w-100 padding-zero">
	<div class="div-header">
		<div class="page-header page-2-header">
			<h1>PROPERTY DESCRIPTION</h1>
		</div>
	</div>
	<div class="main" style="padding: 20px 50px 0 50px;">
		<div class="flex-height flex-box">
			<div class="div-block">
				<div class="container-fluid">
					<h3>{{$gallery_title}}</h3>
					<div class="row">
						@foreach($gallery as $image)
							<div style="width: 30%; margin-left: 42px;  @if($loop->iteration%3==0) float: right; margin-right: 0; @else float: left; @endif margin-bottom: 70px; height: 245px;"><img src="{{Storage::disk('s3')->url('assets/'.$image)}}" alt="img"/></div>
						@endforeach
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