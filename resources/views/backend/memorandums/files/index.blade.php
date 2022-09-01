@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="{{route('memorandums.index')}}">Memorandum Files</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-tb-zero">View and Manage Memorandum Files</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 pagination-purple">
            <p>Showing <span class="js-live-search-posts-res-count"></span>{{count($files)}} of  memorandum files {{$files->total()}}</p>
        </div>
        {{--@include('notifications.message')--}}
    </div>
    @include('flash-notifications.message')
    <div class="row m-t-50">
        <div class="col-sm-12">
            <div class="job-item-details">
            @if(!empty($files))
                @foreach($files as $rec)
                    <!-- item -->
                        <div class="single-job-item">
                            <div class="top-row">
                                <div class="col-left">
                                    <h5><a href="{{ route('memo.file.send', $rec->id) }}">{{ $rec->file_name }}</a></h5>
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
                                                    <li><a href="{{ route('memo.file.send', $rec->id) }}">Send PDF</a></li>
                                                    <li><a href="{{ route('pdf.download', $rec->memorandum_id) }}">Download PDF</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div><br style="clear:both"/>
                            </div>
                        </div><!-- item -->
                    @endforeach
                    <div class="text-center">
                        {{$files->links()}}
                    </div>
                @else
                    No Record found
                @endif
            </div>
        </div>
    </div>
@endsection