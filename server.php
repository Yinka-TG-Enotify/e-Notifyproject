 <?Php
session_start();


//initializing variable//
$username = "";
$email = "";
$errors = array();

//connect to the database

$db = mysqli_connect ('localhost', 'root', '', 'ytgdb');

//REGISTER USER//

if (isset($_POST['reg_btn']))
{
    //recieve all input values from the form//
    $username = mysqli_real_escape_string($db, $_POST ['username']);
    $email = mysqli_real_escape_string($db, $_POST ['email']);
    $password = mysqli_real_escape_string($db, $_POST ['password']);


    //Form Validation//

    if (empty ($username)) {arry_push(errors, "username is required");}
    if (empty ($email)) {arry_push(errors, "Email is required");}
    if (empty ($password)) {arry_push(errors, "Password is required");}



}

//first check the database to make sure a user doesnt exist//
$user_check_query = "SELECT * FROM users WHERE username = '$username'  OR email = '$email' LIMIT 1";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc ($result);

if ($user) 
{
    //if user exists//
    if ($user['username']=== $username)
    {
        array_push($errors, "username already exists");
    }
        if ($user['email']===$email)
        {
            array_push($errors, "email already exists")
        }

}


//Register user if no errors//

if (count($errors)==0)
{
    $password = md5($password); //encrypt passwords//

    $query = "INSERT INTO users (username, email, pwd) VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "you are now logged in";
    header('location: index.php');

}

// LOGIN USER//

if (isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username))
    {
        array_push($errors, "username is required");
    }

    if (empty($password))
    {
        array_push($errors, "password is required");
    }

    if (count($errors) == 0) {
        $password=md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND pwd ='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "you are now logged in";
            header ('location: index.php');
            
        } else
        {
            array_push($errors, "Wrong username/password")
        }
    }

}





<?php
 session_start();
 if (!isset($_SESSION['username'])) {
     $_SESSION['msg'] = "You must log in first";
     header('location: login.php');
 }
 if (isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['username']);
     header("location: login.php");
 } 


 <?php if (isset($_SESSION['success'])) : ?>
     <div class="error success" >
         <h3>
         <?php
             echo $_SESSION['success'];
             unset($_SESSION['success']);
         ?>
         </h3>
     </div>
     <?php endif ?>
   <!-- logged in user information -->
   <?php  if (isset($_SESSION['username'])) : ?>
       <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
       <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
   <?php endif ?>

?> 
?> 