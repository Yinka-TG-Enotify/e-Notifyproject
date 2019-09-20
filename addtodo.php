<?php

require 'db.php';
require 'session.php';

if (isset($_POST['todo'])) {
   
    $todo = $_POST['todo'];

    $sql = "INSERT INTO todos (TITLE, STATUS, USERNAME) VALUES ('$todo', 'false', '$username')";
   
    mysqli_query($con , $sql);

    echo json_encode(array('success' => 1));
} 

else 
{
    echo json_encode(array('success' => 0));
}


?>


<!-- To display table records -->



