@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Market Comparable</a></li>
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
                                <h3>Add Market Comparable Property</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <form action="{{route('market-comparable.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="memorandum_id" value="{{$memorandum->id}}" />
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Property Name <em>*</em></label>
                                                <input type="text" name="name" class="form-control" placeholder="Property Name" value="{{ old('name') }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Address </label>
                                                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">On Market Date <em>*</em></label>
                                                <input type="date" name="on_market_date" class="form-control" placeholder="Market Date" value="{{ old('on_market_date') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Year Built In </label>
                                                <input type="text" name="year_built" class="form-control" placeholder="Year Built" value="{{ old('year_built') }}">
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Sale Price </label>
                                                <input type="text" name="sale_price" class="form-control currency-mask" placeholder="Sale Price" value="{{ old('sale_price') }}">
                                                <span class="inputs-note">ex. for $6,800,000 please use the format 6,800,000</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Price/SF </label>
                                                <input type="text" name="price_per_sf" class="form-control currency-mask" placeholder="Price Per Square Feet" value="{{ old('price_per_sf') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small"> CAP Rate </label>
                                                <input type="text" name="cap_rate" class="form-control currency-mask" placeholder="CAP Rate" value="{{ old('cap_rate') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">GRM </label>
                                                <input type="text" name="grm" class="form-control currency-mask" placeholder="GRM" value="{{ old('grm') }}">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small"> Notes </label>
                                                <textarea name="notes" class="form-control" placeholder="Enter Property Notes" cols="10" rows="10">{{ old('notes') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="label-small">Property Image</label>
                                                <button class="btn btn-primary" id="select-image-1" onclick="openModal(this, 1)">Select Image</button>
                                                <img style="display: none;" id="img-1" src="" alt="cover page photo" width="200" height="200" />
                                                <span class="inputs-note">Image must be upload of dimensions 450 * 250 </span>
                                            </div>
                                            <div class="hidden-inputs">
                                                <input type="hidden" name="image" id="hidden-field-1" value="">
                                                <input type="hidden" id="tmp" value="1">
                                            </div>
                                        </div>

                                        <div id="sale-div" style="width: 100%;float: left;">
                                            <div class="form-group">
                                                <a id="duplicate" style="margin-top: 24px;color:white;"
                                                   class="duplicate btn btn-success"><span class="fa fa-plus">  Add Units</span></a>
                                            </div>
                                            <div id="content-dup" class="row">
                                                <div id="type_div_1" class="col-sm-3 form-group">
                                                    <label>Enter Unit Type*</label>
                                                    <input type="text" id="type1" name="unit_types[]" placeholder="1BR 1BA" class="form-control" value="" />
                                                </div>
                                                <div id="numb_div_1" class="col-sm-3 form-group">
                                                    <label>Enter No of Units*</label>
                                                    <input type="text" id="numb1" name="unit_numbers[]" placeholder="18" class="form-control" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" style="margin-left: 15px">
                                                    <a href="{{ route('market-comparable.index', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <button type="submit" name="submit"
                                                            class="btn btn-action pull-right" value="save"
                                                            style="margin-right: 15px;">SAVE
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-35.jpg') }}" class="img-responsive">
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
    <script type="text/javascript">
        $(document).ready(function () {
            Dropzone.options.myAwesomeDropzone = {
                uploadMultiple: false,
                maxFilesize: 30,
                success: function (p1) {
                    console.log(p1);
                    var tmp = $("#tmp").val();
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
            $(".duplicate").click(function () {
                // get the last DIV which ID starts with ^= "product_div"
                var last_type_div = $('div[id^="type_div_"]:last');
                // Read the Number from that DIV
                // And increment that number by 1
                var num = parseInt(last_type_div.prop("id").match(/\d+/g), 10) + 1;
                $("#type_div_1").clone().attr("id", "type_div_" + num)
                    .appendTo("#content-dup").find('input[id^="type"]:last').val("").attr("id", "type" + num);
                $("#numb_div_1").clone().attr("id", "numb_div_" + num)
                    .appendTo("#content-dup").find('input[id^="numb"]:last').val("").attr("id", "numb" + num);
            });
        });
        function check(value) {
            var tmp = $("#tmp").val();
            if ($('#res_' + value).hasClass('added-slide')) {
                $('#res_' + value).removeClass('added-slide');
                $("#hidden-field-" + tmp).val('');
            } else {
                $('.added-slide').each(function () {
                    $(this).removeClass('added-slide');
                });
                $('#res_' + value).addClass('added-slide');
                var token = $('meta[name=csrf-token]').attr("content");
                var asset_id = $('#res_' + value).data('id');
                $.ajax({
                    url: '{{ route('assets.get') }}',
                    type: 'POST',
                    data: {_token: token, asset_id: asset_id},
                    dataType: 'JSON',
                    success: function (data) {

                        if (data) {
                            $("#hidden-field-" + tmp).val(data.data.file);
                            var image = '{{Storage::disk('s3')->url('assets/')}}' + data.data.file;
                            $("#img-" + tmp).attr('src', image);
                            $("#img-" + tmp).css('display', 'block');
                            $("#m_modal_4").modal('hide');
                        }
                    }
                });
            }
        }
        $("#role").change( function() {
            if($(this).val() == 2){
                $("#company-name").fadeOut();
            } else{
                $("#company-name").fadeIn();
            }
        });
    </script>
@endpush