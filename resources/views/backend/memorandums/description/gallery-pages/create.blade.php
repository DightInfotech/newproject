@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Gallery Pages</a></li>
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
                                        <h3>Memorandum Gallery Pages</h3>
                                    </div>
                                    <form action="{{route('store.gallery-pages')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />`
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Select Template<em>*</em></label>
                                                <select name="template" class="form-control" onchange="return templateSelected(this.value);" required>
                                                    <option value="">Select Template</option>
                                                    <option value="2L">Two Landscape Images</option>
                                                    <option value="2P">Two Portrait Images</option>
                                                    <option value="6I">Six Images</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Enter Title<em>*</em></label>
                                                <input type="text" name="title" class="form-control" placeholder="Enter Page Title Here" required />
                                            </div>
                                        </div>
                                        <div class="row template_wrapper" id="2L">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                    <img style="display: none;" id="img-1" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 1300 * 335 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-1" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                    <img style="display: none;" id="img-2" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 1300 * 335 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-2" value="">
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
                                        <div class="row template_wrapper" id="6I">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-5" onclick="openModal(this, 5)">Select Image</button>
                                                    <img style="display: none;" id="img-5" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-5" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-6" onclick="openModal(this, 6)">Select Image</button>
                                                    <img style="display: none;" id="img-6" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-6" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-7" onclick="openModal(this, 7)">Select Image</button>
                                                    <img style="display: none;" id="img-7" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-7" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-8" onclick="openModal(this, 8)">Select Image</button>
                                                    <img style="display: none;" id="img-8" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-8" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-9" onclick="openModal(this, 9)">Select Image</button>
                                                    <img style="display: none;" id="img-9" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-9" value="">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Select Image</label>
                                                    <button class="btn btn-primary" id="select-image-10" onclick="openModal(this, 10)">Select Image</button>
                                                    <img style="display: none;" id="img-10" src="" alt="Image" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 577 * 500 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="images[]" id="hidden-field-10" value="">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.gallery-pages', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-20-gallery.jpg') }}" class="img-responsive">
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
