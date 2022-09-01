@extends('layouts.system')
@section('content')
    <div class="row">
            <div class="col-sm-12 col-md-5 col-lg-4">
                <div class="aside-welcome">
                    <div class="text-center">
                        <div class="user-image"><!-- <img src="images/photo.jpg" alt="img"/> --></div>
                        <h2>Welcome!</h2>
                        <p>{{date('l jS F Y')}}</p>
                    </div>
                </div>
            </div>
        </div>
@endsection