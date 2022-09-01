@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new income expenses Memorandum</a></li>
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
                                <h3>Income & Expenses</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.income-expenses',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h1>Current</h1>
                                        <div class="row">
                                        <h3>Income</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Total Other Income <em>*</em></label>
                                                <input type="text" name="other_income" class="form-control currency-mask" placeholder="Other Income" value="{{isset($rec->other_income) ? $rec->other_income : old('other_income')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Vacancy Collection Reserve<em>*</em></label>
                                                <input type="text" name="vacancy_percentage" class="form-control" placeholder="eg. 0.05" value="{{isset($rec->vacancy_percentage) ? $rec->vacancy_percentage : old('vacancy_percentage')}}">
                                            </div>
                                        </div>
                                       {{-- <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Vacancy (GPR) Collection Reserve (GPR)(%) <em>*</em></label>
                                                <input type="text" name="vacancy_collection_reserve" class="form-control" placeholder="Vacancy Collection Reserve" value="{{isset($rec->vacancy_collection_reserve) ? $rec->vacancy_collection_reserve : old('vacancy_collection_reserve')}}">
                                                <span class="inputs-note">ex. 2</span>
                                            </div>
                                        </div>--}}
                                        <h3>Expenses</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Real Estate Taxes <em>*</em></label>
                                                <input type="text" name="real_estate_taxes" class="form-control currency-mask" placeholder="Real Estate Taxes" value="{{isset($rec->real_estate_taxes) ? $rec->real_estate_taxes : old('real_estate_taxes')}}">
                                                <span class="inputs-note">Ex. For $100,000 please use the format 100,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Marketing <em>*</em></label>
                                                <input type="text" name="marketing" class="form-control currency-mask" placeholder="Marketing" value="{{isset($rec->marketing) ? $rec->marketing :  old('marketing')}}">
                                                <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Onsite Management <em>*</em></label>
                                                <input type="text" name="onsite_management" class="form-control currency-mask" placeholder="Onsite Management" value="{{isset($rec->onsite_management) ? $rec->onsite_management : old('onsite_management')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Administration <em>*</em></label>
                                                <input type="text" name="administration" class="form-control currency-mask" placeholder="Administration" value="{{isset($rec->administration) ? $rec->administration :  old('administration')}}">
                                                <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Maintenance <em>*</em></label>
                                                <input type="text" name="maintenance" class="form-control currency-mask" placeholder="Maintenance" value="{{isset($rec->maintenance)  ? $rec->maintenance : old('maintenance')}}">
                                                <span class="inputs-note">Ex. For $100,000 please use the format 100,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Contract Services <em>*</em></label>
                                                <input type="text" name="contract_services" class="form-control currency-mask" placeholder="Contract Services" value="{{isset($rec->contract_services) ? $rec->contract_services : old('contract_services')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Utilities <em>*</em></label>
                                                <input type="text" name="utilities" class="form-control currency-mask" placeholder="Utilities" value="{{isset($rec->utilities) ? $rec->utilities : old('utilities')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Offsite Management <em>*</em></label>
                                                <input type="text" name="offsite_management" class="form-control currency-mask" placeholder="Offiste Management" value="{{isset($rec->offsite_management) ? $rec->offsite_management :  old('offsite_management')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Insurance <em>*</em></label>
                                                <input type="text" name="insurance" class="form-control currency-mask" placeholder="Insurance" value="{{isset($rec->insurance) ? $rec->insurance : old('insurance')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Professional Fees <em>*</em></label>
                                                <input type="text" name="professional_fees" class="form-control currency-mask" placeholder="Professional Fees" value="{{isset($rec->professional_fees) ? $rec->professional_fees : old('professional_fees')}}">
                                                <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Reserves <em>*</em></label>
                                                <input type="text" name="reserves" class="form-control currency-mask" placeholder="Reserves" value="{{isset($rec->reserves) ? $rec->reserves :  old('reserves')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <h1>Proforma</h1>
                                        <h3>Income</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Total Other Income <em>*</em></label>
                                                <input type="text" name="other_income_proforma" class="form-control currency-mask" placeholder="Other Income" value="{{isset($rec->other_income_proforma) ? $rec->other_income_proforma : old('other_income_proforma')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Vacancy Collection Reserve<em>*</em></label>
                                                    <input type="text" name="vacancy_percentage_proforma" class="form-control" placeholder="eg. 0.05" value="{{isset($rec->vacancy_percentage_proforma) ? $rec->vacancy_percentage_proforma : old('vacancy_percentage_proforma')}}">
                                                </div>
                                            </div>
                                        {{--<div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Vacancy (GPR) Collection Reserve (GPR) <em>*</em></label>
                                                <input type="text" name="vacancy_collection_reserve_proforma" class="form-control" placeholder="Vacancy Collection Reserve_proforma" value="{{isset($rec->vacancy_collection_reserve_proforma) ? $rec->vacancy_collection_reserve_proforma : old('vacancy_collection_reserve_proforma')}}">
                                            </div>
                                        </div>--}}
                                        <h3>Expenses</h3>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Real Estate Taxes <em>*</em></label>
                                                <input type="text" name="real_estate_taxes_proforma" class="form-control currency-mask" placeholder="Real Estate Taxes_proforma" value="{{isset($rec->real_estate_taxes_proforma) ? $rec->real_estate_taxes_proforma : old('real_estate_taxes_proforma')}}">
                                                <span class="inputs-note">Ex. For $100,000 please use the format 100,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Marketing <em>*</em></label>
                                                <input type="text" name="marketing_proforma" class="form-control money" placeholder="Marketing" value="{{isset($rec->marketing_proforma) ? $rec->marketing_proforma :  old('marketing_proforma')}}">
                                                <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Onsite Management <em>*</em></label>
                                                <input type="text" name="onsite_management_proforma" class="form-control currency-mask" placeholder="Onsite Management" value="{{isset($rec->onsite_management_proforma) ? $rec->onsite_management_proforma : old('onsite_management_proforma')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format10,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Administration <em>*</em></label>
                                                <input type="text" name="administration_proforma" class="form-control currency-mask" placeholder="Administration" value="{{isset($rec->administration_proforma) ? $rec->administration_proforma :  old('administration_proforma')}}">
                                                <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Maintenance <em>*</em></label>
                                                <input type="text" name="maintenance_proforma" class="form-control currency-mask" placeholder="Maintenance" value="{{isset($rec->maintenance_proforma)  ? $rec->maintenance_proforma : old('maintenance_proforma')}}">
                                                <span class="inputs-note">Ex. For $100,000 please use the format 100,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Contract Services <em>*</em></label>
                                                <input type="text" name="contract_services_proforma" class="form-control currency-mask" placeholder="Contract Services" value="{{isset($rec->contract_services_proforma) ? $rec->contract_services_proforma : old('contract_services_proforma')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Utilities <em>*</em></label>
                                                <input type="text" name="utilities_proforma" class="form-control currency-mask" placeholder="Utilities" value="{{isset($rec->utilities_proforma) ? $rec->utilities_proforma : old('utilities_proforma')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Offsite Management <em>*</em></label>
                                                <input type="text" name="offsite_management_proforma" class="form-control currency-mask" placeholder="Offiste Management" value="{{isset($rec->offsite_management_proforma) ? $rec->offsite_management_proforma :  old('offsite_management_proforma')}}">
                                                <span class="inputs-note">Ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Insurance <em>*</em></label>
                                                <input type="text" name="insurance_proforma" class="form-control currency-mask" placeholder="Insurance" value="{{isset($rec->insurance_proforma) ? $rec->insurance_proforma : old('insurance_proforma')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Professional Fees <em>*</em></label>
                                                    <input type="text" name="professional_fees_proforma" class="form-control currency-mask" placeholder="Professional Fees" value="{{isset($rec->professional_fees_proforma) ? $rec->professional_fees_proforma : old('professional_fees_proforma')}}">
                                                    <span class="inputs-note">Ex. For $1,000 please use the format 1,000</span>
                                                </div>
                                            </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Reserves <em>*</em></label>
                                                <input type="text" name="reserves_proforma" class="form-control currency-mask" placeholder="Reserves" value="{{isset($rec->reserves_proforma) ? $rec->reserves_proforma :  old('reserves_proforma')}}">
                                                <span class="inputs-note">Ex. For $10,000 please use the format 10,000</span>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.unit-mix.graphs', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-8.jpg') }}" class="img-responsive">
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
