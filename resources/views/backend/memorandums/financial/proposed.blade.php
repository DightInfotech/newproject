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
                                <h3>EXISTING FINANCING</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.proposed',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Cover Image</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img @if(isset($rec->cover_page_3)) style="display: block;" @else style="display:none;" @endif id="img-1" src="{{isset($rec->cover_page_3) ? Storage::disk('s3')->url('assets/'.$rec->cover_page_3) : ''}}" alt="cover page photo" width="200" height="200" />                                            </div>
                                                <span class="inputs-note">Image must be upload of dimensions 835 * 940 </span>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="cover_page_3" id="hidden-field-1" value="{{isset($rec->cover_page_3) ? $rec->cover_page_3 : ''}}">
                                            <input type="hidden" id="tmp1" value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loan Amount <em>*</em></label>
                                                <input type="text" name="loan_amount" class="form-control" id="dynamic-mask" value="{{isset($rec->loan_amount) ? $rec->loan_amount : ''}}"   />
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loan Type <em>*</em></label>
                                                <input type="text" name="loan_type" class="form-control" placeholder="Loan Type" value="{{isset($rec->loan_type) ? $rec->loan_type : 'TBD'}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Interest Rate <em>*</em></label>
                                                <input type="text" name="interest_rate" class="form-control" placeholder="Interest Rate" value="{{isset($rec->interest_rate) ? $rec->interest_rate : '5'}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Amortization <em>*</em></label>
                                                <input type="text" name="amortization" class="form-control" placeholder="30" value="{{isset($rec->amortization) ? $rec->amortization : 'Fixed'}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Due Date <em>*</em></label>
                                                <input type="text" name="due_date" class="form-control" placeholder="Due Date" value="{{isset($rec->due_date) ? $rec->due_date : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Lender Name <em>*</em></label>
                                                <input type="text" name="lender_name" class="form-control" placeholder="Lender Name" value="{{isset($rec->lender_name) ? $rec->lender_name : ''}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="display: none;">
                                            <div class="form-group">
                                                <label class="label-small">Payment per Period <em>*</em></label>
                                                <input type="text" name="payment" class="form-control currency-mask" id="payment" placeholder="Enter Payment per Period" readonly="readonly" value="{{isset($rec->payment) ? $rec->payment : ''}}" onblur="if(this.value==0){  document.getElementById('payment').value=''; }">
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="display: none;">
                                            <div class="form-group">
                                                <label class="label-small"> Principle Reduction Per Month <em>*</em></label>
                                                <input type="text" name="principle_reduction" class="form-control currency-mask" id="principleReduction" placeholder="" readonly="readonly" value="{{isset($rec->principle_reduction) ? $rec->principle_reduction : ''}}" onblur="if(this.value==0){  document.getElementById('principleReduction').value=''; }">
                                            </div>
                                        </div>
                                        <h2>PROPOSED FINANCING</h2>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loan Amount <em>*</em></label>
                                                <input type="text" name="trust_loan_amount" class="form-control currency-mask" id="trustLoanAmount" placeholder="Loan Amount" value="{{str_replace(',','',$rec->price) - str_replace(',','',$rec->down_payment)}}" readonly="readonly" required onblur="if(this.value==0){  document.getElementById('trustLoanAmount').value=''; }">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loan Type <em>*</em></label>
                                                <input type="text" name="trust_loan_type" class="form-control" placeholder="Trust Loan Type" value="{{isset($rec->trust_loan_type)  ? $rec->trust_loan_type : old('trust_loan_type')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Interest Rate <em>*</em></label>
                                                <input type="text" name="trust_interest_rate" class="form-control" placeholder="Trust Interest Rate" value="{{isset($rec->trust_interest_rate) ? $rec->trust_interest_rate : old('trust_interest_rate')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Amortization <em>*</em></label>
                                                <input type="text" name="trust_amortization" class="form-control" placeholder="Trust Amortization" value="{{isset($rec->trust_amortization) ? $rec->trust_amortization : old('trust_amortization')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Program <em>*</em></label>
                                                <input type="text" name="trust_program" class="form-control" placeholder="Trust Program" value="{{isset($rec->trust_program) ? $rec->trust_program :  old('trust_program')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loan Value <em>*</em></label>
                                                <input type="text" name="trust_loan_value" class="form-control" placeholder="Trust Deed Loan Value" value="{{100 - $rec->down_payment_perc}}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.offering.summary', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-6.jpg') }}" class="img-responsive">
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
