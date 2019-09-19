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
<link rel="stylesheet" href="src/fonts/IndieFlower-Regular.ttf">
<link rel="stylesheet" href="src/css/bootstrap.min.css">
<link rel="stylesheet" href="src/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="src/dashboard2.css">

</head>

<body>


    
    <div class="container">
		<h2>Simple To Do List</h2>
    <p><em>Click and drag to reorder, double click to cross an item off.</em></p>
       
		<form name="toDoList">
			<input type="text" name="ListItem"/>
		</form>
    
		<div id="button">Add</div>
		<br/>
		<ol></ol>
      
      
    
    </div>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>

  <script>
  
  $(document).ready(
    function(){
        $('#button').click(
            function(){
                var toAdd = $('input[name=ListItem]').val();
                 $('ol').append('<li>' + toAdd + '</li>');
            });
       
       $("input[name=ListItem]").keyup(function(event){
          if(event.keyCode == 13){
            $("#button").click();
          }         
      });
      
      $(document).on('dblclick','li', function(){
        $(this).toggleClass('strike').fadeOut('slow');    
      });
      
      $('input').focus(function() {
        $(this).val('');
      });
      
      $('ol').sortable();  
      
    }
);
  

  
  
  </script>
  
    
</body>
</html>