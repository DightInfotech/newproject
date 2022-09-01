@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="{{route('users.index')}}">Users</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="m-tb-zero">View and Manage Users</h3>
        </div>
        <div class="col-sm-6 text-right">
            <a href="{{route('users.create')}}" class="addnew-btn">Add User</a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 pagination-purple">
            <p>Showing <span class="js-live-search-posts-res-count"></span>{{count($users)}} of  users {{$users->total()}}</p>
        </div>
        {{--@include('notifications.message')--}}
    </div>
    @include('flash-notifications.message')
    <div class="row m-t-50">
        <div class="col-sm-12">
            <div class="job-item-details">
            @if(!empty($users))
                @foreach($users as $rec)
                    <!-- item -->
                        <div class="single-job-item">
                            <div class="top-row">
                                <div class="col-left">
                                    <h5><a href="{{ route('users.edit', $rec->id) }}">{{ $rec->first_name.' '.$rec->last_name }}</a></h5>
                                    @foreach($rec->roles as $role)
                                        @if($loop->index >= 1 && $loop->index < length($rec->roles) - 1)
                                            {{ ', ' }}
                                        @endif
                                        {{$role->name}}
                                    @endforeach
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
                                                    <li><a href="{{route('users.edit', $rec->id) }}">Edit</a></li>
                                                    <form method="post" action="{{route('users.destroy',$rec->id)}}" id="delete_{{$rec->id}}">
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
                        {{$users->links()}}
                    </div>
                @else
                    No Record found
                @endif
            </div>
        </div>
    </div>
@endsection