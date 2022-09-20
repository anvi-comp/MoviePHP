<?php include('../conn/conn.php');
session_start();
//$_SESSION['sess_user'] = '';
//if(empty($_SESSION['sess_user'])){
//session_destroy();}?>
<?php
if(isset($_POST["submit"])){

	echo $_POST['user'];

if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['cpass'])) {
        $name = $_POST['name'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
        $cpass = $_POST['cpass'];
		echo $user;
        if($pass == $cpass) {
            $query = mysqli_query($conn,"select id,name,username, password from user where username='".$user."' and active='Y'");
            $row=mysqli_fetch_assoc($query);
            if(empty($row)){
                $query = mysqli_query($conn, "insert into user (name, username, password) values ($name,$user,$pass)");
                $row = mysqli_fetch_assoc($query);
                if(empty($row)){
                    echo "<script type ='text/javascript'> alert('Please try again'); </script>";
                }else {
                    echo "<script type ='text/javascript'> alert('User Created succesfully'); window.location.href='index.php';</script>";
                }
            }//else{
               // echo "<script type ='text/javascript'> alert('Username exists, Please try another'); </script>";
            //}
        }else{
            echo "<script type ='text/javascript'> alert('Password mismatch'); </script>";
        }

    }
}else{
    //echo "<script type ='text/javascript'> alert('Please try again'); </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
    <title>SignUp</title>
</head>
<body>
  <!--  <form>
        <input type="text" id="name" name="name" placeholder="name">
        <input type="text" id="user" name="user" placeholder="username">
        <input type="password" id="pass" name="pass" placeholder="password">
        <input type="password" id="cpass" name="cpass" placeholder="confirm password">
        <button name="submit" id="submit" name="submit"> Sign Up </button>
    </form>   --> 
    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Member Signup
					</span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" id="user" placeholder="Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="user" id="user" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" id="pass" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                   
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit" id="submit" >
							SignUp
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
    <!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript">
		function myfunction(x){
			x.style.background = "red";
		}
	</script>
</body>
</html>