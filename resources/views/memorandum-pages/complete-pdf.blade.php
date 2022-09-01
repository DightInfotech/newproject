<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	  {{--<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">--}}
	  <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="{{base_path('public/pdf-assets/css/bootstrap.css')}}">
	  <link rel="stylesheet" href="{{base_path('public/pdf-assets/css/style.css')}}">


    <title>{{$memorandum->property_title}}</title>

	  <style type="text/css">
		  div.pdf-page
		  {
              width: 100%;
              float: left;
			  page-break-after: always;
			  overflow-wrap: normal !important;
			  white-space: normal !important;
			  margin: 0;
			  padding: 0;
		  }
		  /*.lastpage {
			  overflow-wrap: normal !important;
			  white-space: normal !important;
			  margin-bottom: 0;
			  padding-bottom: 0;
		  }*/
	  </style>
  </head>
  <body class="body">
    <div id="page-wrapper">
		@foreach($pages as $page)

			<div class="pdf-page @if($loop->iteration == count($pages)) lastpage @endif">
				{!! $page !!}
			</div>

		@endforeach
            @php
                function cleanString($string){
                    if($string){
                        return $string = str_replace(',','',$string);
                    }else{
                        return 0;
                    }

                }
            @endphp


	</div>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{base_path('public/pdf-assets/js/jquery-3.3.1.min.js')}}"></script>

	{{--<script>
		$(window).resize(function() {
			$(document.body).css("padding-bottom", $(".page-footer").height());
		}).resize();
	</script>--}}
  </body>
</html>