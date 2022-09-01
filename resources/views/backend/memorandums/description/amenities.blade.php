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
                                <h3>Amenities</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.description.amenities',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Location Amenities <em>*</em></label>
                                                <textarea name="loc_amenities" cols="10" class="form-control js-wysiwyg">{{isset($rec->loc_amenities) ? $rec->loc_amenities : '<ul class="list-circle">
						<li>Secure On-site Parking</li>
						<li>Air Conditioning (Wall Unit)</li>
						<li>Close Schools, & Employment</li>
						<li>Large Closets with Mirror Doors</li>
						<li>Walk-in Closets Available</li>
						<li>Balcony / Patio Available</li>
						<li>Refrigerator, Stove, & Oven</li>
						<li>New Carpet / Dual Paned Windows</li>
						<li>Onsite BBQ Social Areas, Children’s Playground, Pool & On-Site Laundry</li>
					</ul>'}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Amenity Image 1</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img @if(isset($rec->amenity_image1)) style="display: block;" @else style="display:none;" @endif id="img-1" src="{{isset($rec->amenity_image1) ? Storage::disk('s3')->url('assets/'.$rec->amenity_image1) : ''}}" alt="cover page photo" width="200" height="200" />                                            </div>
                                                <span class="inputs-note">Image must be upload of dimensions 577 * 497 </span>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="amenity_image1" id="hidden-field-1" value="{{isset($rec->amenity_image1) ? $rec->amenity_image1 : ''}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Amenity Image 2</label>
                                                <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                <img @if(isset($rec->amenity_image2)) style="display: block;" @else style="display:none;" @endif id="img-2" src="{{isset($rec->amenity_image2) ? Storage::disk('s3')->url('assets/'.$rec->amenity_image2) : ''}}" alt="cover page photo" width="200" height="200" />                                            </div>
                                                <span class="inputs-note">Image must be upload of dimensions 577 * 497 </span>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="amenity_image2" id="hidden-field-2" value="{{isset($rec->amenity_image2) ? $rec->amenity_image2 : ''}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Amenity Image 3</label>
                                                <button class="btn btn-primary" id="select-image-3" onclick="openModal(this, 3)">Select Image</button>
                                                <img @if(isset($rec->amenity_image3)) style="display: block;" @else style="display:none;" @endif id="img-3" src="{{isset($rec->amenity_image3) ? Storage::disk('s3')->url('assets/'.$rec->amenity_image3) : ''}}" alt="cover page photo" width="200" height="200" />                                            </div>
                                                <span class="inputs-note">Image must be upload of dimensions 1183 * 466 </span>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="amenity_image3" id="hidden-field-3" value="{{isset($rec->amenity_image3) ? $rec->amenity_image3 : ''}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Unit Amenities <em>*</em></label>
                                                <textarea name="unit_amenities" class="form-control js-wysiwyg">{{isset($rec->unit_amenities) ? $rec->unit_amenities : old('unit_amenities')}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.summary', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-16-amenties.jpg') }}" class="img-responsive">
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
    </script>
@endpush
