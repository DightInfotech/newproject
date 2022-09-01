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
                                <h3>Confidentiality Page</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.confidentiality.page', $memorandum->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Text <em>*</em></label>
                                                <textarea name="text" class="form-control js-wysiwyg" placeholder="text" > @if($memorandum->text){{  $memorandum->text }}@else <p>The information contained in the following Marketing Brochure is proprietary and strictly confidential. It is intended to be reviewed only by the party receiving it from Le Investment Group and should not be made available to any other person or entity without the written consent of Le Investment Group . This Marketing Brochure has been prepared to provide summary, unverified information to prospective purchasers, and to establish only a preliminary level of interest in the subject property. The information contained herein is not a substitute for a thorough due diligence investigation. Le Investment Group has not made any investigation, and makes no warranty or representation, with respect to the income or expenses for the subject property, the future projected financial performance of the property, the size and square footage of the property and improvements, the presence or absence of contaminating substances, PCB's or asbestos, the compliance with State and Federal regulations, the physical condition of the improvements thereon, or the financial condition or business prospects of any tenant, or any tenant’s plans or intentions to continue its occupancy of the subject property. The information contained in this Marketing Brochure has been obtained from sources we believe to be reliable; however, Le Investment Group has not verified, and will not verify, any of the information contained herein, nor has Le Investment Group conducted any investigation regarding these matters and makes no war ranty or representation whatsoever regarding the accuracy or completeness of the information provided. All potential buyers must take appropriate measures to verify all of the information set forth herein.</p>
                                                    <p class="text-uppercase font-400">ALL PROPERTY SHOWINGS ARE BY APPOINTMENT ONLY. PLEASE CONSULT YOUR LE INVESTMENT GROUP AGENT FOR MORE DETAILS.</p> @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label class="label-small">Footer <em>*</em></label>
                                                <textarea name="footer" class="form-control js-wysiwyg" placeholder="Footer text" > @if($memorandum->footer){{ $memorandum->footer }}@else <p>This information has been secured from sources we believe to be reliable, but we make no representations or warranties, expressed or implied, as to the accuracy of the information. References to square footage or age are approximate. Buyer must verify the information and bears all risk for any inaccuracies.</p>  @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('edit.cover.page', $memorandum->id) }}" class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit" class="btn btn-action pull-right" value="save" style="margin-right: 15px;">NEXT/SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-2.jpg') }}" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection