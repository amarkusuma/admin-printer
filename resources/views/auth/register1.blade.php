<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/popper.js.map"></script> --}}
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<span class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
                    @csrf
					{{-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> --}}

					

					<span class="login100-form-title p-b-25 p-t-10">
						Register
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Enter name">
						<input class="input100 @error('name') is-invalid @enderror" id="name" type="name" name="name" placeholder="name"   value="{{ old('name') }}" required autocomplete="name" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					@if($errors->has('name'))
					<div class="error" style="font-size: 13px">{{ $errors->first('name') }}</div>
					@endif
					</div>
					

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input class="input100 @error('email') is-invalid @enderror" id="email" type="email" name="email" placeholder="email"   value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100" data-placeholder="&#xf207;">
						</span>
					@if($errors->has('email'))
					<div class="error" style="font-size: 13px">{{ $errors->first('email') }}</div>
					@endif
					</div>
					
					

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100 @error('password') is-invalid @enderror " type="password" name="password" required autocomplete="new-password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					@if($errors->has('password'))
					<span class="error " style="font-size: 13px" >{{ $errors->first('password') }}</span>
					@endif
					</div>
					
					

                    <div class="wrap-input100 validate-input" data-validate="Enter password-confirm">
						<input class="input100 @error('password-confirm') is-invalid @enderror " type="password" name="password_confirmation"  required autocomplete="new-password" placeholder="password-confirm">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						@if($errors->has('password'))
					<span class="error " style="font-size: 13px">{{ $errors->first('password') }}</span>
					@endif
					</div>
					
					
                    
					{{-- <div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> --}}
                    <div class="contact100 ">
					     <div class="g-recaptcha" 
                            data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                         </div>
					</div>
					@if($errors->has('g-recaptcha-response'))
					<div class="error p-t-15" style="font-size: 13px">{{ $errors->first('g-recaptcha-response') }}</div>
					@endif

					<div class="container-login100-form-btn p-t-30">
						<button class="login100-form-btn" type="submit">
							register
						</button>
					</div>

					<div class="text-center p-t-30">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>