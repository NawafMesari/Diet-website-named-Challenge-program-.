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

// take value of the user and send to server side 


 if($_SERVER["REQUEST_METHOD"] == "POST") {

  $healthStatus="";
  $previousDiseases="";
  $previousMedicines ="";


  $name = $_POST["firstName"] . $_POST["lasttName"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];
  $age = $_POST["age"];
  $gender = $_POST["gender"];
  $height = $_POST["height"];
  $weight = $_POST["weight"];
  
  $healthStatus = $_POST["healthStatus"];
  $previousDiseases = $_POST["previousDiseases"];
  $previousMedicines  = $_POST["previousMedicines"];
  
  $registerBefor = FALSE;

  
/**   to get the id of doctor that have samll number of patient **/

//   $sql = " SELECT MIN(patient-id), treat-id FROM(
//     SELECT COUNT(patient-id) AS patient-id , treat-id
//     FROM patient Group BY treat-id); ";

//  $result = mysqli_query($conn,$sql);
//  // $row = mysqli_fetch_row($result);
//   $row = mysqli_fetch_assoc($result);
  
//   $treatId = $row["treat-id"];







  $sql="SELECT * FROM patient WHERE email='$email'";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);



  if($count >0){
    $registerBefor=true;
  }

  if(!$registerBefor){

    if($password ==  $confirmPassword){

      $sql = "INSERT INTO `patient` (`patientID`, `name`, `email`, `age`, `height`, `weight`, `gender`, `password`, `healthStatus`,
      `previousDiseases`, `previousMedicines`, `requestToJoin`, `answerToRequest`, `startProgram`, `treatID`, `year`, `month`, `day`) VALUES 
      (NULL,'$name','$email','$age' , '$height' ,'$weight' , '$gender' , '$password' , 
      '$healthStatus' , '$previousDiseases' , '$previousMedicines' ,'0','0','0','1','0', '0', '0');";

      // $s = "INSERT INTO `patient` (`patientID`, `name`, `email`, `age`, `height`, `weight`, `gender`, `password`, `healthStatus`, `previousDiseases`,
      //  `previousMedicines`, `requestToJoin`, `answerToRequest`, `startProgram`, `treatID`, `year`, `month`, `day`) VALUES
      //  (NULL, 'خالد', 'k@gmail.com', '22', '180', '70', 'male', '12345678', 'good', 'no', 'no', '0', '0', '0', '1', '0', '0', '0');";


     if(mysqli_query($conn,$sql) == TRUE){
      
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal(" correct  ","","success");';
      echo '}, 500);</script>';
      header('Refresh: 3; url=log-In.php');
          

      

     }else{
      
      
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("WRONG !","Have problem when insert into database","error");';
      echo '}, 500);</script>';
     }

      

    }else{
      

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("WRONG !","Confirm password is different","error");';
      echo '}, 500);</script>';
    }


  }else{
   
    echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("WRONG !","This Email Exist","error");';
      echo '}, 500);</script>';
   
    
  }


 }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>حساب جديد</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- ***************** sweet alert-->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- ***************************************** Bootstrap    *****************-->
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="Sign-Up.css">
  <script src="sign-up.js"></script>
</head>

<body class="">


  <!--*****************************            NavBar   ************************************************-->
  
  <?php
 
 include('Header.php');

 ?>



  <!--************************************************   Contents (Form)   *****************************************-->

  <div class="contents">

    <form action="" autocomplete="on" method="post">

      <fieldset>
        <legend><img src="images/sginup.png" alt="no" width="25" height="25"> حساب جديد</legend>

        <p>

          <input type="text" name="firstName" id="firstName" placeholder="الاسم الاول" required>
          <label for="">: الاسم الاول <span>*</span></label>
        </p>
        <p>

          <input type="text" name="lasttName" id="lastName" placeholder="اسم العائلة" required>
          <label for="">: اسم العائلة <span>*</span> </label>
        </p>
        <p>

          <input type="email" name="email" id="email" placeholder="الايميل" required>
          <label for="">: الايميل <span>*</span></label>
        </p>
        <p>

          <input type="password" name="password" id="password" placeholder="الرقم السري" required minlength="8">
          <label for="">: الرقم السري <span>*</span></label>
        </p>
        <p>

          <input type="password" name="confirmPassword" id="confirmPassword" placeholder="تاكيد الرقم السري" required
            minlength="8">
          <label for="">: تاكيد الرقم السري <span>*</span></label>
        </p>
        <hr>
        
        <p>
          <input type="number" name="age" id="age" placeholder="العمر" required>
          <label for=""> : العمر <span>*</span></label>
        </p>
        <p>

          <select name="gender" id="grnder" required>
            <option value="male">ذكر</option>
            <option value="female">انثي</option>
          </select>
          <label for=""> : الجنس <span>*</span></label>
        </p>
        <p>
          <input type="number" name="height" id="height" placeholder="CM" required>
          <label for="">: الطول <span>*</span></label>
        </p>


        <p>
          <input type="number" name="weight" id="weight" placeholder="Kg" required>
          <label for="">: الوزن <span>*</span></label>
        </p>
        <hr>



        
       
        <p>
          <label for="">: الحالة الصحية   </label><br>
          <textarea name="healthStatus" id="moreInfo" cols="30" rows="3"> </textarea>

        </p>
        <p>
          <label for="">: أمراض سابقة  </label><br>
          <textarea name="previousDiseases" id="moreInfo" cols="30" rows="3">   </textarea>

        </p>
        <p>
          <label for="">: ادوية سابقة  </label><br>
          <textarea name="previousMedicines" id="moreInfo" cols="30" rows="3">  </textarea>

        </p>
        <!-- <p class="addFile">
          <label for=""> : كشوفات طبية </label><br>
          <input type="file" name="file" id="file" multiple>


        </p> -->
        <hr>

        <p>

          <button type="submit" class="btn btn-primary">انشاء حساب </button>
          <button type="reset" class="btn btn-primary">مسح المعلومات</button>
        </p>
      </fieldset>
    </form>
  </div>






  <!--************************************************   Footer    *****************************************-->
  <div class="footer">
    &copy;Challenge program
  </div>
</body>

</html>