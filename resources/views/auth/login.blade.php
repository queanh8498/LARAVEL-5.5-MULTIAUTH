
@extends('frontend.layouts.master')

@section('title')
HOUZIE | Login
@endsection

@section('custom-css')

<style>
    @import url("https://fonts.googleapis.com/css?family=Baloo|Nunito Sans|Muli|Roboto|Gugi|Roboto+Mono|Roboto+Mono:wght@100;300;40|Quicksand:wght@500|Quicksand");
    
    .content h3{
        font-family: Quicksand, sans-serif;
        letter-spacing: 1px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px; 
    }
    form{
        margin: 0px auto;
        width: 500px;
        border: 1px solid #ccc;
        padding: 30px;
    }
    label{
        font-family: Quicksand, sans-serif;
        font-weight: bold;
        letter-spacing: 1px;
    }
    .form-control{
        width: 200px;
    }
</style>
@endsection

@section('main-content')
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background: linear-gradient(rgba(23, 23, 24, 0.7), rgba(30, 30, 31, 0.7)), url('https://www.ikea.com/ext/gateway/assets/img/background/gw201908_desktop.jpg');height=500px;">
<h3 class="ltext-105 cl0 txt-center">
L O G I N
    </h3>
</section>

<div class="container">
	<div class="content mt-5">
        <form method="post" action="{{ route('login') }}">
			{{ csrf_field() }}
			
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">E-Mail</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block" >
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-outline-dark">
                        Login
                    </button>

                    <a class="btn btn-dark" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div>
            <br>
        </form>
	</div>
</div>
@endsection


@section('custom-scripts')

@endsection