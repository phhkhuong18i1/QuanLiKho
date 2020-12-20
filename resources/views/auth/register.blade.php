<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <base href="{{ asset('') }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Signup</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->
</head>

<body class="login-img3-body">

  <div class="container">
  

    <form style="margin:100px auto 0;" class="login-form" action="" method="POST">
    @csrf
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="name" placeholder="Name" autofocus>
          <span class="error-form"></span>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" name="email" placeholder="E-mail" autofocus>
          <span class="error-form"></span>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="password" placeholder="Password">
          <span class="error-form"></span>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" name="passwordAgain" placeholder="PasswordAgain">
          <span class="error-form"></span>
        </div>
       
        <button id="js-btn-signup" class="btn btn-primary btn-lg btn-block " type="submit"><b>Signup</b></button>
        <br>
        <center>you have account? <b><a  href="qlkho/dangnhap">Login</a></b></center>
      </div>
    </form>
    
  </div>
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <!-- nice scroll -->
  <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
  <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
  <!-- gritter -->

  <!-- custom gritter script for this page only-->
  <script src="{{ asset('js/gritter.js') }}" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="{{ asset('js/scripts.js') }}"></script>
  <script src="assets/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

  <script>


$('#js-btn-signup').click(function (e) {
	e.preventDefault();
	$(".error-form").empty();
	let $this = $(this);
	let $domForm = $this.closest('form');
	
console.log(e);
	$.ajax({
		url: 'qlkho/dangki',
		data: $domForm.serialize(),
		method : "POST",
	}).done(function (results) {
			// ẩn modal
		alert('Đăng Ký Thành Công');
		window.location='qlkho/dangnhap';

			// làm mới lại form khi đăng kí thành công
	}).fail(function (data) {
		var errors = data.responseJSON;
		$(".error-form").empty();
		$.each(errors.errors, function (i, val) {
			$domForm.find('input[name=' + i + ']').siblings('.error-form').text(val[0]);
		});
	});
})

</script>

</body>

</html>
