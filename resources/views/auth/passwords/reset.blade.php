<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Jobotron</title>

    <!-- Bootstrap -->
    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">
    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,400i,700,900" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="frontend-admin">
<div class="login-wrapper">  </div>
<div class="vertical-center">
    <div class="display-table">
        <div class="table-cell">
            <h1 class="jobotron-logo">Jobotron</h1>
            <div class="center-form">
                <form action="{{ route('password.request') }}" method="post" class="m-t-20">
                    @if (count($errors))
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

                                {!! $error !!}
                            </div>
                        @endforeach
                    @endif
                    {{ csrf_field() }}
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <label class="sr-only">Email</label>
                        <input type="text" autocomplete="off" name="email" placeholder="Email " value="{{ old('email') }}" class="form-control"/>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="sr-only">Password</label>
                        <input type="password" autocomplete="off" name="password" placeholder="Password" class="form-control"/>
                    </div>
                    <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label class="sr-only">Password</label>
                        <input id="password-confirm" autocomplete="off" type="password" name="password_confirmation" placeholder="Password Confirm" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-lg-purple">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>