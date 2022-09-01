@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new  Memorandum</a></li>
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
                                <h3>CAP GRM Graph</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.recent-sales.graphs',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">CAP RATE GRAPH</label>
                                                <div id="container" style = "width: 750px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="capRateAvg" name="avg_cap_rate" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">GRM RATE GRAPH <em>*</em></label>
                                                <div id="containerGRM" style = "width: 750px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="grmRateAvg" name="avg_grm_rate" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('recent-sales.index', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-26-cap-grm.jpg') }}" class="img-responsive">
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
                ['', 'Cap Rate', 'Average'],
                ['Subject',{{$pf->cap_rate_current}},{{$avg_cap}}],
                @foreach($recent_sales as $sale)
                ['{{$loop->iteration}}',{{$sale->cap_rate}},{{$avg_cap}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Cap Rate ({{$avg_cap}}%)',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0.00, f:'0.00%'},{v:1.00, f:'1.00%'},{v:2.00, f:'2.00%'},{v:3.00, f:'3.00%'},{v:4.00, f:'4.00%'},{v:5.00, f:'5.00%'},{v:6.00, f:'6.00%'},{v:7.00, f:'7.00%'}]
                }
            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('capRateAvg').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        function drawGRMChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', 'GRM', 'Average'],
                ['Subject',{{$pf->grm_current}},{{$avg_grm}}],
                @foreach($recent_sales as $sale)
                ['{{$loop->iteration}}',{{$sale->grm}},{{$avg_grm}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average GRM Rate ({{$avg_grm}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0.00, f:'0.00'},{v:2.00, f:'2.00'},{v:4.00, f:'4.00'},{v:6.00, f:'6.00'},{v:8.00, f:'8.00'},{v:10.00, f:'10.00'},{v:12.00, f:'12.00'},{v:14.00, f:'14.00'}]
                }

            };
            var chart_div = document.getElementById('containerGRM');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart2Img" src="' + chart.getImageURI() + '">';
                document.getElementById('grmRateAvg').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawGRMChart);
    </script>
@endpush
