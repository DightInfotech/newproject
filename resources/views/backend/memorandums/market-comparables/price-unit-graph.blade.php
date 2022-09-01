@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new  Market Analysis</a></li>
            </ul>
        </div>
    </div>
    <div class="row relative-row">

        @include('flash-notifications.form-errors')
        @include('flash-notifications.progress-bar')


        <div class="col-sm-12">
            <div class="top-col-wide">
                <div class="right-buttons">
                    <ul>
                        <!-- <li><a href="#" class="btn btn-border-green">Save Page</a></li> -->
                    </ul>
                </div>
            </div>
            <div class="job-wrapper">
                <div class="form-section">
                    <div class="basics-section">
                        <div class="row">
                            <div class="col-sm-8 clarfix title-col">
                                <h3>Price/SF & Price/Unit</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.market-comparable.price.graphs',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Price Per SF</label>
                                                <div id="container" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="priceSf" name="avg_price_sf" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Price Per Unit <em>*</em></label>
                                                <div id="containerUnit" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="priceUnit" name="avg_price_unit" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.market-comparable.graphs', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">NEXT/SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tmp1" value="">
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-27-price-sf.jpg') }}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('backend.modal.index')
@endsection
@push('js')
    <script type="text/javascript" src="{{asset('pdf-assets/js/loader.js')}}"></script>
    <script type = "text/javascript">
        google.charts.load('current', {packages: ['corechart']});
    </script>
    <script language = "JavaScript">
        function drawChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', 'Price/SF', 'Average'],
                ['Subject',{{str_replace(',','',$pf->price_per_sf)}},{{$avg_price_sf}}],
                @foreach($market_comparables as $sale)
                [{{$loop->iteration}},{{str_replace(',','',$sale->price_per_sf)}},{{$avg_price_sf}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Price/SF ({{$avg_price_sf}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0, f:'$0.00'},{v:50, f:'$50.00'},{v:100, f:'$100.00'},{v:150, f:'$150.00'},{v:200, f:'$200.00'},{v:250, f:'$250.00'},{v:300, f:'$300.00'}]
                }
            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('priceSf').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        function drawUnitChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', 'Price/Unit', 'Average'],
                ['Subject',{{str_replace(',','',$pf->price_per_unit)}},{{$avg_price_unit}}],
                @foreach($market_comparables as $sale)
                [{{$loop->iteration}},{{str_replace(',','',$sale->price_per_unit)}},{{$avg_price_unit}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Price/Unit ({{number_format($avg_price_unit,0,'',',')}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:100000, f:'$100,000'},{v:105000, f:'$105,000'},{v:110000, f:'$110,000'},{v:115000, f:'$115,000'},{v:120000, f:'$120,000'},{v:125000, f:'$125,000'},{v:130000, f:'$130,000'}]
                }

            };
            var chart_div = document.getElementById('containerUnit');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart2Img" src="' + chart.getImageURI() + '">';
                document.getElementById('priceUnit').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawUnitChart);
    </script>
@endpush
