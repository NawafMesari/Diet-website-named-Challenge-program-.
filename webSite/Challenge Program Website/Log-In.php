<?php 
    
   
    include("Config.php");
        

// this part for navbar to check if ther user sign in or not
    $isSession=FALSE;

    session_start();

    if(isset($_SESSION['$check_Session'])){

    }else{
    $_SESSION['$check_Session']="0";
    }

    if ($_SESSION['$check_Session']=="1"){
    $isSession=TRUE;
    $user_check = $_SESSION['myemail'];
    $typeOfUser = $_SESSION['typeOfUser'];
    $name = $_SESSION["nameOfUser"];
    }

    /** ------------------------------------------------------------------ */
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
     

      $myemail = mysqli_real_escape_string($conn,$_POST['email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $typeOfUser="";
      $typeOfUser = $_POST["typeOfUser"];

    if( $typeOfUser== "patient"){
        
        $sql="SELECT * FROM patient WHERE email='$myemail' AND password='$mypassword'";
        
    }else if ($typeOfUser == "doctor"){
        
        $sql="SELECT * FROM doctor WHERE email='$myemail' AND password='$mypassword'";
       
    }else{
        // this will not alert because in html i used requed in input feild.
        echo ("<script>alert('choose dr or patient');</script>");
       
    }

   
      
      $result = mysqli_query($conn,$sql);
    //   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];

    //   if(mysqli_query($conn,$sql) == TRUE){
         
    //   }

      $count = mysqli_num_rows($result);
      
      // ******   If result matched $myusername and $mypassword, table row must be 1 row **************
		
      if($count == 1) {
        

         $_SESSION['myemail'] = $myemail;
         $_SESSION['typeOfUser'] = $typeOfUser;

         if($_POST["typeOfUser"] == "patient"){
            
            echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Correct","","success");';
        echo '}, 500);</script>';
            
             header('Refresh: 1.5; url=patientAccount.php');
            
         }else if($_POST["typeOfUser"] == "doctor"){
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Correct","","success");';
            echo '}, 500);</script>';

            header('Refresh: 1.5; url=doctorAccount.php');
         }

        
      }else {
        //echo("<script> alert('Incorrect Email or password') </script>");
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("WRONG !","Incorrect Email or password","error");';
        echo '}, 500);</script>';

        

      
      }
   }
    
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>تسجيل دخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!--************************  sweet alert   -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- ***************************************** Bootstrap    *****************-->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="Log-In.css">

    <!--********************************************************-->

   
</head>

<body class="">


    <!--*****************************            NavBar   ************************************************-->
   

   

   <?php
 
 require_once('Header.php');

 ?>




    <!--************************************************   Contents    *****************************************-->


    <div class="contents">

        <form action="" method="post">
            <fieldset>
                <legend><img src="images/login.png" alt="no" width="25" height="25"> تسجيل دخول</legend>
                <div class="image" >
                        <img src="images/challenge.png" alt="no" width="45%" height="50%">
                </div>
               
                <div class="form-group">
                        
                    <label for="exampleInputEmail1">ادخل الايميل</label>
                   
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><img src="images/email.png" alt="no" width="20" height="20"></div>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp"
                        placeholder="ادخل الايميل" required>
                          </div>

                   

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">الرقم السري</label>
                    <div class="input-group mb-2">
                            <div class="input-group-prepend">
                              <div class="input-group-text"><img src="images/password.png" alt="no" width="20" height="20"></div>
                            </div>
                            <input type="password" class="form-control" id="password" placeholder="الرقم السري" name="password" required>
                       
                          </div>
                   
                </div>
                <div class="form-group form-check">
                    <input type="radio" class="form-check-input" id="doctor" name="typeOfUser" value="doctor" required>
                    <label class="form-check-label" for="exampleCheck1">دكتور </label>
                    
                </div>
                <div class="form-group form-check">
                    <input type="radio" class="form-check-input" id="patient" name="typeOfUser" value="patient" >
                    <label class="form-check-label" for="exampleCheck1">مريض </label>
                    
                </div>
                <div class="form-group">
                        <button type="submit" class="btn btn-primary " name="bt"><img src="images/loginBT.png" alt="no" width="20" height="20"> تسجيل دخول </button>
                </div>
               

                <div class="createAccount">
                    <a href="Sign-Up.php"><img src="images/sginup.png" alt="no" width="20" height="20"> انشاء حساب </a>
                </div>
            </fieldset>
        </form>


    </div>

   
    
    <!--************************************************   Footer    *****************************************-->
    <div class="footer">
        &copy;Challenge program
    </div>
</body>

</html>