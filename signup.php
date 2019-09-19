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
		<h1 class="mb-0 site-logo"><a href="index.html" class="text-black h2 mb-0">  E-<span style="color: orangered;">Notify</span></a></h1>
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
			 <li><a href="signin.php">Log In</a></li>
			
	
		  </ul>
		</nav>
	  </div>


	  <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

  </div>

</div>
</header>




</div> 

<!-- <--End of NavBar---> 

<!-- Sign up form -->

    <div class="main"style="padding:0px">

    <form method="POST" class="register-form" id="register-form" enctype="multipart/form-data">
        <section class="signup">
            <div class="container form_sign"  >
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="userName" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email" required ></i> <span class="form_required"></span></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" autocomplete= "email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"><span class="form_required"></span></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password" required minlength= "6" aria-describedby= "passwordHint" autocomplete = "current-password"/>
                                <small class ="form_hint text-danger" id= "passwordHint">The password must be atleast 6 charcters long</small>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="signin.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
        // <!-- Sign up  Form -->


        <?php require 'db.php';

        if (isset($_REQUEST) && !empty ($_POST))
        {
              $username = $_POST ['name'];
              $email = $_POST ['email'];
              $password = $_POST ['pass'];

            
              $username = mysqli_real_escape_string($con, $username);

              $sql = "INSERT INTO users (USERNAME, EMAIL, PASSWORD) VALUES ('$username', '$email', '$password')";
        }
             
        if (mysqli_query($con, $sql))
              {

                // header('location:signin.php');
                
                // $msg = "registration succesful. <a href = 'signin.php'>LOGIN</a> now..";

                // echo "<div clss= 'echo'>";

                // echo $msg;

                // echo "</div>";
              }

                else 
                {
                  // echo "error".mysqli_error($con);
                  echo "problem";
                }

      

        mysqli_close($con);











       

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