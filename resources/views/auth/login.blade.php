<!DOCTYPE html>
<html lang="en">
<head>
    <title>LIG Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="{{URL::asset('css/login.css')}}" rel="stylesheet">
</head>
<body>
<div class="page-wrapper">
    <div class="logo-top">
        <a href="#">
            <img src="{{asset("/images/login-logo.png")}}">
        </a>
    </div>

    <div class="container">
        <div class="page-wrapper-inner">
            <h2>Login Page</h2>
            <div class="form-section">
                <h3>Login</h3>
                @if (count($errors))
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {!! $error !!}
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{old('email')}}" />
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" />
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="remember"> Keep me signed in</label>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <button type="submit" class="btn-login">Submit</button>
                        </div>
                        <div class="col-md-7 forget-pw">
                            <a href="#" class="forget-password">Forgot Your Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class="footer">
        <div class="container">
            <div class="col-sm-6 col-md-6 col-xs-6">
                <p>© 2019 Le Investment Group</p>
            </div>
            <div class="col-sm-6 col-md-6 col-xs-6 text-right">
                <img src="{{asset("/images/brandmarketingagency.png")}}">
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>