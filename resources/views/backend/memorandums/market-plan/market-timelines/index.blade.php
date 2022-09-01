@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Market Timeline Pages</a></li>
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
                                <h3>Market Timeline Pages</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <a  class="addnew-btn" href="{{route('create.market-plan.timeline.pages',$memorandum->id)}}">Create new page</a>
                                    <div class="job-item-details">
                                    @if(!empty($market_timeline_pages))
                                        @foreach($market_timeline_pages as $rec)
                                            <!-- item -->
                                                <div class="single-job-item">
                                                    <div class="top-row">
                                                        <div class="col-left">
                                                            <h5><a href="{{ route('edit.market-plan.timeline.pages', $rec->id) }}">{{ $rec->title }}</a></h5>
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
                                                                            <li><a href="{{route('edit.market-plan.timeline.pages', $rec->id) }}">Edit</a></li>
                                                                            <form method="post" action="{{route('delete.market-plan.timeline.pages',$rec->id)}}" id="delete_{{$rec->id}}">
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
                                                {{$market_timeline_pages->links()}}
                                            </div>
                                        @else
                                           <div class="row">
                                               <div class="text-center">
                                                 <p>No Record found</p>
                                               </div>

                                           </div>
                                        @endif
                                    </div>
                                    @if($market_timeline_pages->count() > 0)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.market-plan.section.cover', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <a href="{{ route('memorandums.index') }}" name="submit"
                                                       class="btn btn-action pull-right"
                                                       style="margin-right: 15px;">FINISH/SAVE
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="image-container">
                                        <img src="{{ asset('memorandums/Page-54.jpg') }}" class="img-responsive">
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
