<?php
   // session_start();
   
   //  if(session_destroy()) {
     
      session_start();
      $_SESSION['$check_Session']="0";
      header("Location: log-In.php");
   //  }
?>

