
//-----------------------------------------------------------------------------------
//                              Password Match/Not Match
//-----------------------------------------------------------------------------------

$(document).ready(function() {
    $("#psw1").keyup(validate);
  });
  function validate() {
      var password1 = $("#psw1").val();
      var password2 = $("#psw2").val();

      if(password1 == password2) {
           $("#validate-status").text("✔️ Passwords match");        
      }
      else {
          $("#validate-status").text("❌ Passwords do not match");  
      }
  }

  <p id="validate-status"></p>