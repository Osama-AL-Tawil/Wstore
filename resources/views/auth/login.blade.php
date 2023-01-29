<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
@include('includes.bootstrap')
<!--===============================================================================================-->
{{--    <link rel="icon" type="image/png" href="{{asset('auth_style/images/icons/favicon.ico')}}"/>--}}
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth_style/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth_style/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('auth_style/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('auth_style/css/main.css')}}">
    <!--===============================================================================================-->
{{--    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>--}}
{{--    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>--}}

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="padding-bottom: 10px">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('auth_style/images/img-01.png')}}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                   @csrf

                <span class="login100-form-title"> {{ __('Login') }} </span>

                <div class="wrap-input100">
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="email" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"> <i class="fas fa-envelope" aria-hidden="true"> </i></span>
                </div>




                <div class="wrap-input100">
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="password" name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"> <i class="fa fa-lock" aria-hidden="true"> </i></span>
                </div>

                <div class="ml-3">
                    @if(session()->has('error-message'))
                        <small class="text-danger"> <strong>{{ session()->get('error-message')}}</strong> </small>
                    @endif
                </div>


                <div class="form-inline ml-3 row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember"
                                   id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember" style="font-size: 15px">
                                {{ __('Remember Me') }}
                            </label>

                </div>


                </div>




                <div class="container-login100-form-btn" style="padding-top: 10px">
                    <button type="submit" class="login100-form-btn" name="reg_user" >
                        {{ __('Login') }}
                    </button>
                </div>


                <div class="text-center p-t-12">
                    <span class="txt1">Don't have account?</span>
                    <a class="txt2" href="{{route('register')}}">
                       {{__('register')}}
                    </a>
                </div>


                <div class="text-center">
                    <span class="txt1"> {{ __('Forgot Your Password?') }}</span>
                    @if (Route::has('password.request'))
                    <a class="txt2" href="{{ route('password.request') }}">
                       reset
                    </a>
                    @endif
                </div>

            </form>

        </div>
    </div>
</div>


@include('includes.js')
<script src="{{asset('auth_style/tilt/tilt.jquery.min.js')}}"></script>
<script src="{{asset('auth_style/js/main.js')}}"></script>
<script >
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>

</body>
</html>
