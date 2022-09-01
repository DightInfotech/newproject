@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Unit Mix</a></li>
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
                                <h3>Memorandum Unit Mix</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('store.unit-mix')}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Number of Units<em>*</em></label>
                                                <input type="text" name="number_of_units" class="form-control" placeholder="Number of Units" value="{{old('number_of_units')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Unit Type <em>*</em></label>
                                                <input type="text" name="unit_type" class="form-control" placeholder="Unit Type" value="{{old('unit_type')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Square Feet <em>*</em></label>
                                                <input type="text" name="sq_feet" class="form-control currency-mask" placeholder="Square Feet" value="{{old('sq_feet')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Current Rent Min <em>*</em></label>
                                                <input type="text" name="current_rent_min" class="form-control currency-mask" placeholder="Current Rent Min" value="{{old('current_rent_min')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Current Rent Max <em>*</em></label>
                                                <input type="text" name="current_rent_max" class="form-control currency-mask" placeholder="Current Rent Max" value="{{old('current_rent_max')}}">
                                                <span class="inputs-note">If there is only one number and not a range it should show the actual number</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Rent Per Square Feet <em>*</em></label>
                                                <input type="text" name="rent_per_sf" class="form-control" placeholder="Rent Per Square Feet" value="{{old('rent_per_sf')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Monthly Income <em>*</em></label>
                                                <input type="text" name="monthly_income" class="form-control currency-mask" placeholder="Monthly Income" value="{{old('monthly_income')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Proforma Rent Min <em>*</em></label>
                                                <input type="text" name="proforma_rent_min" class="form-control currency-mask" placeholder="Proforma Rent Min" value="{{old('proforma_rent_min')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Proforma Rent Max <em>*</em></label>
                                                <input type="text" name="proforma_rent_max" class="form-control currency-mask" placeholder="Proforma Rent Max" value="{{old('proforma_rent_max')}}">
                                                <span class="inputs-note">If there is only one number and not a range it should show the actual number</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Proforma Rent Per Square Feet <em>*</em></label>
                                                <input type="text" name="rent_per_sf2" class="form-control" placeholder="Rent Per Square Feet" value="{{old('rent_per_sf2')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Proforma Monthly Income <em>*</em></label>
                                                <input type="text" name="monthly_income2" class="form-control currency-mask" placeholder="Proforma Monthly Income" value="{{old('monthly_income2')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Non Confirming? <em>*</em></label>
                                                <input type="checkbox" name="isNC" value="1" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.unit-mix', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-7.jpg') }}" class="img-responsive">
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
