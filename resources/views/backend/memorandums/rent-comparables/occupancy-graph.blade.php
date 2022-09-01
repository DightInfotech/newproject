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
                                    <form action="{{route('update.rent-comparable.occupancy.graphs',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Occupancy GRAPH</label>
                                                <div id="container" style = "width: 650px; height: 400px; margin: 0 auto">
                                                </div>
                                                <input type="hidden" id="occupancyAvg" name="avg_occupancy" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Occupancy Graphical Image</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img @if(isset($rec->occupancy_graph2_image)) style="display: block;" @else style="display:none;" @endif id="img-1" src="{{isset($rec->occupancy_graph2_image) ? Storage::disk('s3')->url('assets/'.$rec->occupancy_graph2_image) : ''}}" alt="Occupancy graph" width="200" height="200" />
                                                <span class="inputs-note">Image must be upload of dimensions 487 * 437 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="occupancy_graph2_image" id="hidden-field-1" value="{{isset($rec->occupancy_graph2_image) ? $rec->occupancy_graph2_image : ''}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('rent-comparable.index', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-32-occupancy.jpg') }}" class="img-responsive">
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
                ['', 'Occupancy', 'Average'],
                @foreach($rent_comparables as $rent)
                ['{{$loop->iteration}}',{{$rent->occupancy}},{{$avg_occup}}],
                @endforeach

            ]);

            // Set chart options
            var options = {
                title : 'Average Occupancy Rate ({{number_format($avg_occup)}}%)',
                seriesType: 'bars',
                colors: ['skyblue','purple'],
                series: {1: {type: 'line'}},
                gridlineColor: '#fff',
                vAxis: {
                    ticks: [{v:50, f:'50.00%'},{v:60, f:'60.00%'},{v:70, f:'70.00%'},{v:80, f:'80.00%'},{v:90, f:'90.00%'},{v:100, f:'100.00%'}]
                }
            };
            var chart_div = document.getElementById('container');
            // Instantiate and draw the chart.
            var chart = new google.visualization.ComboChart(chart_div);
            google.visualization.events.addListener(chart, 'ready', function () {
                chart_div.innerHTML = '<img id="chart1Img" src="' + chart.getImageURI() + '">';
                document.getElementById('occupancyAvg').value = chart.getImageURI();
            });
            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawChart);
    </script>
    <script>
        $(document).ready(function () {
            Dropzone.options.myAwesomeDropzone = {
                uploadMultiple: false,
                maxFilesize: 30,
                success: function (p1) {
                    var tmp = $("#tmp1").val();
                    var image_name = jQuery.parseJSON(p1.xhr.response);
                    $("#hidden-field-" + tmp).val(image_name.data);
                    $("#img-" + tmp).attr('src', '{{Storage::disk('s3')->url('assets/')}}' + image_name.data);
                    $("#img-" + tmp).show();
                    $("#m_modal_4").modal('hide');
                }
            };

            function processEvent() {
                $('#myAwesomeDropzone').get(0).dropzone.processQueue();
            }
        });
    </script>
@endpush
