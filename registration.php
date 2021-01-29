<?php
session_start();

include('config.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname      =  $_POST['fname'];
    $lname      = $_POST['lname'];
    $address1   = $_POST['address1'];
    $address2   = $_POST['address2'];
    $city       = $_POST['city'];
    $zip        = $_POST['zip'];
    $state      = $_POST['state'];
    $email      = $_POST['email'];
    $user_name  = $_POST['user_name'];
    $password   = $_POST['password'];

    if(!empty($fname) && !empty($lname) && !empty($address1) && !empty($address2) && !empty($city) && !empty($zip) && !empty($state) && !empty($email) && !empty($user_name) && !empty($password)){
    $sql = "INSERT INTO users (fname, lname, address1, address2, city, zip, state, email, user_name, password) VALUES ('$fname', '$lname', '$address1', '$address2', '$city', '$zip', '$state', '$email', '$user_name', '$password')";
    
    mysqli_query($con, $sql);
    header("Location: login.php");
    }
    else {
		echo "Something went wrong, please try again";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/regstyle.css">

    <title>Sofea.Co | User Registration</title>

    <style>
        body {
            background-image: url("img/sofeabg.jpg");
            opacity: 0.9;
            background-position:center center;
            }
        
        .sign-up{
            background-color: #FFFFFF;
            width: 600px;
            height: 660px;
            margin: auto;
            padding: 15px;
            justify-content: center;
            }
        
    </style>

</head>
<body>
    
    <div class="container-fluid">
        <div class="sign-up">
            <div class = "col-12">
                <h1>Join the Sofea.Co community</h1>
                <p>To sign up as a member, you are required to fill in the respective fields</p><br>
                
                <!--multisteps-form-->
                <div class="multisteps-form">
                    <!--progress bar-->
                    <div class="row">
                    <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
                        <div class="multisteps-form__progress">
                        <button class="multisteps-form__progress-btn js-active" type="button" title="Personal Details">Personal Details</button>
                        <button class="multisteps-form__progress-btn" type="button" title="Account Details">Account Details</button>
                        </div>
                    </div>
                    </div>

                <!--form panels-->
                <div class="col m-auto">
                    <form class="multisteps-form__form" action="registration.php" method="post">

                    <!--Personal Detail panel-->
                    <div class="multisteps-form__panel p-4 rounded js-active" data-animation="scaleIn">
                        <h3 class="multisteps-form__title">Personal Details</h3>
                        <div class="multisteps-form__content">
                        <div class="form-row mt-4">
                        <div class="col">
                        <p>First Name</p>
                        <input type="text" class="multisteps-form__input form-control" name="fname" placeholder="First Name" required>
                        </div>

                        <div class="col">
                        <p>Last Name</p>
                        <input type="text" class="multisteps-form__input form-control" name="lname" placeholder="Last Name"required>
                        </div>
                    </div><br>

                    <div class="form-group">
                        <p>Address</p>
                        <input type="text" class="multisteps-form__input form-control" name="address1" placeholder="1234 Main St" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="multisteps-form__input form-control" name="address2" placeholder="Apartment, studio, or floor">
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="multisteps-form__input form-control" name="city" placeholder="City" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <input type="text" class="multisteps-form__input form-control" name = "zip" placeholder="Zip Code" required>
                        </div>
                        <div class="col-md-3 mb-3">
                        <select class="custom-select mr-sm-2" name="state" required>
                            <option selected>State</option>
                            <option value="1">Johor</option>
                            <option value="2">Kedah</option>
                            <option value="3">Kelantan</option>
                            <option value="4">Melaka</option>
                            <option value="5">Negeri Sembilan</option>
                            <option value="6">Pulau Pinang</option>
                            <option value="7">Pahang</option>
                            <option value="8">Perak</option>
                            <option value="9">Perlis</option>
                            <option value="10">Sabah</option>
                            <option value="11">Sarawak</option>
                            <option value="12">Selangor</option>
                            <option value="13">Terengganu</option>
                            <option value="14">Wilayah Persekutuan</option>
                        </select>
                        </div>
                    </div>

                        <button type="button" class="btn btn-dark ml-auto js-btn-next" title="next">Next</button><br>
                        </div>
                    </div>
                </div>

                <!--Account Details panel-->
                <div class="col">
				<div class="acc-dec">
                <div class="multisteps-form__panel p-4 rounded" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Account Details</h3>
				
                <div class="multisteps-form__content">
				<div class="form-group">
                <input type="email" class="multisteps-form__input form-control" placeholder="Email" name="email" required><br>
				</div>
				
				<div class="form-group">
                <input type="text" class="multisteps-form__input form-control" placeholder="Username" name="user_name" required><br>
				</div>
				
                <div class="form-row">
                    <div class="col">
                    <input type="password" name="password" class="multisteps-form__input form-control" placeholder="Password" aria-describedby="passwordHelpInline">
                    </div>

                    <div class="col">
                    <small id="passwordHelpInline" class="text-muted">
                    Must be 8-20 characters long.
                    </small>
                    </div>
                </div><br>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">I have read and agree to the terms of Sofea.Co membership</label>
                    </div><br>

                    <div class="button-row d-flex mt-4">
                        <button class="btn btn-light js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn btn-success ml-auto" type="submit" name="create">Sign Up</button>
                    </div>
                </div>
				</div>
                </div>
				
				</div>

				</div>
            </div>
            </form>
            </div>
        </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/dom-elements.js"></script>
</body>

</html>