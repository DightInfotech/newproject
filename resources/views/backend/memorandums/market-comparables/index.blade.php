@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="{{route('market-comparable.index',$memorandum->id)}}">Market Comparables</a></li>
            </ul>
        </div>
    </div>
    @include('flash-notifications.form-errors')
    @include('flash-notifications.progress-bar')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-tb-zero">Find and manage market comparables</h3>
        </div>

    </div>

    <div class="row">
        <div class="col-sm-6 pagination-purple">
            <p>Showing <span class="js-live-search-posts-res-count"></span>{{count($market_comparables)}} of  market comparables {{$market_comparables->total()}}</p>
        </div>
    </div>

    <div class="row m-t-50">
        <div class="col-sm-12">
                <a href="{{route('market-comparable.create',$memorandum->id)}}" class="addnew-btn">Add Market Comparable</a>
            <div class="job-item-details">
                <div class="col-sm-6">
            @if(!empty($market_comparables))
                @foreach($market_comparables as $rec)
                    <!-- item -->
                        <div class="single-job-item">
                            <div class="top-row">
                                <div class="col-left">
                                    <h5><a href="{{ route('market-comparable.edit', $rec->id) }}">{{ $rec->name }}</a></h5>
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
                                                    <li><a href="{{route('market-comparable.edit', $rec->id) }}">Edit</a></li>
                                                    <form method="post" action="{{route('market-comparable.destroy',$rec->id)}}" id="delete_{{$rec->id}}">
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
                        {{$market_comparables->links()}}
                    </div>
                @else
                    No Record found
                @endif

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ route('load.market-comparable.map', $memorandum->id) }}"
                               class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                            @if($market_comparables->count() > 0)
                            <a href="{{ route('load.market-plan.section.cover', $memorandum->id) }}" name="submit"
                               class="btn btn-action pull-right"
                               style="margin-right: 15px;">NEXT/SAVE
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                </div>
                <div class="col-sm-6">
                    <div class="image-container">
                        <img src="{{ asset('memorandums/Page-35.jpg') }}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection