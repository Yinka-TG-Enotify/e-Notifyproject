$(document).ready(()=>{

    console.log('welcome');
// 	function validateEmail(email) {
//   var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//   return re.test(email);

//   function validate() {
//   var $result = $("#result");
//   var email = $("#email").val();
//   $result.text("");

//   if (validateEmail(email)) {
//     $result.text(email + " is valid :)");
//     $result.css("color", "green");
//   } else {
//     $result.text(email + " is not valid :(");
//     $result.css("color", "red");
//   }
//   return false;
// }

// $("#validate").on("click", validate);

// }
// $('.signup').on('click',()=>{

// let $email = $('#email').val();
// let $re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
// let $valid = $re.test($email);

// if($email && !$valid){
// console.log ('hey')
//     $('#small').text('invalid email entered')
// }


// })

// }
// )


//login form validation
$(document).ready(function() {
    $('#signup').click(function(e) {
      e.preventDefault();
      var email = $('#email').val();
      var password = $('#pass').val();
  
      $(".error").remove();
  
      if (email.length < 1) {
        $('#email').after('<span class="error  text-danger">This field is required</span>');
      } else {
        var regEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var validEmail = regEx.test(email);
        if (!validEmail) {
          $('#email').after('<span class="error text-danger">Enter a valid email</span>');
        }
      }
      if (password.length < 8) {
        $('#pass').after('<span class="error text-danger">Password must be at least 8 characters long</span>');
      }
    });
});
// //login form validation
//forget password modal validation
$(document).ready(function() {
    $('#btn-forget').click(function(e) {
      e.preventDefault();
      var email = $('#email').val();
    
  
      $(".error").remove();
  
      if (email.length < 1) {
        $('#email').after('<span class="error  text-danger">This field is required</span>');
      } else {
        var regEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        var validEmail = regEx.test(email);
        if (!validEmail) {
          $('#email').after('<span class="error text-danger">Enter a valid email</span>');
        }
      }
    });
});






// //login form validation
// //contact us validation
// $(document).ready(function() {
//     $('#contact_send').click(function(e) {
//       e.preventDefault();
//       var con_name = $('#contact_name').val();
//       var email = $('#contact_email').val();
//       var con_mess = $('#contact_mess').val();
      
//       $(".error").remove();
  
//       if (con_name.length < 1) {
//         $('#contact_name').after('<span class="error text-danger">This field is required</span>');
//       }
//       if (con_mess.length < 1) {
//         $('#contact_mess').after('<span class="error text-danger">This field is required</span>');
//       }
//       if (email.length < 1) {
//         $('#contact_email').after('<span class="error text-danger">This field is required</span>');
//       } else {
//         var regEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//         var validEmail = regEx.test(email);
//         if (!validEmail) {
//           $('#contact_email').after('<span class="error text-danger">Enter a valid email</span>');
//         }
//       }
//     });
// });
// //contact us validation
// //forget password
// $(document).ready(function() {
//     $('#confirm').click(function(e) {
//       e.preventDefault();
//       var password = $('#forget_pass').val();
//       var conpassword = $('#forget_passcon').val();
      
//       $(".error").remove();
  
//       if (password.length < 8) {
//         $('#forget_pass').after('<span class="error text-danger">Password must be at least 8 characters long</span>');
//       }
//         if (conpassword.length < 8) {
//             $('#forget_passcon').after('<span class="error text-danger">Password must be at least 8 characters long</span>');
//       } else{
//         if (!(password === confirm)){
//             $('#forget_passcon').after('<span class="error text-danger">Password is not the same</span>');
//         }
    
//       }
//     });
// });
// //forget password
// //signup validation
// $(document).ready(function() {
//     $('#btn_signup').click(function(e) {
//       e.preventDefault();
//       var name = $('#signup_name').val();
//       var email = $('#signup_email').val();
//       var password = $('#signup_pass').val();
  
//       $(".error").remove();
        
//       if (name.length < 1) {
//         $('#signup_name').after('<span class="error text-danger">This field is required</span>');
//       }
      
//       if (email.length < 1) {
//         $('#signup_email').after('<span class="error  text-danger">This field is required</span>');
//       } else {
//         var regEx = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//         var validEmail = regEx.test(email);
//         if (!validEmail) {
//           $('#signup_email').after('<span class="error text-danger">Enter a valid email</span>');
//         }
//       }
//       if (password.length < 8) {
//         $('#signup_pass').after('<span class="error text-danger">Password must be at least 8 characters long</span>');
//       }
//     });
// });
//signup validation