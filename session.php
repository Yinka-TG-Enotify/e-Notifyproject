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