<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

    @include('layouts.meta')
    @include('layouts.css')
</head>

<body class="welcome-pg">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron welcome-page">
                <h2>Welcome</h2>
                <h4>To use this platform first you must be logged in </h4>
                <br/><br/>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary login-btn">
                                    Login
                                </button>


                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@include('layouts.javascript')
</body>
</html>
