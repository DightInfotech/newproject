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
                                <h3>10 Year Projection</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.projections',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>Income</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loss to Lease <em>*</em></label>
                                                <input type="text" name="loss_to_lease" class="form-control currency-mask" placeholder="Loss to Lease" value="{{isset($rec->loss_to_lease) ? $rec->loss_to_lease : old('loss_to_lease')}}">
                                                <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Concessions <em>*</em></label>
                                                <input type="text" name="concessions" class="form-control currency-mask" placeholder="Concessions" value="{{isset($rec->concessions) ? $rec->concessions : old('concessions')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Non Revenue Units <em>*</em></label>
                                                <input type="text" name="non_revenue_units" class="form-control" placeholder="Non Revenue Units" value="{{isset($rec->non_revenue_units) ? $rec->non_revenue_units :  old('non_revenue_units')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Economic Occupancy <em>*</em></label>
                                                <input type="text" name="economic_occupancy" class="form-control" placeholder="Economic Occupancy" value="{{isset($rec->economic_occupancy)  ? $rec->economic_occupancy : old('economic_occupancy')}}">
                                                <span class="inputs-note">ex. for 40% please use the format 40</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Laundry Income <em>*</em></label>
                                                <input type="text" name="green_fee" class="form-control currency-mask" placeholder="Laundry Income" value="{{isset($rec->green_fee) ? $rec->green_fee : old('green_fee')}}">
                                                <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Storage <em>*</em></label>
                                                <input type="text" name="short_term_premiums" class="form-control currency-mask" placeholder="Storage" value="{{isset($rec->short_term_premiums) ? $rec->short_term_premiums : old('short_term_premiums')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Garages / Carports <em>*</em></label>
                                                <input type="text" name="carport_garages" class="form-control currency-mask" placeholder="Garages / Carports" value="{{isset($rec->carport_garages) ? $rec->carport_garages :  old('carport_garages')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Tenant Reimbursements <em>*</em></label>
                                                <input type="text" name="electricity_tenant_reim" class="form-control currency-mask" placeholder="Tenant Reimbursements" value="{{isset($rec->electricity_tenant_reim) ? $rec->electricity_tenant_reim : old('electricity_tenant_reim')}}">
                                            </div>
                                        </div>
                                        <h3>Operating Expenses</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Internet / Cable <em>*</em></label>
                                                <input type="text" name="internet_cable" class="form-control currency-mask" placeholder="Internet / Cable" value="{{isset($rec->internet_cable) ? $rec->internet_cable :  old('internet_cable')}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.exchange-options', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-7-10year.jpg') }}" class="img-responsive">
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
