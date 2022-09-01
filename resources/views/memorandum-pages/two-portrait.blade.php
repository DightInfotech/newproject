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
							<div style="width:48%; @if($loop->iteration == 2) float: right; @else float: left; @endif height: 700px;"><img style="width: 99%; height: 700px;" src="{{Storage::disk('s3')->url('assets/'.$image)}}" alt="img"/></div>
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