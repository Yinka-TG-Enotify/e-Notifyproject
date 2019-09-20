<?php

require 'db.php';
require 'session.php';
require 'addtodo.php'
?>

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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="dashboard.css">
  

</head>

<body>

<div class="container-fluid">
  <h3 style="text-align:center,">WELCOME <?php echo $username; ?></h3>
</div>

  <div class="container">
    <h2>Simple To Do List</h2>
    <p><em>Click and drag to reorder, double click to cross an item off.</em></p>

    <form name="toDoList" method="POST">
      <input type="text" id="todoItem" name="todo" />
      <input type="submit" value="Add" id="button"/>
    </form>
    <br />
    <ol></ol>



  </div>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

  <script>
    $(document).ready(
      function() {
        $('#button').click(
          function(e) {
            e.preventDefault();
            var todo = $('input[name=todo]').val();
            $.ajax({
            url: "addtodo.php/"+todo,
            type: "POST",
            data: {
                "todo": todo,
            },
            success: function(response)
            {
                var jsonData = JSON.parse(response);
 
                if (jsonData.success == "1")
                {	 
                  swal({
                          title: "Good job!",
                          text: "You have added a todo!",
                          icon: "success",
                          button: "Aww yiss!",
                        });
                 
                }
                else
                { 
                  
                    swal ("There was a problem while deleting!", "error");
                }
           }
          });
            $('ol').append('<li>' + toAdd + '</li>');
            $('input[name=todo]').val("");
          });



        $(document).on('dblclick', 'li', function() {
          $(this).toggleClass('strike');
        });

        $('input').focus(function() {
          $(this).val('');
        });

        $('ol').sortable();

      }
    );
    
  </script>

  <?php

  // echo $username;
  if (!isset($_SESSION['signed_in'])) {
    header('location:index.php');
  }

//logout showing/
  
  if (isset($_SESSION['signed_in'])); 
  echo "<a href='logout.php'>Logout</a>";

?>

  <!-- Displaying records -->
        


  
  
  <?php
        $query = "SELECT * FROM todos where USERNAME = '$username' ";
        $result = mysqli_query($con, $query);

  ?>
  



  <div class="table" id="table1">
        <button id="displaydata" class="btn btn-danger">Display List</button>
            <table class = "table table-striped table-bordered text-center">
                      <thead class="bg-light text-dark">
                            <tr>
                                <th>ID</th>
                                <th>TITLE</th>
                                <th>STATUS</th>
                                <th>USERNAME</th>
                          </tr>
                    </thead>

                    <?php
                          while ($row = mysqli_fetch_array($result))

                      {
                        
                        


                        ?>

                  <tr>
                        <td><?php echo $row ["id"]?>;</td>
                        <td><?php echo $row ["Title"]?>;</td>
                        <td><?php echo $row ["Status"]?>;</td>
                        <td><?php echo $row ["username"]?>;</td>

                  </tr>
             
                     <?php
                      }
                    ?>


                          <script>
                                      $(document).ready(function() {

                                    $("#displaydata").click(function() {                

                                      $.ajax({    
                                        type: "GET",
                                        url: "addtodo.php",             
                                        dataType: "html",                 
                                        success: function(data){  
                                                          
                                            $("#table1").html(response); 
                                            alert(response);
                                        }

                                    });

                                    });
                                    });

        </script>

                    
                    
                
          

          


            </table>





  </div>

                     





          <!-- //jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>