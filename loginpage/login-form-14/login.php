
<!doctype html>
<html lang="en">
<?php
include ("connect.php");
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/DE/Homepage/assets/img/logo-no-background.png" rel="icon">
	<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
button {
    transition: all .5s ease;
    color:  #FF474D;
    border: 3px solid  #FF474D;
    font-family:'Montserrat', sans-serif;
    text-transform: uppercase;
    text-align: center;
    line-height: 1;
    font-size: 17px;
    background-color : 	#D3D3D3;
    padding: 10px;
    outline: none;
    border-radius: 4px;
	width:460px;
	height:50px
}
button:hover {
    color:  #FFF;
    background-color:  #FF474D;
}

</style>
	</head>
	<body>
	<div class="logo">
			<a href="/DE/Homepage/index.html"><img src="/DE/Homepage/assets/img/logo-no-background.png" width="200px" height="100px"/></a>
	</div>

	<section class="ftco-section" style="background-color:#b6d0e2; padding-top:50px;">
		<div class="container">
			<div class="row justify-content-center" >
				<div class="col-md-6 text-center mb-5">
					
				</div>
			</div>
			<div class="row justify-content-center">
			<div class="col-md-9 col-lg-12" style="width: 80%; margin: 0 auto;">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(images/photo.jpg); height :200; width: 200">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h6 class="mb-2" style="margin-right: 20px;
    font-weight: 900;
    color: #222;
    font-family: 'Montserrat';
    font-size: 24px;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 40px;">LOGIN ACCOUNT</h6>
			      		</div>
								<div class="w-100">
								<p class="social-media d-flex justify-content-end">
    <a href="#" class="social-icon d-flex align-items-center justify-content-center" style="color: #FF474D;"><span class="fa fa-facebook"></span></a>
    <a href="#" class="social-icon d-flex align-items-center justify-content-center" style="color: #FF474D;"><span class="fa fa-twitter"></span></a>
</p>

								</div>
			      	</div>
					 


							<form action="#" class="signin-form" method="POST">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Email</label>
			      			<input type="email" class="form-control" name="email" placeholder="Email" required>
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input type="password" class="form-control"  name="password" placeholder="Password" required>
		            </div>
		            <div class="form-group">
					<button type="submit" name="submit" value="Login">SIGN IN</button>

</div>


		            <div class="form-group d-md-flex">
					<div class="w-50 text-left">
    <label class="checkbox-wrap checkbox-primary mb-0" style="color: #FF474D;">Remember Me
        <input type="checkbox" checked style="color: #FF474D;">
        <span class="checkmark" style="background-color: #FF474D; border-color: #FF474D;"></span>
    </label>
</div>
<?php 
if(isset($_POST['email']) || isset($_POST['password'])){
    if(isset($_POST['submit']))
    { 
        $em=$_POST['email'];
        $ps=$_POST['password'];
        $query = "SELECT * FROM `user` WHERE email='$em' and password='$ps'" ;
        $result = $con->query($query);
        $count = $result->num_rows;
        if($count==1){
           
            $user = $result->fetch_row();
            $_SESSION['userId'] = $user[0];
            echo "<script>alert('Login Successful');</script>";
			header("Location: /DE/vehicle_service_monitoring_system/service.php");
            exit(); // Ensure no further code is executed after the redirect

        } else {
            echo "<script>alert('Invalid Username/Password');</script>";
        }
    }
}
?>


									
		            </div>
		          </form>
		          <p class="text-center">Not a member? <a  href="http://localhost/DE/registerpage/colorlib-regform-8/index.php" style="color:#FF474D;">Sign Up</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

