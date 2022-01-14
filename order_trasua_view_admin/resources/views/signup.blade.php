<!DOCTYPE html>

<head>
	<title>Đăng ký</title>
	<meta name="signup" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- bootstrap-css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- //bootstrap-css -->
	<!-- Custom CSS -->
	<link href="{{asset('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
	<link href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet" />
	<!-- font CSS -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- font-awesome icons -->
	<link rel="stylesheet" href="{{asset('backend/css/font.css')}}" type="text/css" />
	<link href="{{asset('backend/css/font-awesome.css')}}" rel="stylesheet">
	<!-- //font-awesome icons -->
	<script src="js/jquery2.0.3.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</head>

<body>
	<div class="log-w3">
		<div class="w3layouts-main">
			<h2>Đăng ký</h2>
			<form action="postSignUp" method="post">
				{{ csrf_field() }}
				@foreach($errors->all() as $val)
				<ul>
					<li>{{$val}}</li>
				</ul>
				@endforeach
				<input type="text" class="ggg" name="name" placeholder="Tên" required="">
				<input type="email" class="ggg" name="email" placeholder="Email" required="">
				<input type="password" class="ggg" name="password" placeholder="Password" required="">
				<input type="password" class="ggg" name="passwordAgain" placeholder="PasswordAgain" require="">
				<input type="date" class="ggg" name="dateOfBirth" placeholder="Ngày sinh" required="">
				<input type="text" class="ggg" name="phone" placeholder="Số điện thoại" required="">
				<select class="form-select" name="sex" aria-label=".form-select-sm example">
					<option name="sex" value="1">Nữ</option>
					<option name="sex" value="0">Nam</option>
				</select></input>
				<input type="text" class="ggg" name="address" placeholder="Address" required="">
				@if(session('thongbao'))
            <div class="text-alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
				<div class="clearfix"></div>
				<input type="submit" value="Đăng ký" name="login">
			</form>
		</div>
	</div>
	<script src="{{asset('backend/js/bootstrap.js')}}"></script>
	<script src="{{asset('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
	<script src="{{asset('backend/js/scripts.js')}}"></script>
	<script src="{{asset('backend/js/jquery.slimscroll.js')}}"></script>
	<script src="{{asset('backend/js/jquery.nicescroll.js')}}"></script>
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
	<script src="{{asset('backend/js/jquery.scrollTo.js')}}"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>
