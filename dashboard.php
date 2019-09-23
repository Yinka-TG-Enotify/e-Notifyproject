<?php

require 'db.php';
require_once 'session.php';

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
  <link rel="stylesheet" href= "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<!-- <div class="container-fluid "> -->

  <div class="container bg-dark text-white">
    <h3 style="text-center">WELCOME <?php echo $username; ?></h3>
  </div>

  <div class="container">
    <h2>Simple To Do List</h2>
    <p><em>Click and drag to reorder, click to cross an item off.</em></p>

    <form name="toDoList" class="needs-validation" method="POST" novalidate>
      <!-- <input type="text" id="todoItem" name="todo" /> -->
      <div class="form-row">
        <label for="todoItem">First name</label>
        <input type="text" class="form-control" name="todo" id="todoItem" placeholder="" required>
        <div class="valid-feedback">
          Looks good!
        </div>
        <div class="invalid-feedback">
          Please provide a task
        </div>
      </div>
      <button class="btn" id="button" type="submit">Add</button>
      <!-- <input type="submit" value="Add" id="button" /> -->
    </form>

    <br />
    



  </div>


  <?php

  // echo $username;
  if (!isset($_SESSION['signed_in'])) {
    header('location:index.php');
  }

  //logout showing/

  if (isset($_SESSION['signed_in']));
  ?> <button class="logout btn-outline-info btn-sm mb-5 text-dark ml-3"> <?php echo "<a href='logout.php'>Logout</a>";?> </button>

  

  <!-- Displaying records -->




  <?php
  $query = "SELECT * FROM todos where USERNAME = '$username'";
  $result = mysqli_query($con, $query);
  ?>

  <div class="table offset-col-md-6 col mt-0" id="table1">
    <table class="table table-striped table-bordered text-center">
      <thead class="bg-light text-dark">
        <tr>
          <th>TITLE</th>
          <th>ACTION</th>
          <th>DONE</th>

        </tr>
      </thead>


      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td class="<?php echo $row["STATUS"] != 0  ? 'complete' : ''?>"> <?php echo $row["TITLE"]; ?> </td>
          <td>
            <button class="deleteRecord  btn btn-outline-danger btn-sm" id="del" data-id="<?php echo $row["ID"]; ?>"><i class="fa fa-trash-o"></i></button>
            </a>
          </td>
          <td class="marking">
            <input type="checkbox" name="bba" class="mark" id="check" data-id="<?php echo $row["ID"]; ?>" 
            <?php echo $row["STATUS"] != 0  ? "checked='checked'" : ""?> />
          </td>
        </tr>
      <?php
      }
      ?>
    </table>

  </div>


  <!---Delete records--->
  <script>
    //delete
    $(document).ready(function() {
      $(".deleteRecord").click(function() {
        var id = $(this).data("id");
        var el = this;

        $.ajax({
          url: 'remove.php',
          type: 'GET',
          data: {
            "id": id,
          },

          success: function(response) {

            if (response == 1) {
              // Remove row from HTML Table
              $(el).closest('tr').css('background', 'tomato');
              $(el).closest('tr').fadeOut(1100, function() {
                $(this).remove();
              });
            } else {
              alert('Invalid ID.');
            }

          }
        });

      });
    });


    // Add to the database
    $(document).ready(function() {

      $('#button').click(function(e) {
        e.preventDefault();

        var todo = $('input[name=todo]').val();

        $.ajax({
          url: "addtodo.php/" + todo,
          type: "POST",
          data: {
            "todo": todo,
          },
          success: function(data) {
            location.reload();
            if (data) {
              alert('you have added a todo');
            } else {
              alert('There was a problem while adding!');
            }
          }
        });

      });


      // Checkbox//

      $(document).on('click', '.mark', function() {
        var id = $(this).data("id");
        $.ajax({
          url: "complete.php/" + id,
          type: 'POST',
          data: {
            "id": id,
          },

          success: function(response) {
            if (response) {
              alert("Data Update Successfully!!!!");
              location.reload();
            }
          },
          
          error: function(response) {
            if (response == 0) {
              alert("Error!!!!");
            }
          }
        });
      });


      // Email//

                        // $(document).on('click', '.mark', function() {
                        //   var id = $(this).data("id");
                        //   $.ajax({
                        //     url: "mail.php/" + id,
                        //     type: 'POST',
                        //     data: {
                        //       "id": id,
                        //     },
                            
                        //     success: function(response) {
                        //       if (response) {
                        //         alert("Data Update Successfully!!!!");
                        //         location.reload();
                        //       }
                        //     },
                            
                        //     error: function(response) {
                        //       if (response == 0) {
                        //         alert("Error!!!!");
                        //       }
                        //     }
                        //   });
                        // });


    });
  </script>

  <style>
    .complete{
      text-decoration: line-through;
      color:green;
    }

  </style>

<!-- </div> -->



<?php

      // foreach ($_POST['id'] as $boxfan){
      //   if(isset($boxfan)){
      //       $message = "Yes";
      //       mail($to, $subject, $message);
      //   } else{
      //       $message = "No";
      //       mail($to, $subject, $message);
      //   }
      // }

?>

  <!-- //jQuery library -->

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="validate.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

</body>

</html>