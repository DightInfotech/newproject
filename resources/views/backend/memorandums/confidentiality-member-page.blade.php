@extends("layouts.system")
@push('style')
    {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}
    {{--<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>--}}
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2196F3;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>

@endpush
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
                                <h3>Confidentiality and Disclaimer Page</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('update.confidentiality.member.page', $memorandum->id)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="col-sm-12" style="margin-bottom: 15px">
                                            <h4 style="margin-top: 5px;">Managing Partner 1</h4>
                                            <label class="switch">
                                                <input type="checkbox" id="toogle-1" value="1" name="active[]" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div id="member-1">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Business Card</label>
                                                    <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                    <img @if($memorandum->business_card_1) style="display:block" src="{{ Storage::disk('s3')->url('assets/'.$memorandum->business_card_1) }}" @else style="display: none;" src="#" @endif id="img-1" alt="Business Card 1" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 1087 * 640 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="business_card_1" id="hidden-field-1" value="@if($memorandum->business_card_1){{$memorandum->business_card_1}}@endif">
                                            </div>
                                        </div>
                                        <div class="col-sm-12" style="margin-bottom: 15px">
                                            <h4 style="margin-top: 5px;">Managing Partner 2</h4>
                                            <label class="switch">
                                                <input type="checkbox" id="toogle-2" value="1" name="active[]" checked>
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div id="member-2">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="label-small">Business Card</label>
                                                    <button class="btn btn-primary" id="select-image-2" onclick="openModal(this, 2)">Select Image</button>
                                                    <img @if($memorandum->business_card_2) style="display:block" src="{{ Storage::disk('s3')->url('assets/'.$memorandum->business_card_2) }}" @else style="display: none;" src="#" @endif id="img-2"  alt="Partner 2 Business Card" width="200" height="200" />
                                                    <span class="inputs-note">Image must be upload of dimensions 1087 * 640 </span>
                                                </div>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="business_card_2" id="hidden-field-2" value="@if($memorandum->business_card_2){{$memorandum->business_card_2}}@endif">

                                            </div>
                                       </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.confidentiality.page', $memorandum->id) }}" class="btn btn-danger">BACK</a>
                                                    <button type="submit" name="submit" class="btn btn-action pull-right" value="save" style="margin-right: 15px;">NEXT/SAVE</button>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="tmp1" value="">
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
    @include('backend.modal.index')
@endsection
@push('js')
    <script>
       $('#toogle-1').change( function () {
           if($('#member-1').css('display') == 'block'){
             $('#member-1').fadeOut();
             $('#active-1').val(0);
             $("#business_card_1").val('');
           }else{
               $('#member-1').fadeIn();
               $('#active-1').val(1);
           }
       });
       $('#toogle-2').change( function () {
           if($('#member-2').css('display') == 'block'){
               $('#member-2').fadeOut();
               $('#active-2').val(0);
               $("#business_card_2").val('');
           }else{
               $('#member-2').fadeIn();
               $('#active-2').val(1);
           }
       });

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