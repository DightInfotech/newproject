@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Memorandum Projection Increments</a></li>
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
                                <h3>Memorandum Projection Increments</h3>
                            </div>
                            <div class="col-sm-6 m-t-30"></div>
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    @if($projection_increments->count() < 10)
                                        <a  class="addnew-btn" href="{{route('create.projection-increment',$memorandum->id)}}">Add Projection year Increment</a>
                                    @endif
                                    <div class="job-item-details">
                                        @if($projection_increments->count() == 0)
                                            <button type="button" name="skip"
                                                    class="btn btn-action pull-right" value="Skip"
                                                    style="margin-right: 15px;" onclick="location.href='{{route('load.description.cover.page',$memorandum->id)}}'">Skip
                                            </button>
                                        @endif
                                    @if(!empty($projection_increments))
                                        @foreach($projection_increments as $rec)
                                            <!-- item -->
                                                <div class="single-job-item">
                                                    <div class="top-row">
                                                        <div class="col-left">
                                                            <h5><a href="{{ route('edit.projection-increment', $rec->id) }}">{{ 'Year '.$rec->year }}</a></h5>
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
                                                                            <li><a href="{{route('edit.projection-increment', $rec->id) }}">Edit</a></li>
                                                                            <form method="post" action="{{route('delete.projection-increment',$rec->id)}}" id="delete_{{$rec->id}}">
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
                                                {{$projection_increments->links()}}
                                            </div>
                                        @else
                                            No Record found
                                        @endif
                                    </div>
                                    @if($projection_increments->count() == 10)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <a href="{{ route('load.financial.projections', $memorandum->id) }}"
                                                       class="btn btn-danger" style="margin-left: 15px;">BACK</a>
                                                    <a href="{{ route('load.description.cover.page', $memorandum->id) }}" name="submit"
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
                                        <img src="{{ asset('memorandums/Page-7-10year.jpg') }}" class="img-responsive">
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
