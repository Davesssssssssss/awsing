<?php
session_start();
$servername = "localhost";
$username = 'root';
$password = '';
$db = 'login';

// Create connection
$conn = new mysqli($servername, $username, $password,$db) or die("Connection failed: ");
$id = $_SESSION['ID'];
$fname = $_SESSION['ownername'];
 $sql = "SELECT  ID,ownername FROM apartment WHERE ID='$id'";
  $result = $conn->query($sql);
    $json = array();
  if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
         
     if ($row["ID"] == $id){
       array_push($json, $row);
     }
     
   
  }

}

if (isset($_POST['clientName']) && isset($_POST['amountM'])){


 
/*$clientName = $_SESSION['clientName'];
$amount = $_SESSION['amountM'];
 $clientName = $_SESSION['clientName'];
$amount = $_SESSION['amountM'];
$sql = "INSERT INTO approvetransaction(nameclient,amount)
VALUES ('$clientName','$amount')";
if ($conn->query($sql) === TRUE) {
 
} else {
  
}
*/$clientName =$_POST['clientName'];
$amount= $_POST['amountM'];

$_SESSION['clientName'] = $clientName;
$_SESSION['amountM'] = $amount;

$sql = "INSERT INTO approvetransaction(nameclient,amount)
VALUES ('$clientName','$amount')";
if ($conn->query($sql) === TRUE) {
 
  $exp = true;
   $_SESSION['exp'] =  $exp;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

}

  $sql = "SELECT * FROM reservation";

  $result = $conn->query($sql);
   $i = 0;
     $total = 0;
  if ($result->num_rows > 0 || $result->num_rows  <= $total){
    
    while($row = $result->fetch_assoc()){
     $fname = $_SESSION['ownername'];
     if ($fname == $row["reservationname"]) {
       $_SESSION['reservationname'] = true;
        $i++;
         $_SESSION['i'] = $i;
     }
     else{
       $_SESSION['reservationname'] = false;
           $Mpayment = 0;
           $downpayment = 0;
            $_SESSION['Mpayment'] = $Mpayment;
            $_SESSION['downpayment'] = $downpayment;
     }

  }

 
}
/*$clientName = $_SESSION['clientName'];
 $amount =$_SESSION['amountM'];*/
$fname = $_SESSION['ownername'];
$sql = "SELECT  nameclient,amount FROM approvetransaction";
 
  $result = $conn->query($sql);
    $data = array();
     $sum = "";
    
      $table = array_merge($json);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
  $reserme = $_SESSION['reservationname'];
   if ($reserme ==  false) {
     $fname = $_SESSION['ownername'];

     if  ($fname == $row["nameclient"] ) {
        
       
         array_push($data,$row); 
         
     $str=array("a"=>$sum,"b"=>$row['amount']);
     
      //$row['amount'] = $sum;
       $total = array_sum($str);
    
         $sum+=$row['amount'];

         $Mpayment = 0;
           $downpayment = 0;
          
      }
       
   }
   else{
    //$min = 1000;
            
  //$total =bcsub($total,1000);
    if  ($fname == $row["nameclient"] ) {
        
       
         array_push($data,$row); 
         
     $str=array("a"=>$sum,"b"=>$row['amount']);
     
      //$row['amount'] = $sum;
       $total = array_sum($str);
               
         $sum+=$row['amount'];
         $i =  $_SESSION['i'];
         
           $total =bcsub($total,1000*$i);
            $Cpayment = 2220*$i;
           $Mpayment =   $total - $Cpayment;
           $Mpayment = abs($Mpayment);
             $_SESSION['Mpayment'] = $Mpayment;

           $downpayment = 1000*$i;
           //ari ang  post 
          # code...
         
if (isset($_POST['monthly']) && isset($_POST['downpayment']) && isset($_POST['Fmoney'])) {
            $monthly = $_POST['monthly'];
            $downpayment = $_POST['downpayment'];
            $Fmoney = $_POST['Fmoney'];

              $_SESSION['dt']==2;
                $_SESSION['dt'] = $dt;
                 
                 if ($Fmoney>=$monthly) {
                   $getbalance =bcsub($Fmoney,$monthly);
                  $dt = 1;
                $_SESSION['getbalance'] = $getbalance;
                   $_SESSION['monthly'] = 0;
                 $_SESSION['dt'] = $dt;
                   // $total =  $_SESSION['getbalance'];
              
                  $total = $getbalance;
                  $total = (int)$total;
                   $_SESSION['total']=$total;
                  
                 $exp= $_SESSION['exp'];
                 $Mpayment = 0;
                 $downpayment = 0;
                        $_SESSION['Mpayment'] = $Mpayment;
                  break;
                 //  echo $exp;
                   
                 }
                 
                
                  
                     # code...
                    
                   
                  
                 
                 
               
               
             
             
         
             
           }
    
    if (isset($_POST['clientName']) && isset($_POST['amountM'])){

$clientName =$_POST['clientName'];
$amount= $_POST['amountM'];

echo "successfully";
  $_SESSION['limit'] = true;
 $dt = $_SESSION['dt'];
          $getbalance = $_SESSION['getbalance'];
            $total = $getbalance;
               
          $total += $amount;
            $total = (int)$total;
               $_SESSION['total'] = $total;
    
    }
    /*if (isset($_POST['monthly']) && isset($_POST['downpayment'])){

$clientName =$_POST['clientName'];
$amount= $_POST['amountM'];

echo "successfully";

 $dt = $_SESSION['dt'];
          $getbalance = $_SESSION['getbalance'];
            $total = $getbalance;
               
          $total -= $amount;
            $total = (int)$total;
    
    }*/

  
      $total = $_SESSION['total'];
   
   
   
     
    
 
    



    
   

      
          
         
         # code...
           
           
           



      }


   }
    


     
      
           
   
}


  $age[] = array("total"=>$total,"Mpayment"=>$Mpayment,"Dpayment"=>$downpayment);
 
 
$table = array_merge($age,$data,$json);
  

 
}

   
echo json_encode($table); 



 if (isset($_POST['Funduser']) && isset($_POST['celnumber'])){
  
$Funduser =$_POST['Funduser'];
$celnumber = $_POST['celnumber'];
$fname = $_SESSION['ownername'];
$sql = "INSERT INTO transaction(clientname,amountmoney,phonenumber)
VALUES ('$fname','$Funduser','$celnumber')";

if ($conn->query($sql) === TRUE) {
 echo "record succesfully";
  

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


}
if (isset($_POST['clientName']) && isset($_POST['amountM'])) {
  # code...
  $clientName =$_POST['clientName'];
$amount= $_POST['amountM'];
$sql = "DELETE FROM transaction WHERE amountmoney=$amount";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
}

 $_SESSION['total'] = $total;
if (isset($_POST['appartment_title'])) {
  $fund =  $_SESSION['total'];
  if ($fund >= 1000) {
   $res = bcsub($fund,1000);
   $_SESSION['res'] =$res;
  $appartment_title =$_POST['appartment_title'];
  $reservationname= $_SESSION['ownername'];
 
   $sql = "INSERT INTO reservation(reservationname,appartname)
VALUES ('$reservationname','$appartment_title')";
if ($conn->query($sql) === TRUE) {
  echo "successfully added";
  
}
else{
   echo "Sorry insuficient  Funds...";
} 

  }
   
 

}



 $conn->close();
?>