<?php

    include 'db.php';

    session_start();

    $username = $_SESSION['signed_in'];

    $query = "SELECT * FROM users where username = '$username' ";

    $sql = mysqli_query($con, $query);

    $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);

    $username = $row ['name'];

    // $email = $row ['email'];

    $password = $row ['pass'];

    if (!isset($_SESSION['signed_in']))
    {
        header ("location:index3.php");
    }
    




?>


<?php require 'db.php';

if (isset($_REQUEST) && !empty ($_POST))
{
      $username = $_POST ['username'];
      $email = $_POST ['email'];
      $password = md5($_POST ['password']);

    
      $username = mysqli_real_escape_string($con, $username);
      $email = mysqli_real_escape_string($con, $email);
      $password = mysqli_real_escape_string($con, $password);

      $sql = "INSERT INTO users (USERNAME, EMAIL, PWD) VALUES ('$username', '$email', '$password')";

    if (mysqli_query($con, $sql))
    {
        $msg = "you have succesfully registered... <a href = 'sign_in_new.php'>LOGIN</a> now..";

        echo "<div class = 'echo'>";

        echo $msg;

        echo "</div>";
    }

        else
         {
            echo "error" .$sql.mysqli_error($con);
        }
}

?>





// header('location:signin.php');
        
        // $msg = "registration succesful. <a href = 'signin.php'>LOGIN</a> now..";

        // echo "<div clss= 'echo'>";

        // echo $msg;

        // echo "</div>";
      