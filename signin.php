<?php
require 'db.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign Up Form </title>

  <!---stylesheets--->

  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="src/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

  <!-- Font Icon -->
  <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

  <!-- Main css -->
  <link rel="stylesheet" href="src/signup-style.css">
</head>

<body>

  <!----Navbar--->

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar py-4 grey darken-3 fixed-top" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0"> E-<span style="color: orangered;">Notify</span></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right sticky-top" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block font-weight-bold">
                <li class="active"><a href=""></a></li>
                <li class=""><a href="index.php">
                    <button class="btn btn-sm btn-danger btn btn-outline-danger secondary rounded-pill border-radius-30" type="submit">Home</button></a>
                  </a>
                </li>

                <li class="has-children">

                  <ul class="dropdown">

                  </ul>
                </li>
                <!-- <li><a href="login.php">Log In</a></li> -->


              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

        </div>

      </div>
    </header>




  </div>



  <!-- Sing in  Form -->
  <div class="main" style="padding:20px">
    <form method="POST" class="register-form" id="login-form" enctype="multipart/form-data">
      <section class="sign-in">
        <div class="container">
          <div class="signin-content">
            <div class="signin-image">
              <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
              <a href="signup.php" class="signup-image-link">Create an account</a>
            </div>

            <div class="signin-form">
              <h2 class="form-title">Sign In</h2>

              <div class="form-group">
                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                <input type="text" name="name" id="name" placeholder="userName" required/>
              </div>
              <div class="form-group">
                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                <input type="password" name="pass" id="pass" placeholder="Password" required minlength= "6" aria-describedby= "passwordHint" autocomplete = "current-password"/>
              </div>
              <div class="form-group">
                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
              </div>
              <div class="form-group form-button">
                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
              </div>

              <a href="forgot-pass.php"> Forgot Password?</a>

              <div class="social-login">
                <span class="social-label">Or login with</span>
                <ul class="socials">
                  <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                  <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                  <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!---PHP---->

      <?php
      

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['name'];

        $password = $_POST['pass'];



        $username = mysqli_real_escape_string($con, $username);

        $password = mysqli_real_escape_string($con, $password);

        $sql = "SELECT * FROM users where USERNAME = '$username' and PASSWORD = '$password'";

        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);

        //$myusername = $row ['username'];

        $count = mysqli_num_rows($result);

        if ($count == 1) {
          //session_register ("$myusername");
      // session_start();


          $_SESSION['signed_in'] = $username;

          echo "nice one";

          header('location:https://google.com');
        } else {

          echo "<br>";
        }
      }

      ?>
    </form>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="src/signin.js"></script>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <!-- JS -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>