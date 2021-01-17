@extends('app')
@section('content')
    <div class="login dropbox">
        <form method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <input name="email" placeholder="E-Mail Address" type="email">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <input name="password" placeholder="Password" type="password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <div class="agree">
                <input id="remember" name="remember" type="checkbox">
                <label for="remember"></label>Remember Me
            </div>
            <input class="animated" type="submit" value="Login">
        </form>
        <a class="forgot" href="{{'/password/reset'}}">Forgot Your Password?</a>
    </div>
@endsection