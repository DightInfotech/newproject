@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="{{route('memorandums.index')}}">Memorandums</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-tb-zero">View and Manage Memorandums</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('load.cover.page')}}" class="addnew-btn">Add Memorandum</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 pagination-purple">
            <p>Showing <span class="js-live-search-posts-res-count"></span>{{count($memorandums)}} of  memorandums {{$memorandums->total()}}</p>
        </div>
        {{--@include('notifications.message')--}}
    </div>
    @include('flash-notifications.message')
    <div class="row m-t-50">
        <div class="col-sm-12">
            <div class="job-item-details">
            @if(!empty($memorandums))
                @foreach($memorandums as $rec)
                    <!-- item -->
                        <div class="single-job-item">
                            <div class="top-row">
                                <div class="col-left">
                                    <h5><a href="{{ route('edit.memo', $rec->id) }}">{{ $rec->property_title }}</a></h5>
                                </div>
                                <div class="col-right">
                                    <ul class="list-jobs-info">

                                        <li>
                                            <!-- Single button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn  btn-action memo-action dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Action <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu memo-drop">
                                                    <li><a href="{{ route('pdf.generate', $rec->id) }}">Generate Offering Memo</a></li>
                                                    <li><a href="{{ route('pdf.market.generate', $rec->id) }}">Generate Marketing Analysis</a></li>
                                                    @if(isset($rec->job) && $rec->job->is_done == 1)
                                                        <li><a href="{{ route('pdf.download', $rec->id) }}">Download Offering Memo</a></li>
                                                    @endif
                                                    @if(isset($rec->market_job) && $rec->market_job->is_done == 1)
                                                        <li><a href="{{ route('pdf.market.download', $rec->id) }}">Download Market Analysis</a></li>
                                                    @endif
                                                    <li><a href="{{ route('edit.memo', $rec->id) }}">Edit</a></li>
                                                    <form method="post" action="{{ route('memorandums.destroy', $rec->id) }}" id="delete_{{$rec->id}}">
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
                        {{$memorandums->links()}}
                    </div>
                @else
                    No Record found
                @endif
            </div>
        </div>
    </div>
@endsection