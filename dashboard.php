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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="dashboard.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

  <div class="container-fluid">
    <h3 style="text-align:center,">WELCOME <?php echo $username; ?></h3>
  </div>

  <div class="container">
    <h2>Simple To Do List</h2>
    <p><em>Click and drag to reorder, double click to cross an item off.</em></p>

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
    <ol></ol>



  </div>


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
  $query = "SELECT * FROM todos where USERNAME = '$username'";
  $result = mysqli_query($con, $query);
  //var_dump($result);
  ?>



  <div class="table" id="table1">
    <button id="displaydata" class="btn btn-danger delete">Display List</button>
    <table class="table table-striped table-bordered text-center">
      <thead class="bg-light text-dark">
        <tr>
          <th>ID</th>
          <th>TITLE</th>
          <th>STATUS</th>
          <th>USERNAME</th>
          <th>ACTION</th>
          <th>DONE</th>

        </tr>
      </thead>


      <?php
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td> <?php echo $row["ID"]; ?> </td>
          <td> <?php echo $row["TITLE"]; ?> </td>
          <td> <?php echo $row["STATUS"]; ?> </td>
          <td> <?php echo $row["USERNAME"]; ?> </td>
          <td>
            <button class="deleteRecord  btn btn-outline-danger" id="del" data-id="<?php echo $row["ID"]; ?>">DELETE</button>
            </a>
          </td>
          <td class="marking">
          <input type="checkbox" class="mark" id="check" style="
                                            width:30px;
                                            height:30px;
                                            /* background:white; */
                                            border-radius:5px;
                                            border:2px solid #555;"   />
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
              $(el).closest('tr').fadeOut(800, function() {
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
              // swal({
              //   title: "Good job!",
              //   text: "You have added a todo!",
              //   icon: "success",
              //   button: "Aww yiss!",
              // });
              // var table = $('#table1').DataTable();
 
              //     table.ajax.reload( function ( json ) {
              //         $('#button').val( json.lastInput );
              //     } );

            } else {

              // swal("There was a problem while adding!", "error");
              alert('There was a problem while adding!');
            }
          }
        });

        // $('ol').append('<li>' + toAdd + '</li>');
        // $('input[name=todo]').val("");

      });
      // }



      $(document).on('click', 'tr', function() {
        $(this).toggleClass('strike');


        $('input').focus(function() {
          $(this).val('');
        });

        $('tr').sortable();
      });
    });



               $('.mark').change(function () {

                if (this.checked) {
                  $(this).closest("tr").css("text-decoration","line-through");
                  $(this).closest('tr').css('color', 'red');
                   $(this).closest('tr').css('font-size', '20px');
                } else {
                    $(this).parent().parent().css("text-decoration", "none");
                    $(this).closest('tr').css('color', 'black');
                  $(this).closest('tr').css('', 'none');
                }
                });


      // refresh//
        // $(document).ready (function()
        //         {
                  
        //         $('body').load('dashboard.php') 

        //           refresh ();
        //         });


        //         function refresh ()
        //         {
        //           setTimeout (function()
        //             {
        //               $('#table1').load('dashboard.php');
        //               refresh ();
        //             },500);
        //         };













    // refresh//
    // $(document).ready (function()
    //         {
              
    //         $('body').load('dashboard.php') 

    //           refresh ();
    //         });


    //         function refresh ()
    //         {
    //           setTimeout (function()
    //             {
    //               $('#table1').load('dashboard.php');
    //               refresh ();
    //             },500);
    //         };




    // var table = $('#table1').DataTable();
 
    //         table.ajax.reload( function ( json ) {
    //             $('#myInput').val( json.lastInput );
    //         } );

  </script>

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


