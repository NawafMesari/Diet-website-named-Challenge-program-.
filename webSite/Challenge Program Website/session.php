<?php
   include('Config.php');
  
   
   
   session_start();
   
  

   $_SESSION['$check_Session'] = "1";
   $user_check = $_SESSION['myemail'];
   $typeOfUser = $_SESSION['typeOfUser'];

if($typeOfUser == "patient"){

    $sql="SELECT * FROM patient WHERE email='$user_check'";
}else
 if($typeOfUser == "doctor"){
    $sql="SELECT * FROM doctor WHERE email='$user_check'";
}
   $result = mysqli_query($conn,$sql);
   
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   
   $email = $row['email'];
   $nameOfuser = $row["name"];
   
   $_SESSION["nameOfUser"] = $nameOfuser;

   if(!isset($_SESSION['myemail'])){
      header("location:log-In.php");
      die();
   }

?>