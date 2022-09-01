@extends('layouts.system')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
            <li><a href="#">Jobs</a></li>
        </ul>
    </div>
</div>
<div class="row relative-row">

    @if (session()->has('flash_notification.message'))
        <div class="col-md-12 pull-left alert alert-{{ session('flash_notification.level') }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! session('flash_notification.message') !!}
        </div>
    @endif

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
                            <h3>Add Assets</h3>
                        </div>
                        <div class="col-sm-12 m-t-30"></div>
                        <div class="col-sm-12">
                            <div id="upload" class="tab-pane fade in active">
                                <form action="{{ route('assets.store') }}"
                                      class="dropzone"
                                      id="myAwesomeDropzone">
                                    {!! csrf_field() !!}
                                    <div class="fallback">
                                        <input name="file" type="file" multiple/>
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
@push('js')
    <script>
        $(document).ready(function () {
            Dropzone.options.myAwesomeDropzone = {
                autoProcessQueue: true,
                uploadMultiple: true,
                parallelUploads: 10,
                success: function (data){
                    console.log('success');
                }
            };
            function processEvent() {
                $('#myAwesomeDropzone').get(0).dropzone.processQueue();
            }
        });
    </script>
@endpush