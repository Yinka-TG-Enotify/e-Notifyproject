<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

     <!--Favicon-->
     <link rel="stylesheet" href="" type="image/x-icon">

<!---stylesheets--->

<link rel="stylesheet" href="src/css/bootstrap.min.css">
<link rel="stylesheet" href="src/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="src/form-style.css">

</head>
<body>
<div class="form-gap"></div>
<div class="container-fluid text-center forgot_pass">
	<div class="row">
		<div class="col-md-4 col-md-offset-4 form-one">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" id="btn-forget" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
    



    <script src="src/signin.js"></script>





    
    <script src="src/js/jquery-3.3.1.slim.min.js"></script>
    <script src="src/js/popper.min.js"></script>
    <script src="src/js/bootstrap.min.js"></script>
</body>
</html>