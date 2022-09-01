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
                                <h3>Offering Summary</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.financial.offering.summary',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Cover Image</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img @if(isset($rec->cover_page_2)) style="display:block" @else style="display: none;" @endif id="img-1" src="@if(isset($rec->cover_page_2)){{Storage::disk('s3')->url('assets/'.$rec->cover_page_2)}}@else @endif" alt="cover page photo" width="200" height="200" />                                            </div>
                                                <span class="inputs-note">Image must be upload of dimensions 835 * 940 </span>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="cover_page_2" id="hidden-field-1" value="{{isset($rec->cover_page_2) ? $rec->cover_page_2 : ''}}">
                                            <input type="hidden" id="tmp1" value="">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Price <em>*</em></label>
                                                <input type="text" name="price" class="form-control currency-mask"   placeholder="Price" value="{{isset($rec->price) ? $rec->price : old('price')}}">
                                                <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Down Payment(%) <em>*</em></label>
                                                <input type="text" name="down_payment_perc" class="form-control" placeholder="Down Payment" value="{{isset($rec->down_payment_perc) ? $rec->down_payment_perc :  old('down_payment_perc')}}">
                                                <span class="inputs-note">ex. for 40% please use the format 40</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Rentable Square Feet <em>*</em></label>
                                                <input type="text" name="rentable_square_feet" class="form-control currency-mask" placeholder="Rentable Square Feet" value="{{isset($rec->rentable_square_feet) ? $rec->rentable_square_feet : old('rentable_square_feet')}}">
                                                <span class="inputs-note">ex. for 20,400 sq ft, please use the format 20,400</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Number of Buildings <em>*</em></label>
                                                <input type="text" name="number_of_buildings" class="form-control" placeholder="Number of Buildings" value="{{isset($rec->number_of_buildings) ? $rec->number_of_buildings : old('number_of_buildings')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Number of Stories <em>*</em></label>
                                                <input type="text" name="number_of_stories" class="form-control" placeholder="Number of Stories" value="{{isset($rec->number_of_stories) ? $rec->number_of_stories : old('number_of_stories')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Year Built <em>*</em></label>
                                                <input type="text" name="year_built" class="form-control" placeholder="Year Built" value="{{isset($rec->year_built) ? $rec->year_built : old('year_built')}}" onblur="if(this.value){ document.getElementById('yearRenno').style.display = 'block';}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12" id="yearRenno" @if(isset($rec->year_rennovated)) style="display: block" @else style="display:none;"  @endif>
                                            <div class="form-group">
                                                <label class="label-small">Year Rennovated </label>
                                                <input type="text" name="year_rennovated" class="form-control" placeholder="Year Rennovated" value="{{isset($rec->year_rennovated) ? $rec->year_rennovated : old('year_rennovated')}}">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Lot Size <em>*</em></label>
                                                <input type="text" name="lot_size" class="form-control" placeholder="Lot Size" value="{{isset($rec->lot_size) ? $rec->lot_size : old('lot_size')}}">
                                                <span class="inputs-note">It is in acres ex. 0.50 acres</span>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.cover.page', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-5.jpg') }}" class="img-responsive">
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
