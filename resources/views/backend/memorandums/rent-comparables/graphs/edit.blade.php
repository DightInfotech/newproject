@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Rent Comparable Graphs</a></li>
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
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="col-sm-8 clarfix title-col">
                                        <h3>Rent Comparable Graph</h3>
                                    </div>
                                    <form action="{{route('rent-comparables.graphs.update',$graph->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />`
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Page Title<em>*</em></label>
                                                <input type="text" name="page_title" class="form-control" placeholder="Enter Page Title Here" value="{{$graph->page_title}}"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Graph Title<em>*</em></label>
                                                <input type="text" name="graph_title" class="form-control" placeholder="Enter Title Here" value="{{$graph->graph_title}}"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Graph Indication Label<em>*</em></label>
                                                <input type="text" name="graph_label" class="form-control" placeholder="Enter Label Here" value="{{$graph->graph_label}}"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Graph Y-Axis Values <em>*</em></label>
                                                <input type="text" name="y_axis" class="form-control" placeholder="Enter Comma Separated Values" value="{{$graph->y_axis}}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Properties <em>*</em></label>
                                                <input type="text" name="x_axis" class="form-control" placeholder="Enter Comma Separated Values" value="{{$graph->x_axis}}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Property Values <em>*</em></label>
                                                <input type="text" name="graph_values" class="form-control" placeholder="Enter Comma Separated Values" value="{{$graph->graph_values}}" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div id="container" style = "width: 750px; height: 400px; margin: 0 auto">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('rent-comparables.graphs.index', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">SAVE GRAPH
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="graphImg" name="graph_image" value="{{$graph->graph_image}}" />
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
@endsection
@push('js')
    <script type="text/javascript" src="{{asset('pdf-assets/js/loader.js')}}"></script>
    <script type = "text/javascript">
        google.charts.load('current', {packages: ['corechart']});
    </script>
    <script language = "JavaScript">
        function drawChart() {
            // Define the chart to be drawn.
            @php
                $y_axis = explode(',',$graph->y_axis);
                $x_axis = explode(',',$graph->x_axis);
                $g_values = explode(',',$graph->graph_values);
            @endphp
            var data = google.visualization.arrayToDataTable([
                ['', '{{$graph->graph_label}}', 'Average'],
                @for($i=0;$i<count($g_values);$i++)
                ['{{$x_axis[$i]}}',{{$g_values[$i]}},{{str_replace(',','',$graph->avg_value)}}],
                @endfor

            ]);

            // Set chart options
            var options = {
                title : '{{$graph->graph_title}}({{$graph->avg_value}})',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [@for($i=0;$i<count($y_axis);$i++) @php $numeric_val = filter_var($y_axis[$i], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); @endphp{v:{{$numeric_val}}, f:'{{$y_axis[$i]}}'},@endfor]
                }
            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('graphImg').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
    </script>
@endpush
