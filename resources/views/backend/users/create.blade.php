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

        @include('flash-notifications.form-errors')

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
                                <h3>Add User</h3>
                            </div>
                            <div class="col-sm-12 m-t-30"></div>
                            <div class="col-sm-12">
                                <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                                    {!! csrf_field() !!}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">First Name <em>*</em></label>
                                            <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Last Name <em>*</em></label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Phone <em>*</em></label>
                                            <input type="text" name="phone" class="form-control phone-mask" placeholder="Phone Number" value="{{ old('phone') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Email <em>*</em></label>
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Password <em>*</em></label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Confirm Password <em>*</em></label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Role <em>*</em></label>
                                            <select name="role" class="form-control" id="role">
                                                @if(!empty($roles))
                                                    @foreach($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="label-small">Image</label>
                                            <input type="file" name="image" onchange="readURL(this);">
                                            <img style="display: none;" id="img" src="" alt="agent avatar" width="200" height="200" />
                                            <br>
                                            <p>Please select a file to upload in one of the following formats .jpeg/.jpg/.png/.gif</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin-left: 15px">
                                                <button type="submit" name="submit" class="btn btn-action" value="save">Save User</button>
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
    <script>
        $("#role").change( function() {
            if($(this).val() == 2){
                $("#company-name").fadeOut();
            } else{
                $("#company-name").fadeIn();
            }
        });
    </script>
@endpush