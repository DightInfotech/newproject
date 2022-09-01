
@extends("layouts.system")
@section("content")
    <div class="row relative-row">

        @include('flash-notifications.form-errors')
        @include('flash-notifications.message')

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
                                <h3>Report an issue</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-6">
                                    <form action="{{route('report.store')}}" method="post" enctype="multipart/form-data">
                                        {!! csrf_field() !!}
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Full Name <em>*</em></label>
                                                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ old('name') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Email <em>*</em></label>
                                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Phone <em>*</em></label>
                                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Report <em>*</em></label>
                                                <textarea name="report" class="form-control editor" cols="80"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-left: 15px">
                                                    <div class="form-group" style="margin-left: 15px">
                                                        <button type="submit" name="submit" class="btn btn-action pull-right" value="save" style="margin-right: 15px;">Submit</button>
                                                    </div>
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
@endsection
@push('js')
    <script>
        $(".editor").redactor();
    </script>
@endpush