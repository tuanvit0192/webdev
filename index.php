<?php
  // Turn off all error reporting
    error_reporting(0);
session_start();

    
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
	if ($_SESSION["vaitro"] == "admin") header("location: admin.php");
	else header("location: student.php");
}
?>

<!DOCTYPE html><html><head>
	<title>Hệ thống quản lý lịch thi</title>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="style/images/icons/uet.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="style/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="style/css/util.css">
	<link rel="stylesheet" type="text/css" href="style/css/main.css">
<!--===============================================================================================-->
</head>
<body>
<!-- <h1> Trang đăng nhập</h1> -->
<h2 id="out"></h2>
<!-- <form id="login-form">
	Tên đăng nhập <input type="text" name="username" id="username"/> <br/>
	Mật khẩu <input type="password" name="password" id="password"/> <br/>
	<input type="submit" value="Đăng nhập"/>
</form> -->
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form id="login-form" class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
						Welcome!
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Nhập tên đăng nhập">
						<input class="input100" type="text" name="username" id="username">
						<span class="focus-input100" data-placeholder="Tên đăng nhập"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Nhập mật khẩu">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="password" id="password">
						<span class="focus-input100" data-placeholder="Mật khẩu"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Login
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Don’t have an account?
						</span>

						<a class="txt2" href="#">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
<div id="dropDownSelect1"></div>
	<script type="text/javascript" src="ajax/ajax.js"></script>
	<script>
		document.getElementById("login-form").onsubmit = function() {
			// Gui request bang AJAX
			let xmlhttp = getXmlHttpObject();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4) {
					// Nhan ket qua JSON
					let v = xmlhttp.responseText;
					console.log(v);
					let o = JSON.parse(v);
					console.log(o);
					if (v.length > 0) {
						// Cap nhat DOM
						//document.getElementById("out").innerText = v.toString();
						if (o.status == "thanhcong") window.location.href=o.location;
						// else document.getElementById("out").innerText = "Sai ten dang nhap/mat khau!";
						else window.alert("Sai tên đăng nhập/mật khẩu");
					}
				}
			};

			xmlhttp.open("POST", "login.php", true);
			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.send("name="+ document.getElementById("username").value +"&pass="+document.getElementById("password").value);

			
			//Bo gui request bang form
			return false;
		};
	</script>
	<!--===============================================================================================-->
	<script src="style/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="style/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="style/vendor/bootstrap/js/popper.js"></script>
	<script src="style/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="style/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="style/vendor/daterangepicker/moment.min.js"></script>
	<script src="style/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="style/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="style/js/main.js"></script>
</body>
</html>
