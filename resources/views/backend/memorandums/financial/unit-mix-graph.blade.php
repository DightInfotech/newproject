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
                                <h3>Unit Mix Graphs</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.unit-mix.graphs',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Unit Mix</label>
                                                <div id="container" style = "width: 550px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="unitType" name="unit_type_graph" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Unit Mix Rent & SF <em>*</em></label>
                                                <div id="containerRent" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="rentSF" name="unit_rent_sf" value="" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.unit-mix', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-7.jpg') }}" class="img-responsive">
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
                ['Unit Type','Number of Units'],
                @foreach($mix_units as $unit)
                ['{{$unit->unit_type}}',{{$unit->number_of_units}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Unit Mix',
                pieSliceText: 'value',
                slices: {
                    0: { color: 'skyblue' },
                    1: { color: 'lightblue' }
                },


            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.PieChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('unitType').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        function drawRentChart() {
            // Define the chart to be drawn.
            var data = google.visualization.arrayToDataTable([
                ['', 'Rent', 'SquareFeet'],
                @foreach($mix_units as $unit)
                ['{{$unit->unit_type}}',{{str_replace(',','',$unit->current_rent_max)}},{{str_replace(',','',$unit->sq_feet)}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : '',
                seriesType: 'bars',
                colors: ['skyblue','lightblue'],
                /*series: {1: {type: 'line'}},*/
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:0, f:'$0'},{v:500, f:'$500'},{v:1000, f:'$1,000'},{v:1500, f:'$1,500'},{v:2000, f:'$2,000'}]
                }

            };
            var chart_div = document.getElementById('containerRent');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart2Img" src="' + chart.getImageURI() + '">';
                document.getElementById('rentSF').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
        google.charts.setOnLoadCallback(drawRentChart);
    </script>
@endpush
