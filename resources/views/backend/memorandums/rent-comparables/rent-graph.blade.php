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
                                <h3>Occupancy & Average Rents</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.rent-comparable.rents.graphs',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Avg Rent 1 BDR 1 Bath</label>
                                                <div id="container" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="avgRent1bd" name="avg_rent_1bd" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Avg Rent 2 BDR 1 Bath <em>*</em></label>
                                                <div id="containerDblBed" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="avgRent2bd" name="avg_rent_2bd" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.rent-comparable.occupancy.graphs', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-33-avg-rents.jpg') }}" class="img-responsive">
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
        function singleBedChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', '1 Bedroom', 'Average'],
                @foreach($br1ba as $rent)
                ['{{$loop->iteration}}',{{str_replace(',','',$rent)}},{{$average_br1ba}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Rent 1 BDR 1 BATH (${{number_format($average_br1ba,2,'.',',')}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0, f:'0'},{v:200, f:'200'},{v:400, f:'400'},{v:600, f:'600'},{v:800, f:'800'},{v:1000, f:'1000'},{v:1200, f:'1200'},{v:1400, f:'1400'}]
                }
            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('avgRent1bd').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        function dblBedChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', '2 Bedroom', 'Average'],
                @foreach($br2ba as $rent)
                ['{{$loop->iteration}}',{{str_replace(',','',$rent)}},{{$average_br2ba}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Rent 2 BDR 1 BATH (${{number_format($average_br2ba)}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0, f:'0'},{v:500, f:'500'},{v:1000, f:'1000'},{v:1500, f:'1500'},{v:2000, f:'2000'}]
                }

            };
            var chart_div = document.getElementById('containerDblBed');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart2Img" src="' + chart.getImageURI() + '">';
                document.getElementById('avgRent2bd').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(singleBedChart);
        google.charts.setOnLoadCallback(dblBedChart);
    </script>
@endpush
