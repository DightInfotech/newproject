@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Projection Increment</a></li>
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
                                <h3>Memorandum Projection Increment</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.projection-increment',$rec->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="year" value="{{$rec->year}}" />
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Market Rents <em>*</em></label>
                                                <input type="text" name="market_rents" class="form-control" placeholder="Market Rents" value="{{isset($rec->market_rents) ? $rec->market_rents : old('market_rents')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Loss to Lease <em>*</em></label>
                                                <input type="text" name="loss_to_lease" class="form-control" placeholder="Loss to Lease" value="{{isset($rec->loss_to_lease) ? $rec->loss_to_lease : old('loss_to_lease')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Vacancy Loss <em>*</em></label>
                                                <input type="text" name="vacancy_loss" class="form-control " placeholder="Vacancy Loss" value="{{isset($rec->vacancy_loss) ? $rec->vacancy_loss : old('vacancy_loss')}}">
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
                                                <label class="label-small"> Other Income<em>*</em></label>
                                                <input type="text" name="other_income" class="form-control" placeholder="Other Income" value="{{isset($rec->other_income) ? $rec->other_income :  old('other_income')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small"> Total Operating Expenses<em>*</em></label>
                                                <input type="text" name="total_operating_expenses" class="form-control" placeholder="Operating Expenses" value="{{isset($rec->total_operating_expenses) ? $rec->total_operating_expenses :  old('total_operating_expenses')}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.projection-increment', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">UPDATE
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
