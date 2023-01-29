<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
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
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="{{asset('auth_style/images/img-01.png')}}" alt="IMG">
            </div>

            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
             @csrf
                <span class="login100-form-title">
						Register,Create New Accoint
					</span>


                <div class="wrap-input100" >
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="text" name="name" placeholder="User Name" value="{{ old('name') }}" required autocomplete="name">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fas fa-user-alt" aria-hidden="true"></i>
						</span>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>



                <div class="wrap-input100">
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fas fa-envelope" aria-hidden="true"></i>
						</span>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>




                <div class="wrap-input100">
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>



                <div class="wrap-input100">
                    <input class="input100 form-control @if(session()->has('error-message')) is-invalid @endif" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="new-password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
                </div>

                <div class="ml-3">
                    @if(session()->has('error-message'))
                        <small class="text-danger"> <strong>{{ session()->get('error-message')}}</strong> </small>
                    @endif
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn" name="reg_user">
                       Register
                    </button>
                </div>

                <div class="text-center p-t-12">
                    <span class="txt1">Already a member?</span>
                    <a class="txt2" href="{{route('login')}}">
                       Login
                    </a>
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
