
function login() {
  

       
}
document.getElementById("submit").addEventListener("click", function(event){
  event.preventDefault()
  let  username = document.getElementById("username").value;
  let password = document.getElementById("password").value;
  if (username != "" && password != "") {
          
  /*$('#submit').click(function() {
    var username = $('#username').val();
    var password = $('#password').val();*/
    $.ajax({
        type: 'POST',
        url: 'router.php',
        data: { username: username, password: password },
        success: function(response) {
            $('#demo').html(response);
            if (response == "200") {
                  goemailregister()
                
                  
                   
            }
            else if (response == "201") {
                    window.location.href="client.html"
            }
           /* else{
                       var username = $('#username').val("");
                         var password = $('#password').val("");
            }*/

        }
    });
/*});*/

  }
  else{
           alert("failed");
  }
});
document.getElementById("register").addEventListener("click", function(event){
  event.preventDefault()
  let  fname = document.getElementById("fname").value;
  let lname = document.getElementById("lname").value;
   let  userRegister = document.getElementById("userRegister").value;
  let Userpass = document.getElementById("Userpass").value;
  if (fname != "" && lname != "" && userRegister != "" && Userpass  != "") {
          
/*  $('#register').click(function() {
    var fname = $('#fname').val();
    var lname = $('#lname').val();*/
    $.ajax({
        type: 'POST',
        url: 'router.php',
        data: { fname: fname,lname: lname,userRegister: userRegister, Userpass: Userpass },
        success: function(response) {
            $('#demo').html(response);
            if (response == "201") {
                   
                   window.location.href="./"

            }
           /* else{
                       var username = $('#fname').val("");
                         var password = $('#lname').val("");
            }*/

        }
    });
/*});
*/
  }
  else{

           alert("failed");
  }
});
function data() {
 
   
}
 function goemailregister() {
        
          let adminviewregister = "goregister";
           $.ajax({
        type: 'POST',
        url: 'admin.php',
        data: { adminviewregister: adminviewregister},
        success: function(response) {
         
            alert(response);
          window.location.href = "admin.html"

        }
    });
        }
    