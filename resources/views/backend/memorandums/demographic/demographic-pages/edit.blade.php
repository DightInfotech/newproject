@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Demographic Pages</a></li>
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
                                <h3>Memorandum Demographic Pages</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.demographic-pages',$rec->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Title<em>*</em></label>
                                                <input type="text" name="title" class="form-control" value="{{$rec->title}}"  />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Selected Template</label>
                                                <input type="hidden" name="template" value="{{$rec->template}}" />
                                                <h3>@if($rec->template == '1C') {{'1 Centered Image Template'}}
                                                    @elseif($rec->template == '2P') {{'Two Portrait Images Template'}}
                                                    @endif
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="row template_wrapper" style="display: block;">
                                            @php $images = json_decode($rec->images); @endphp
                                            @foreach($images as $image)
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-{{$loop->iteration}}" onclick="openModal(this, {{$loop->iteration}})">Select Image</button>
                                                    <img style="display: block;" id="img-{{$loop->iteration}}" src="{{Storage::disk('s3')->url('assets/'.$image)}}" alt="Image" width="200" height="200" />
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-{{$loop->iteration}}" value="{{$image}}">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.demographic-pages', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">UPDATE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tmp1" value="">
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-46.jpg') }}" class="img-responsive">
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
    <style type="text/css">
        #2P,
        #6I{display: none;}
    </style>
@endsection
@push('js')
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
        function templateSelected(value){
            $("#"+value).css('display','block');
            $(".template_wrapper").css("display",'none');
        }
    </script>
@endpush
