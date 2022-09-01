@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new Memorandum</a></li>
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
                                <h3>Location Highlights</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.description.location.highlights',$memorandum->id)}}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Column 1 Content <em>*</em></label>
                                                <textarea name="column1" class="form-control js-wysiwyg">{{isset($rec->column1) ? $rec->column1 : '<ul class="list-circle">
					<li>
						<p>Located across the street from the Veteran Affairs Center and directly adjacent to Loma Linda University (.08 Miles). Loma Linda University has a faculty of 1,500+, With an impressive enrollment of over 4,400 students a
						year.</p>
						<span>Loma Linda University</span>
						<div class="div-text-light">
							<p>• Faculty         (1543)<br/>
							  • Students      (4451)</p>
						</div>
					</li>
					<li>
						<p>Located 5 minutes from Loma Linda University Medical Center(.09 Miles). Ranked Number 1 Hospital in Metro Area By U.S News and World Report.</p>
						<span>Loma Linda University Medical Center</span>
						<div class="div-text-light">
							<p>Medical Center’s specialties include gastroenterology, neurology, neurosurgery, orthopedics and urology.</p>
						</div>
					</li>
					<li>
						<p>Two Blocks South of the 10 Freeway and Major Reginal Shopping Centers Which Include; Costco Wholesale, Lowes Home Improvement, Walmart, The Home Depot, Best Buy, In and Out,
						Various Restaurants.</p>
					</li>
					<li>
						<p>AAA Location With Direct Access to Many Regional Thoroughfares. The Property Also Has Abundant Public Transportation Access. </p>
					</li>
				</ul>
				<h3>Investment Overview</h3>
				<p>The University Palms is located at 25356 Cole Street, Loma Linda, CA 92354 . The property is conveniently located walking distance from. </p>'}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Column 2 Content <em>*</em></label>
                                                <textarea name="column2"  class="form-control js-wysiwyg">{{isset($rec->column2) ? $rec->column2 : '<p class="font-weight-light text-justify">Loma Linda University, the Loma Linda University Medical Center, the Veteran Healthcare System & many major regional employers. This 24 unit apartment community is composed of all large two bedroom / one bathroom units, of approximately 879 Sq. Ft. The current ownership’s emphasis has been on quality updates which include recent capital improvements that exceed $500,000. A small protype of 4 units have been extensively updated</p><img src="assets/images/page-12-img.jpg" alt="img"/>'}}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Column 3 Content <em>*</em></label>
                                                <textarea name="column3" class="form-control js-wysiwyg">{{isset($rec->column3) ? $rec->column3 : '<p class="font-weight-light text-justify">with extra large kitchen islands. These units are garnering a premium in rental income exceeding $1,550 a month Unit upgrades consist of stainless steel appliances, maple wood cabinetry, granite countertops, wood style Brava plank flooring, dual pane “Low-E” windows, and mirrored closet doors. Common area improvements consist of newly landscaped frontage and renovated laundry rooms. Technological and security upgrades include property wide Wi-Fi internet and an 8 camera,
				Super High Definition security system with night vision
				The exceptional care that has been taken in this property,
				reflects the pride of ownership of its current owner. Scheduled maintenance,
				quality updates and improvements have always been a priority for the owner
				and make this property, a true turnkey asset for prospective buyers,
				who are looking for peace of mind, knowing they invested in a quality property,
				that will require minimal maintenance, for decades to come. As a result,
				the property demonstrates a minimal turn over and vacancy,
				in comparison to similar properties. The updated living
				conditions and the safe environment are both attractive features,
				to working class families, who constitute the tenant base. The rents are stable,
				with room for increases. The tenants will be willing to pay a premium to live in this safe and agreeable atmosphere.</p>'}}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.cover.page', $memorandum->id) }}"
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
                                        <img src="{{ asset('memorandums/Page-14-loc-high.jpg') }}" class="img-responsive">
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
