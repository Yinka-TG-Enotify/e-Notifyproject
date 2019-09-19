$(document).ready(()=>{

    console.log('welcom');
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
$('.button').on('click',()=>{

let $email = $('#email').val();
let $re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let $valid = $re.test($email);

if($email && !$valid){

    $('#small').text('invalid email entered')
}


})

}
)
