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
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="col-sm-8 clarfix title-col">
                                        <h3>Memorandum Demographic Pages</h3>
                                    </div>
                                    <form action="{{route('store.demographic-pages')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />`
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Select Template<em>*</em></label>
                                                <select name="template" class="form-control" onchange="return templateSelected(this.value);" required>
                                                    <option value="">Select Template</option>
                                                    <option value="1C">One Image</option>
                                                    <option value="2P">Two Images</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Title<em>*</em></label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Page Title Here"  />
                                            </div>
                                        </div>
                                        <div class="row template_wrapper" id="1C">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                    <img style="display: none;" id="img-1" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 1300 * 940 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-1" value="">
                                            </div>
                                        </div>
                                        <div class="row template_wrapper" id="2P">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-3" onclick="openModal(this, 3)">Select Image</button>
                                                    <img style="display: none;" id="img-3" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 835 * 940 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-3" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-4" onclick="openModal(this, 4)">Select Image</button>
                                                    <img style="display: none;" id="img-4" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 835 * 940 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-4" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.demographic-pages', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">SAVE
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
             $(".template_wrapper").hide();
             $("#"+value).show();
         }
    </script>
@endpush
