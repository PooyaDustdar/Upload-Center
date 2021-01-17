@extends('app')
@section('content')
    <div class="login dropbox">
        <form method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <input name="username" placeholder="Username" type="text">
            @if ($errors->has('username'))
                    <strong>{{ $errors->first('username') }}</strong>
            @endif
            <input name="email" placeholder="E-Mail Address" type="email">
            @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
            @endif
            <input name="password" placeholder="Password" type="password">
            @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
            @endif
            <input name="password_confirmation" placeholder="Confirm Password" type="password">
            <input class="animated" type="submit" value="Register">
        </form>
        <a class="forgot" href="{{'/login'}}">Already have an account?</a>
    </div>
@endsection
