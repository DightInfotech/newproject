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
        @include('flash-notifications.first-progress-bar')
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
                                    <form action="{{route('store.memo')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Property Title <em>*</em></label>
                                                <input id="property_title" type="text" name="property_title" class="form-control" placeholder="Property Title" value="{{ old('property_title') }}" onInput="showPropertyTitle(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Street Address <em>*</em></label>
                                                <input id="property_address" type="text" name="address" class="form-control" placeholder="Street Address" value="{{ old('address') }}" onInput="showPropertyAddress(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">City <em>*</em></label>
                                                <input id="property_city" type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}" onInput="showPropertyCity(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">State <em>*</em></label>
                                                <input id="property_state" type="text" name="state" class="form-control" placeholder="State" value="{{ old('state') }}" onInput="showPropertyState(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Zip Code <em>*</em></label>
                                                <input type="text" name="zip" class="form-control" placeholder="Zip Code" value="{{ old('zip') }}" onInput="showPropertyZip(event)">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-12 text-center">
                                                            <div id="upload-image"></div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <strong>Select Image:</strong>
                                                            <br/>
                                                            <input type="file" id="images">
                                                            <br/>
                                                            <div id="cropped_image" class="btn btn-success cropped_image">Upload Image</div>
                                                        </div>                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Cover Page Photo</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img style="display: none;" src=""  id="img-1"  alt="cover page photo" width="200" height="200" />
                                                <br>
                                                <span class="inputs-note">Image must be upload of dimensions 770 * 776 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="cover_page_image" id="hidden-field-1" value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Subject Property Thumbnail</label>
                                                <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                <img style="display: none;" src=""  id="img-2"  alt="cover page photo" width="200" height="200" />
                                                <br>
                                                <span class="inputs-note">Image must be upload of dimensions 450 * 250 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="subject_property_thumbnail" id="hidden-field-2" value="">
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
                                    <div class="col-sm-12">
                                        <div class="pdfPreview">
                                            <div id="upload-image-i"></div>                                            
                                            <div id="propertytitle" class="propertytitle">{{ ('property_title') }}</div>
                                            <div id="propertyaddress" class="propertyaddress"></div>
                                            <div id="propertycity" class="propertycity"></div>
                                            <div id="propertystate" class="propertystate"></div>
                                            <div id="propertyzip" class="propertyzip"></div>
                                        </div>
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
    <script type="text/javascript">
        
        
        $(document).ready(function () {
            Dropzone.options.myAwesomeDropzone = {
                uploadMultiple: false,
                maxFilesize: 30,
                success: function (p1) {
                    console.log(p1);
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