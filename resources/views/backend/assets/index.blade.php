@extends('layouts.system')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Create new Offering Memorandum</a></li>
            </ul>
        </div>
    </div>
    <div class="row m-t-50">
        <div class="col-sm-12">
            <div class="job-item-details">
                <div class="col-md-8 assets-box">
                    @if($assets->isNotEmpty())
                        @foreach($assets as $asset)
                            <div class="col-md-3 col-sm-4 col-xs-6"><img class="img-responsive asset-img" style="height: 100px" src="{{Storage::disk('s3')->url('assets/'.$asset->file)}}" onclick="asset({{$asset->id}})" /></div>
                        @endforeach
                    @else
                        no asset found.
                    @endif
                </div>
                <div class="col-md-4" id="asset-left" style="display: none">

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

    <script>
        function asset(id) {
            var asset_id = id;
            var token = $('meta[name=csrf-token]').attr("content");
            $.ajax({
                url : '{{ route('assets.get') }}',
                type: 'POST',
                data: {_token: token, asset_id: asset_id},
                dataType : 'JSON',
                success: function(data){
                    $('#asset-left').show();
                    var asset = '<img class="img-responsive" style="max-width: 300px; width:100%;margin: 0 auto;" id="asset-left-img" src="{{Storage::disk('s3')->url('assets/')}}'+ data.data['file'] +'">\n' +
                        '                        <div class="asset-detail" style="margin:5px 0 0 0;">\n' +
                        '                            <div class="form-group">\n' +
                        '                                <label class="label-small">Title</label>\n' +
                        '                                <input type="text" class="form-control" id="asset-title" value="'+ data.data['title'] +'">\n' +
                        '                            </div>\n' +
                        '                            <div class="form-group">\n' +
                        '                                <label class="label-small">Alt</label>\n' +
                        '                                <input type="text" class="form-control" id="asset-alt" value="'+ data.data['alt'] +'">\n' +
                        '                            </div>\n' +
                        '                        </div>\n' +
                        '                        <div class="asset-action" style="margin-left: 85px">\n' +
                        '                            <button class="btn btn-sm btn-primary" id="edit-btn" onclick="editAsset('+ data.data['id'] +')">Update</button>\n' +
                        '                            <button class="btn btn-sm btn-primary" onclick="deleteAsset('+ data.data['id'] +')">Delete</button>\n' +
                        '                        </div>';
                    $('#asset-left').html(asset);
                }
            });
        }

        function editAsset(id){
            var asset_id = id;
            var asset_title = $('#asset-title').val();
            var asset_alt = $('#asset-alt').val();
            var token = $('meta[name=csrf-token]').attr("content");

            $.ajax({
                url : '{{ route('assets.ajax-update') }}',
                type: 'POST',
                data: {_token: token, asset_id: asset_id, asset_title: asset_title, asset_alt: asset_alt},
                dataType : 'JSON',
                beforeSend: function() {
                    $('#edit-btn').html('Processing...');
                },
                success: function(data){
                    if(data.data != '' && data.data != null){
                        $('#asset-title').val(data.data.title);
                        $('#asset-alt').val(data.data.alt);
                        $('#edit-btn').html('Update');
                    }
                }
            });
        }
        function deleteAsset(id){
            var asset_id = id;
            var token = $('meta[name=csrf-token]').attr("content");
            $.ajax({
                url : '{{ route('assets.ajax-delete') }}',
                type: 'POST',
                data: {_token: token, asset_id: asset_id},
                dataType : 'JSON',
                success: function(data){
                    if(data.data == 'success'){
                        location.reload();
                    }
                }
            });
        }
    </script>

@endpush