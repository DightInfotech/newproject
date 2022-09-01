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
                                <h3>Property Cover Page Image</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.memo', $memorandum->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Property Title <em>*</em></label>
                                                <input type="text" name="property_title" class="form-control" placeholder="Property Title" value="{{ $memorandum->property_title }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Street Address <em>*</em></label>
                                                <input type="text" name="address" class="form-control" placeholder="Street Address" value="{{ $memorandum->address }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">City <em>*</em></label>
                                                <input type="text" name="city" class="form-control" placeholder="City" value="{{ $memorandum->city }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">State <em>*</em></label>
                                                <input type="text" name="state" class="form-control" placeholder="State" value="{{ $memorandum->state }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Zip Code <em>*</em></label>
                                                <input type="text" name="zip" class="form-control" placeholder="Zip Code" value="{{ $memorandum->zip }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Cover Page Image</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img style="display: {{ ($memorandum->cover_page_image) ? 'block' : 'none' }};" id="img-1" src="{{ Storage::disk('s3')->url('assets/'.$memorandum->cover_page_image) }}" alt="cover page photo" width="200" height="200" />
                                                <span class="inputs-note">Image must be upload of dimensions 770 * 776 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="cover_page_image" id="hidden-field-1" value="{{ ($memorandum->cover_page_image) ? $memorandum->cover_page_image : ''}}">

                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Subject Property Thumbnail</label>
                                                <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                <img style="display: {{ ($memorandum->cover_page_image) ? 'block' : 'none' }};" id="img-2" src="{{ Storage::disk('s3')->url('assets/'.$memorandum->subject_property_thumbnail) }}" alt="Thubmnail" width="200" height="200" />
                                                <br>
                                                <span class="inputs-note">Image must be upload of dimensions 450 * 250 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="subject_property_thumbnail" id="hidden-field-2" value="{{ ($memorandum->subject_property_thumbnail) ? $memorandum->subject_property_thumbnail : ''}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-left: 15px">
                                                    <button type="submit" name="submit" class="btn btn-action" value="save">NEXT/SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tmp1" value="">
                                    </form>

                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-1.jpg') }}" class="img-responsive">
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
    <script>
        $("#role").change( function() {
            if($(this).val() == 2){
                $("#company-name").fadeOut();
            } else{
                $("#company-name").fadeIn();
            }
        });
        $(document).ready(function () {
            Dropzone.options.myAwesomeDropzone = {
                uploadMultiple: false,
                maxFilesize: 30,
                success: function (p1) {
                    var tmp = $("#tmp1").val();
                    var image_name = jQuery.parseJSON(p1.xhr.response);
                    console.log(image_name);
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