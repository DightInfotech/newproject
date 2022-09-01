@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Gallery Pages</a></li>
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
                                <h3>Memorandum Gallery Pages</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <a  class="addnew-btn" href="{{route('create.gallery-pages',$memorandum->id)}}">Create new page</a>
                                    <div class="job-item-details">
                                    @if(!empty($gallery_pages))
                                        @foreach($gallery_pages as $rec)
                                            <!-- item -->
                                                <div class="single-job-item">
                                                    <div class="top-row">
                                                        <div class="col-left">
                                                            <h5><a href="{{ route('edit.gallery-pages', $rec->id) }}">{{ $rec->title }}</a>
                                                            <br>
                                                                <span>@if($rec->template == '2P'){{'2 Portrait Images Template'}}
                                                                      @elseif($rec->template == '2L'){{'2 Landscape Images Template'}}
                                                                      @else {{'6 Images Template'}} @endif
                                                                </span></h5>
                                                        </div>
                                                        <div class="col-right">
                                                            <ul class="list-jobs-info">

                                                                <li>
                                                                    <!-- Single button -->
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn  btn-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                            Action <span class="caret"></span>
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="{{route('edit.gallery-pages', $rec->id) }}">Edit</a></li>
                                                                            <form method="post" action="{{route('delete.gallery-pages',$rec->id)}}" id="delete_{{$rec->id}}">
                                                                                {!! csrf_field() !!}
                                                                                {!! method_field('DELETE') !!}
                                                                                <li><a href="javascript:void(0);" onclick="if(confirmDelete()){ document.getElementById('delete_<?=$rec->id;?>').submit(); }">
                                                                                        Delete </a></li>
                                                                            </form>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                        </div><br style="clear:both"/>
                                                    </div>
                                                </div><!-- item -->
                                            @endforeach
                                            <div class="text-center">
                                                {{$gallery_pages->links()}}
                                            </div>
                                        @else
                                           <div class="row">
                                               <div class="text-center">
                                                 <p>No Record found</p>
                                               </div>

                                           </div>
                                        @endif
                                    </div>
                                    @if($gallery_pages->count() > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.description.amenities', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <a href="{{ route('load.description.plat-maps', $memorandum->id) }}" name="submit"
                                                       class="btn btn-action pull-right"
                                                       style="margin-right: 15px;">NEXT/SAVE
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-20-gallery.jpg') }}" class="img-responsive">
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
