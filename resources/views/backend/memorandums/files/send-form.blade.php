@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new Offering Memorandum</a></li>
            </ul>
        </div>
    </div>
    <div class="row relative-row">

        @include('flash-notifications.form-errors')

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
                                <h3>Memorandum PDF File</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-8">
                                    <form action="{{route('memo.file.sent')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="file_id" value="{{$file->id}}" />
                                        <input type="hidden" name="memorandum_id" value="{{$file->memorandum_id}}" />
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">First Name <em>*</em></label>
                                                <input type="text" name="first_name" class="form-control" placeholder="First Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Last Name <em>*</em></label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Email Address <em>*</em></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email Address" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('memo.files') }}" class="btn btn-danger" style="margin-left: 15px;">Back</a>
                                                    <button type="submit" name="submit" class="btn btn-action pull-right" value="save" style="margin-right: 15px;">Send File</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection