<?php
session_start();
$servername = "localhost";
$username = 'root';
$password = '';
$db = 'login';

// Create connection

$conn = new mysqli($servername, $username, $password,$db) or die("Connection failed: ");
 if (isset($_POST['adminviewregister'])){
 
  $goemailregister = $_POST['adminviewregister'];
$sql = "SELECT * FROM user";

  $result = $conn->query($sql);
    $json = array();
     $total =  $result->num_rows;

  if ($result->num_rows > 0 || $result->num_rows  <= $total){
    
    while($row = $result->fetch_assoc()){
      array_push($json, $row);

  }

$display = 1;
  $_SESSION['display'] = $display;
  $_SESSION['json'] = $json;
}
 
 }

  
if (isset($_POST['goreserve'])){
  $goreserve =$_POST['goreserve'];
  $sql = "SELECT * FROM reservation";

  $result = $conn->query($sql);
    $rt = array();
     $total =  $result->num_rows;
  if ($result->num_rows > 0 || $result->num_rows  <= $total){
    
    while($row = $result->fetch_assoc()){
      array_push($rt, $row);

  }
$display = 2;
  $_SESSION['display'] = $display;
  $_SESSION['rt'] = $rt;

}

}
if (isset($_POST['gotransac'])){
  $gotransac = $_POST['gotransac'];
 $sql = "SELECT * FROM transaction";
  $table = array_merge($json);
  $result = $conn->query($sql);
    $data = array();
     $totalrws =  $result->num_rows;
  if ($result->num_rows > 0 || $result->num_rows <= $totalrws){
    
    while($row = $result->fetch_assoc()){

 
        $name = $_SESSION['ownername'];
      
        array_push($data, $row);
      $table = array_merge(/*$apart*//*$rt*/$data,$json);
      
     
  
  }

   $display =  3;
  $_SESSION['display'] = $display;
  $_SESSION['data'] = $data;
  
  
}

  }

 
 $sql = "SELECT * FROM  apartment";

  $result = $conn->query($sql);
    $apart = array();
     $total =  $result->num_rows;
  if ($result->num_rows > 0 || $result->num_rows  <= $total){
    
    while($row = $result->fetch_assoc()){
      array_push($apart, $row);

  }


}

 


 $display = $_SESSION['display'];

      if ($display == 2) {
       
    $rt = $_SESSION['rt'];
     $disk = $rt;
   } 

   else if ($display == 1){
     # code...
    
     $data = $_SESSION['json'];
     $disk = $data;
   }
   else if ($display == 3) {
     # code...
   
       $data = $_SESSION['data'];
     $disk = $data;
   }
   
   
   

  
 
   
   
   echo json_encode($disk);  
        
      
        


 



  

 

   


  if(isset($_POST['del'])){
    $del= $_POST['del'];
  echo "true";
   
  $sql = "DELETE FROM user WHERE ID=$del";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}



  
}
if (isset($_POST['updatefname']) && isset($_POST['updatelname']) /*&& isset($_POST['updateuser']) && isset($_POST['updatepass'])*/&& isset($_POST['Id'])){
  $id = $_POST['Id'];
  $updatefname =$_POST['updatefname'];
  $updatelname = $_POST['updatelname'];
  /*$updateuser = $_POST['updateuser'];
  $updatepass = $_POST['updatepass'];*/
  $sql = "UPDATE user SET Firstname='$updatefname',Lastname='$updatelname' WHERE ID=$id";
  if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
}

 
  



?>