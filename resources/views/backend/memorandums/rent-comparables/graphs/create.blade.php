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
                                        <h3>Rent Comprable Graph</h3>
                                    </div>
                                    <form action="{{route('rent-comparables.graphs.store')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />`
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Page Title<em>*</em></label>
                                                <input type="text" name="page_title" class="form-control" placeholder="Enter Page Title Here" value=""  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Graph Title<em>*</em></label>
                                                <input type="text" name="graph_title" class="form-control" placeholder="Enter Title Here" value=""  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Graph Indication Label<em>*</em></label>
                                                <input type="text" name="graph_label" class="form-control" placeholder="Enter Label Here" value=""  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Graph Y-Axis Values <em>*</em></label>
                                                <input type="text" name="y_axis" class="form-control" placeholder="Enter Comma Separated Values" value="" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Properties <em>*</em></label>
                                                <input type="text" name="x_axis" class="form-control" placeholder="Enter Comma Separated Values" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Property Values <em>*</em></label>
                                                <input type="text" name="graph_values" class="form-control" placeholder="Enter Comma Separated Values" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('rent-comparables.graphs.index', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">SHOW GRAPH
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
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
