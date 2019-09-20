<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

</head>
<body>


<!-- Default form login -->
<div class="container">
<form method= "POST" class="text-center border border-light p-5" action="#!" enctype="multipart/form-data">

    <p class="h4 mb-4">Sign in</p>

    <!-- Email -->
    <input type="text" id="defaultLoginFormUser" class="form-control mb-4" placeholder="Username" name= "username" required>

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name= "password" required minlength= "6" aria-describedby= "passwordHint" autocomplete = "current-password"/>

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            <a href="">Forgot password?</a>
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" type="submit" name = "login_user">Sign in</button>

    <!-- Register -->
    <p>Not a member?
        <a href="login.php">Register</a>
    </p>

    <!-- Social login -->
    <p>or sign in with:</p>

    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-facebook-f"></i>
    </a>
    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-twitter"></i>
    </a>
    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-linkedin-in"></i>
    </a>
    <a type="button" class="light-blue-text mx-2">
        <i class="fab fa-github"></i>
    </a>

    </form>
</div>
<!-- Default form login -->


<?php
    require 'db.php';

    session_start();

    if ($_SERVER["REQUEST_METHOD"]=="POST")
    {
       

        $password = md5($_POST ['password']);
    

        
        

        $username = mysqli_real_escape_string($con, $_POST['$username']);

        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM users WHERE username = '$username' and pwd = '$password'";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);

        $count = mysqli_num_rows ($result);

        if ($count == 1)
        {
            //session_register("$myusername")

            $_SESSION ['signed_in'] = $myusername;

               
            header("location: dashboard.php?user=$username");
        }
        else 
        {
            echo "<br> Invalid login details";
        }

    }

   
?>
    

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/js/mdb.min.js"></script>
</body>
</html>