<?php
session_start();
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="mystyles.css">

    <title>Sofea.Co | Login</title>

    <style>
        body {
            background-image: url("img/sofealogin.jpg");
            opacity: 0.9;
            background-position:center center;
            }
        
        .login{
            background-color: #FFFFFF;
            width: 700px;
            margin: auto;
            padding: 45px;
            justify-content: center;
            }
    </style>

</head>
<body>
    
    <div class="container-fluid">
        <div class="login">
            <form action="login.php" method="post">

                <h1>User Login</h1>
                <p>Sign in to get exclusive deals from Sofea.Co</p>

<?php

if($_SERVER['REQUEST_METHOD']  == "POST"){
    $user_name  = $_POST['user_name'];
    $password   = $_POST['password'];

    if(!empty($user_name) && !empty($password)){
        $sql = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
        $result = mysqli_query($con,$sql);
    
    if($result)
    {
        if(!$row['username'] == "admin")
        {
                if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                if($user_data['password']=== $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        else
        {
                if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if($user_data['password']=== "adminpassword")
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: admindashboard.html");
                    die;
                }
            }
        }
    }
    echo 'Wrong username or password!';
    }

    else{
        echo 'Something did not go right, please try again';
    }
}
?>
                
                    <input type="text" class="form-control" placeholder="Username" name="user_name" required><br>

                    <input type="password" class="form-control" placeholder="Password" name="password" required><br>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">Remember Me</label>
                        </div><br>

                    <button type="submit" class="btn btn-primary" name="create">Log In</button><br>

                    <hr>
                    <a href = # >Forgot your password?</a><br>
                    <p>Don't have an account?<a href = "registration.php"> Sign up here.</a></p>
            </form>
        </div>
    </div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>