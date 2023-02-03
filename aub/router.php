<?php



session_start();
$servername = "localhost";
$username = 'root';
$password = '';
$db = 'login';

// Create connection
$conn = new mysqli($servername, $username, $password,$db) or die("Connection failed: ");;

// Check connection
 
if (isset($_POST['username']) && isset($_POST['password'])) {

   
     $user = $_POST['username'];
$pass = $_POST['password'];
   $sql = "SELECT  username, password FROM admin WHERE username='$user' AND password ='$pass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  /*  echo " username: " . $row["username"]. " " . $row["password"]. "<br>";*/
   if ($user == $row["username"]) {
    
       echo "200";
      
   }
   else{
    echo "204";
   }
   
    
  }
} else {

  $Userpass = md5($_POST['password']);
  
   $sql = "SELECT  username, password , ID,Firstname FROM user WHERE username='$user' AND password ='$Userpass'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
  /*  echo " username: " . $row["username"]. " " . $row["password"]. "<br>";*/

    if ($user == $row["username"]){
         $status = "active";
         $id = $row["ID"];
         $fname = $row["Firstname"];
     /* echo $row["ID"];*/
  /*   $sql = "UPDATE apartment SET   ownername='$fname',ID='$id',Status='$status' WHERE apartname = 'Villa Calesang'";*/
$sql = "SELECT  ID,ownername FROM apartment WHERE ID='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($rows= $result->fetch_assoc()) {
    if ($rows["ID"] == $id) {
       $_SESSION['ID'] = $rows["ID"];
$_SESSION['ownername']   = $rows["ownername"];

      echo "201";

    }
    
   /* else{
      $sql = "INSERT INTO apartment(ID,ownername,Status)
VALUES ('$id','$fname', '$status')";
if ($conn->query($sql) === TRUE) {
  $_SESSION['ID'] = $id;
$_SESSION['ownername']   = $fname;

  echo "false";
  break;

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

    }*/

  }
}
else{
 $sql = "INSERT INTO apartment(ID,ownername,Status)
VALUES ('$id','$fname', '$status')";
if ($conn->query($sql) === TRUE) {
  $_SESSION['ID'] = $id;
$_SESSION['ownername']   = $fname;

  echo "201";
  break;

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

          
     
   }
   else{
    echo "204";
   }
   
    
  }

}
}
$conn->close();



}

//register  user  section
else if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['userRegister']) && isset($_POST['Userpass'])){
   $fname= $_POST['fname'];
$lname = $_POST['lname'];
 $userRegister= $_POST['userRegister'];
$Userpass = md5($_POST['Userpass']);
$id = rand(22222222,1000000000);

$sql = "INSERT INTO user(id,firstname, lastname, username,password)
VALUES ('$id','$fname', '$lname', '$userRegister','$Userpass')";

if ($conn->query($sql) === TRUE) {
  echo "201";


} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}
// resgiester 



?>