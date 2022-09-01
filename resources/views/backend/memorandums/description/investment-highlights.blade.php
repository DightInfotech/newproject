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
                                <h3>Investment Highlights</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.description.investment.highlights',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Investment Highlights <em>*</em></label>
                                                <textarea name="invest_highlights1" class="form-control js-wysiwyg">{{isset($rec->invest_highlights1) ? $rec->invest_highlights1 : '<ul class="list-circle">
					<li>
						<p>ProForma CAP Rate of 4.37% With a ProForma GRM of 15.38%. Current CAP Rate of 3.97%.</p>
						<p class="font-weight-light">ProForma CAP Rate is Based on Leveling Off Current Rents.  </p>
					</li>
					<li>
						<p>High Annual Occupancy Location. Blocks From The Loma Linda University, Loma Linda University Medical Center & The VA Loma Linda Healthcare System. Conservative 10% Increase in Potential Rental Income.</p>
					</li>
					<li>
						<p>The Property Was Extensively Renovated in 2017. Pride Of Ownership, Absolute Turn Key, Financeable Asset. Recent Capital Improvements Exceeding $500,000+</p>
						<p class="font-weight-light">Improvements include but are not limited to, Granite Kitchen Counter Tops, New Stainless Steel Appliances, Upgraded Wood Style Brava Plank Flooring, Maple Wood Cabinetry, Dual Pane “Low-e” Windows, Bathroom Vanities, New A/Cs, New Kitchen / Bathroom Faucets, Bathtubs, Water Heaters, and Recessed Lighting. The property also features an updated High Definition CCTV Security System, with remote access ($10,000). </p>
					</li>
					<li>
						<p>All Renovated Units Include New Appliances</p>
						<ul>
							<li>Refrigerators- Stainless Steel Whirlpool Bottom   	Freezer, Energy Star WRB-322DMBM</li>
							<li>Built in Microwave With Vent – Stainless Steel Samsung ME16K3000A5</li>
							<li>Oven With Range – Black Whirlpool Energy Star WFC310S0EB</li>
							<li>A/C Units – LG 18,000 BTU WIFI Enable LW1817IVSM  </li>
						</ul>
					</li>
				</ul>'}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Highlights Image 1</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img @if(isset($rec->highlights_image1)) style="display: block;" @else style="display:none;" @endif id="img-1" src="{{isset($rec->highlights_image1) ? Storage::disk('s3')->url('assets/'.$rec->highlights_image1) : ''}}" alt="cover page photo" width="200" height="200" />
                                                <span class="inputs-note">Image must be upload of dimensions 1075 * 425 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="highlights_image1" id="hidden-field-1" value="{{isset($rec->highlights_image1) ? $rec->highlights_image1 : ''}}">
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Highlights Image 2</label>
                                                <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                <img @if(isset($rec->highlights_image2)) style="display: block;" @else style="display:none;" @endif id="img-2" src="{{isset($rec->highlights_image2) ? Storage::disk('s3')->url('assets/'.$rec->highlights_image2) : ''}}" alt="cover page photo" width="200" height="200" />
                                                <span class="inputs-note">Image must be upload of dimensions 1075 * 425 </span>
                                            </div>
                                        </div>
                                        <div class="hidden-inputs">
                                            <input type="hidden" name="highlights_image2" id="hidden-field-2" value="{{isset($rec->highlights_image2) ? $rec->highlights_image2 : ''}}">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.location.highlights', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-16.jpg') }}" class="img-responsive">
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
