<div class="modal" id="m_modal_4" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">select or upload file</h2>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#upload">Upload File</a></li>
                    <li><a data-toggle="tab" href="#gallery">Gallery</a></li>
                </ul>

                <div class="tab-content" style="margin-top:10px;">
                    <div id="upload" class="tab-pane fade in active">
                        <form action="{{ route('upload-assets') }}"
                              class="dropzone"
                              id="myAwesomeDropzone">
                            {!! csrf_field() !!}
                            <div class="fallback">
                                <input name="file" type="file"/>
                            </div>
                        </form>
                    </div>
                    <div id="gallery" class="tab-pane fade">
                        <div class="row" id="assets" style="height:400px; overflow: auto">
                            @if(!empty($assets))
                                @foreach($assets as $asset)
                                    <div class="col-md-2" style="margin: 5px;">
                                        <div id="res_{{$asset->id}}" data-id="{{$asset->id}}" onclick="check({{$asset->id}})" style="cursor: pointer">
                                            <img src="{{Storage::disk('s3')->url('assets/' . $asset->file)}}" style="height: 100px; width: 100px;">
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                No Assets Available
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modalClose" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
