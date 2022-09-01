@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new Sales Range</a></li>
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
                                <h2>Sales Range</h2>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.exchange-options',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>Sales Range</h3>
                                        <div class="row">
                                            <button type="submit" name="skip"
                                                    class="btn btn-action pull-right" value="Skip"
                                                    style="margin-right: 15px;" onclick="document.getElementById('isSkipped').value=1;">Skip
                                            </button>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label class="label-small">Existing Debt Retirement <em>*</em></label>
                                                    <input type="text" name="existing_debt_retirement1" class="form-control currency-mask" value="{{isset($sales_range->existing_debt_retirement1) ? $sales_range->existing_debt_retirement1 :  old('existing_debt_retirement1')}}">
                                                    <span class="inputs-note">ex. for $6,800,000 use the format 6,800,000</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-sm-4">
                                                    <label class="label-small">Seller's Actual Income <em>*</em></label>
                                                    <input type="text" name="seller_actual_income1" class="form-control currency-mask"  value="{{isset($sales_range->seller_actual_income1) ? $sales_range->seller_actual_income1 :  old('seller_actual_income1')}}">
                                                    <span class="inputs-note">ex. for $6,800,000 use the format 6,800,000</span>
                                                </div>
                                            </div>
                                            @php
                                                if(isset($sales_range)){
                                                    $exchange_option1 = json_decode($sales_range->exchange_option_1);
                                                    $exchange_option2 = json_decode($sales_range->exchange_option_2);
                                                }
                                            @endphp
                                            <h3>Exchange Option 1</h3>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small"> Property Title <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control"  value="{{isset($exchange_option1[0]) ? $exchange_option1[0] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Property Type <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control"  value="{{isset($exchange_option1[1]) ? $exchange_option1[1] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Price <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[2]) ? $exchange_option1[2] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> CAP Rate <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control"  value="{{isset($exchange_option1[3]) ? $exchange_option1[3] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Down Payment <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[4]) ? $exchange_option1[4] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> New Loan <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[5]) ? $exchange_option1[5] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Interest Rate <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control"  value="{{isset($exchange_option1[6]) ? $exchange_option1[6] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Amortization <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control"  value="{{isset($exchange_option1[7]) ? $exchange_option1[7] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Net Operating Income <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[8]) ? $exchange_option1[8] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Debt Service <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[9]) ? $exchange_option1[9] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Net Cash Flow After Debt Service <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask" value="{{isset($exchange_option1[10]) ? $exchange_option1[10] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Principal Reduction <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask"  value="{{isset($exchange_option1[11]) ? $exchange_option1[11] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Total Return <em>*</em></label>
                                                    <input type="text" name="exchange_option1[]" class="form-control currency-mask" value="{{isset($exchange_option1[12]) ? $exchange_option1[12] :  ''}}">
                                                </div>
                                            </div>

                                            <h3>Exchange Option 2</h3>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small"> Property Title <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control"  value="{{isset($exchange_option2[0]) ? $exchange_option2[0] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Property Type <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control"  value="{{isset($exchange_option2[1]) ? $exchange_option2[1] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Price <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[2]) ? $exchange_option2[2] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> CAP Rate <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control"  value="{{isset($exchange_option2[3]) ? $exchange_option2[3] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Down Payment <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[4]) ? $exchange_option2[4] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> New Loan <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[5]) ? $exchange_option2[5] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Interest Rate <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control"  value="{{isset($exchange_option2[6]) ? $exchange_option2[6] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Amortization <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control"  value="{{isset($exchange_option2[7]) ? $exchange_option2[7] :  ''}}">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Net Operating Income <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[8]) ? $exchange_option2[8] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Debt Service <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[9]) ? $exchange_option2[9] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Net Cash Flow After Debt Service <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask" value="{{isset($exchange_option2[10]) ? $exchange_option2[10] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Principal Reduction <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask"  value="{{isset($exchange_option2[11]) ? $exchange_option2[11] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-small"> Total Return <em>*</em></label>
                                                    <input type="text" name="exchange_option2[]" class="form-control currency-mask" value="{{isset($exchange_option2[12]) ? $exchange_option2[12] :  ''}}">
                                                    <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.pricing-proforma', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <input type="hidden" id="isSkipped" name="is_skipped" value="0" />
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;" onclick="document.getElementById('isSkipped').value=0;">NEXT/SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-11.jpg') }}" class="img-responsive">
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
