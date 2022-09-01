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
                                <h3>Property Summary</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.description.summary',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Parcel Number <em>*</em></label>
                                                <input type="text" name="parcel_number" class="form-control" placeholder="Parcel Number" value="{{isset($rec->parcel_number) ? $rec->parcel_number : old('parcel_number')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Zoning <em>*</em></label>
                                                <input type="text" name="zoning" class="form-control" placeholder="Zoning" value="{{isset($rec->zoning) ? $rec->zoning :  old('zoning')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Type of Ownership <em>*</em></label>
                                                <input type="text" name="type_of_ownership" class="form-control" placeholder="Type of Ownership" value="{{isset($rec->type_of_ownership) ? $rec->type_of_ownership : old('type_of_ownership')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Density Units Per Acre <em>*</em></label>
                                                <input type="text" name="density_units_per_acre" class="form-control" placeholder="Density Units per Acre" value="{{isset($rec->density_units_per_acre) ? $rec->density_units_per_acre : old('density_units_per_acre')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Parking <em>*</em></label>
                                                <input type="text" name="parking" class="form-control" placeholder="Parking" value="{{isset($rec->parking) ? $rec->parking : old('parking')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Parking Ratio <em>*</em></label>
                                                <input type="text" name="parking_ratio" class="form-control" placeholder="Parking Ratio" value="{{isset($rec->parking_ratio) ? $rec->parking_ratio : old('parking_ratio')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Landscaping <em>*</em></label>
                                                <input type="text" name="landscaping" class="form-control" placeholder="Landscaping" value="{{isset($rec->landscaping) ? $rec->landscaping : old('landscaping')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Topography <em>*</em></label>
                                                <input type="text" name="topography" class="form-control" placeholder="Topography" value="{{isset($rec->topography) ? $rec->topography : old('topography')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Water <em>*</em></label>
                                                <input type="text" name="water" class="form-control" placeholder="Water" value="{{isset($rec->water) ? $rec->water : old('water')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Electric <em>*</em></label>
                                                <input type="text" name="electric" class="form-control" placeholder="Electric" value="{{isset($rec->electric) ? $rec->electric : old('electric')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Gas <em>*</em></label>
                                                <input type="text" name="gas" class="form-control" placeholder="Gas" value="{{isset($rec->gas) ? $rec->gas : old('gas')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Foundation <em>*</em></label>
                                                <input type="text" name="foundation" class="form-control" placeholder="Foundation" value="{{isset($rec->foundation) ? $rec->foundation : old('foundation')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Framing <em>*</em></label>
                                                <input type="text" name="framing" class="form-control" placeholder="Framing" value="{{isset($rec->framing) ? $rec->framing : old('framing')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Exterior <em>*</em></label>
                                                <input type="text" name="exterior" class="form-control" placeholder="Exterior" value="{{isset($rec->exterior) ? $rec->exterior : old('exterior')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Parking Surface <em>*</em></label>
                                                <input type="text" name="parking_surface" class="form-control" placeholder="Parking Surface" value="{{isset($rec->parking_surface) ? $rec->parking_surface : old('parking_surface')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Roof <em>*</em></label>
                                                <input type="text" name="roof" class="form-control" placeholder="Roof" value="{{isset($rec->roof) ? $rec->roof : old('roof')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">HVAC <em>*</em></label>
                                                <input type="text" name="hvac" class="form-control" placeholder="Hvac" value="{{isset($rec->hvac) ? $rec->hvac : old('hvac')}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.investment.highlights.more', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">NEXT/SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-20.jpg') }}" class="img-responsive">
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
