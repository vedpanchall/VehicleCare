<?php
include ("connect.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link href="/DE/Homepage/assets/img/logo-no-background.png" rel="icon">
    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <style>
.button {
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button {
  background-color: white; 
  color: black; 
  border: 3px solid #008CBA;
  width:485px;
}

.button:hover {
  background-color: #008CBA;
  color: white;
}

</style>
</head>
<body>

    <div class="main">
    <?php

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "vehiclehealthcaredb";

// // Create connection
// $con=new mysqli("localhost","root","","vehiclehealthcaredb");
//     if ($con->connect_error) {
//     die("Connection failed: " . $con->connect_error);
// }

// Assuming form submission has happened


if(isset($_POST['First_name']) && isset($_POST['Last_name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['Phone_Number'])) {
    $fn = $_POST['First_name'];
    $ln = $_POST['Last_name'];
    $em = $_POST['email'];
    $ps = $_POST['password'];
    $st = $_POST['state'];
    $ci = $_POST['city'];
    $pn = $_POST['Phone_Number'];

    // Prepare the SQL query
    $sql = "INSERT INTO `user` (First_name, Last_name, email, password, state, city, phone_number) VALUES ('$fn', '$ln', '$em', '$ps', '$st', '$ci', '$pn')";

    if ($con->query($sql) === TRUE) {
        echo "<p style='color:green;' align='center'>Data inserted successfully</p>";
        $last_id = $con->insert_id;
        $_SESSION['userId'] = $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>
        <section class="signup" >
        <!-- <div class="logo">
			<a href="/DE/Homepage/index.html"><img src="/DE/Homepage/assets/img/logo-no-background.png" width="200px" height="100px"/></a>
	    </div> -->
            <!-- <img src="images/photo.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content"  >
                    <form method="POST" id="signup-form" class="signup-form" >
                        <h2 class="form-title">Create account</h2>  
                        <div class="form-group" >
                   
                           <input type="text" class="form-input" name="First_name" id="First_name" placeholder="First Name"/ required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="Last_name" id="Last_name" placeholder="Last Name"/ required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" name="email" id="email" placeholder="Email"/ required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input" name="password" id="password" placeholder="Password"/ required>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                        
                                <select  class="form-input" name="state"  id="state-dropdown" required>
								<option checked>Select State</option>
									<option value="1">Gujarat</option>
									<option value="2">Maharastra</option>
									<option value="3">Rajastan</option>
								</select>        
                        </div>
                        <div class="form-group">
                        
                                <select  class="form-input" name="city"  id="city-dropdown" required>
								<option checked>Select City</option>
                                <script>
                           $(document).ready(function() {
                           $('#state-dropdown').on('change', function() {
	                       $('#city-dropdown').html();
                           var State_ID = this.value;
                          // alert(state_id);
                           $.ajax({
                           url: "state-by-city.php",
                           type: "GET",
                           data: {
                           State_ID: State_ID
                           },
                           cache: false,
                           success: function(result){
                           $('#city-dropdown').html(result); 
                           }
                           });
                           });
                           });    
                           </script>
								</select>        
                        </div>
                        <div class="form-group">
                        <input type="tel" class="form-input" name="Phone_Number" id="Phone_Number" placeholder="Phone Number"/ required>
                            <span toggle="#phone_number" class="zmdi zmdi-eye field-icon toggle-phone_number"></span>
                        </div>
                        
                        
                        <div class="form-group">
                        <button class="button button">SIGN UP</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? <a href="http://localhost/DE/loginpage/login-form-14/login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>