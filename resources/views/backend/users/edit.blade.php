@extends("layouts.system")
@section("content")
    <div class="row">
        <div class="col-sm-12">
            <ul class="andmin-breadcrumb visible-xs visible-sm m-b-30">
                <li><a href="#">Agents</a></li>
            </ul>
        </div>
    </div>
    <div class="row relative-row">

        @include('flash-notifications.message')

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
                                <h3>Edit User</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <form action="{{route('users.update', $user->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">First Name <em>*</em></label>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ $user->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Last Name <em>*</em></label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ $user->last_name }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Phone <em>*</em></label>
                                            <input type="text" name="phone" class="form-control phone-mask" placeholder="Phone" value="{{ $user->telephone }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Email <em>*</em></label>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Role <em>*</em></label>
                                            <select name="role" class="form-control" id="role">
                                                @if(!empty($roles))
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}"
                                                            @foreach($user->roles as $user_role)
                                                                @if($user_role->id == $role->id)
                                                                   selected
                                                                @endif
                                                            @endforeach
                                                        >{{ $role->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Image</label>
                                            <input type="file" name="image" onchange="readURL(this);">
                                            <img style="display: {{ ($user->avatar) ? 'block' : 'none' }};" id="img" src="{{ Storage::disk('public')->url('/avatar/'.$user->avatar) }}" alt="agent avatar" width="200" height="200" />
                                            <br>
                                            <p> Please select a file to uplode in format .jpeg/.jpg/.png/.gif</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-left: 15px">
                                                <button type="submit" name="submit" class="btn btn-action" value="save">Save Page</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush