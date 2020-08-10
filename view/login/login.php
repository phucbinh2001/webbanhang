<?php
	session_start();
	include("../../model/connect.php");
	include("../../model/users.php");
	if (isset($_POST['login'])&&($_POST['login'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$checkuser = checkpass($user, $pass);
		if (count($checkuser)>0) {
			$_SESSION['sid']=$checkuser['id'];
			$_SESSION['suser']=$checkuser['user'];
			if ($checkuser['role']==1) {
				header("location: ../../controller/admin.php?act=qlsp");
			}else	
				header("location: ../../controller/index.php");
		}else{
			// $_SESSION['sid']=0;
			echo "Email hoặc mật khẩu không đúng"; 
		}
	}
	$err = "";
	if (isset($_POST['dangky'])&&($_POST['dangky'])) {
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$mail = $_POST['mail'];

		$checkuser2 = checkuser($user);
		if (!empty($checkuser2)) 
			$err = "Tài khoản đã tồn tại";
		else
			addUser($user, $pass, $mail);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Đăng nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
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
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<?php
					if (isset($_GET['idlogin'])&&($_GET['idlogin'])>0) {
						# code...
					
				?>
					<form action="login.php" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
					<span class="login100-form-title">
						Đăng ký
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng điền user">
						<input class="input100" type="text" name="user" placeholder="Tên đăng nhập">
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Vui lòng điền mail">
						<input class="input100" type="text" name="mail" placeholder="Mail">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Điền mật khẩu của bạn">
						<input class="input100" type="password" name="pass" placeholder="Mật khẩu">
						<span class="focus-input100"></span>
					</div>
                    
                    <!-- <div class="wrap-input100 validate-input" data-validate = "Please enter password">
						<input class="input100" type="password" name="repass" placeholder="Nhập lại mật khẩu">
						<span class="focus-input100"></span>
					</div> -->

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2">
							Username / Password?
						</a>
					</div>
					<div class="err"><?php
					echo $err	?></div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" value="Đăng ký" name="dangky">
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Đã có tài khoản?
						</span>

						<a href="login.php?idlogin=0" class="txt3">
							Đăng nhập ngay
						</a>
					</div>
				</form>
					<?php
					}else{
					?>
					<form action="login.php" method="post" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
						<span class="login100-form-title">
							Đăng nhập
						</span>

						<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
							<input class="input100" type="text" name="user" placeholder="Username">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Please enter password">
							<input class="input100" type="password" name="pass" placeholder="Password">
							<span class="focus-input100"></span>
						</div>

						<div class="text-right p-t-13 p-b-23">
							<span class="txt1">
								Forgot
							</span>

							<a href="#" class="txt2">
								Username / Password?
							</a>
						</div>

						<div class="container-login100-form-btn">
							<input class="login100-form-btn" type="submit" value="Sign in" name="login">
						</div>

						<div class="flex-col-c p-t-170 p-b-40">
							<span class="txt1 p-b-9">
								Chưa có tài khoản	
							</span>

							<a href="login.php?idlogin=1" class="txt3">
								Đăng ký ngay
							</a>
						</div>
					</form>
					<?php }?>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
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