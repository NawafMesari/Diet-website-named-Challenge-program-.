<?php
  include('session.php');
 


  $isSession=FALSE;

 

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


/***********************   name & email i get them from session file  */
$ID = $row["patientID"];
$age = $row["age"];
$weight = $row["weight"];
$height = $row["height"];
$gender = $row["gender"];
$healthStatus = $row["healthStatus"];
$previousDiseases =$row["previousDiseases"];
$previousMedicines =$row["previousMedicines"];

$requestToJoin =$row["requestToJoin"];
$answerToRequest =$row["answerToRequest"];
$startProgram =$row["startProgram"];

$treatId =$row["treatID"];

$year = $row["year"];
$month = $row["month"];
$day = $row["day"];

/**********************  for know perfect weight ************* */
$perfectWeight=0;
if($gender == "male"){
$perfectWeight= (($height/100)*($height/100)) * 22.4;
$perfectWeight= (float)substr($perfectWeight, 0, 5);

}
else if($gender == "female"){
  $perfectWeight= (($height/100)*($height/100))* 21.1;
  $perfectWeight= (float)substr($perfectWeight, 0, 5);
}

$BMI = $weight /((($height/100)*($height/100)));
$BMI =(float)substr($BMI,0,5);
 $Case;
  if($BMI < 15){
    $Case= " نقص حاد جدا في الوزن ";
      
  }else if($BMI < 16)
  {
    $Case= " نقص حاد  في الوزن ";
}else if($BMI < 18.5){
  $Case= " نقص  في الوزن ";

}else if($BMI <25){
  $Case= "   وزن طبيعي ";

}else if($BMI < 30){
  $Case= "زياد في الوزن ";

}
else if($BMI < 35){
  $Case= "سمنة درجة أولي";

}else if($BMI < 40){
  $Case= " سمنة درجة ثانية ";

}else if($BMI > 40){
  $Case= "سمن مفرطة جدا";

}


// to get the information about the doctor 

$sql2="SELECT * FROM doctor WHERE doctorID=$treatId";

$result2 = mysqli_query($conn,$sql2);


$row2 = mysqli_fetch_array($result2,MYSQLI_BOTH);


$doctorName = $row2["name"];
$doctorSpecialty =$row2["Specialty-of-doctor"];
$doctorExperience = $row2["years-of-experience"];

/*************************  this for request post ******************* */

if($_SERVER["REQUEST_METHOD"] == "POST"){


  //****************************  for send reqiest to join into the program and wait the replay from doctor */
  if(isset($_POST["sendRequestToJoin"])){

        $sql3 = "UPDATE `patient` SET `requestToJoin` = '1' WHERE `patient`.`patientID` = $ID;";

        $result3 = mysqli_query($conn,$sql3);

        if($result3 == TRUE){
            
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("تم طلب الانظمام","","success");';
            echo '}, 500);</script>';
            header('Refresh: 2; url=patientAccount.php');
        }else{

          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
          echo '}, 500);</script>';
          header('Refresh: 2; url=patientAccount.php');
        }
  }
/*****************************    for start the program ************* */
  if(isset($_POST["startProgram"])){

        $currentYear = date("Y");
        $currentMonth = date("m");
        $currentDay = date("d");

        $sql3 = "UPDATE `patient` SET `startProgram` = '1',`year` = $currentYear,`month` =  $currentMonth,`day` = $currentDay
        WHERE `patient`.`patientID` = $ID;";

        $result3 = mysqli_query($conn,$sql3);
        
        if($result3 == TRUE){
            
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal("تم بدا  البرنامج   ","","success");';
          echo '}, 500);</script>';
          header('Refresh: 2; url=patientAccount.php');
        }else{

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
        echo '}, 500);</script>';
        header('Refresh: 2; url=patientAccount.php');
        }

  }

  /*****************************    for start the program Again ************* */

  if(isset($_POST["startAgain"])){

    $currentYear = date("Y");
    $currentMonth = date("m");
    $currentDay = date("d");

    $sql3 = "UPDATE `patient` SET `startProgram` = '1',`year` = $currentYear,`month` =   $currentMonth,`day` = $currentDay
     WHERE `patient`.`patientID` = $ID;";

    $result3 = mysqli_query($conn,$sql3);

    if($result3 == TRUE){
        
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("تم البدا من جديد  ","","success");';
        echo '}, 500);</script>';
        header('Refresh: 2; url=patientAccount.php');
    }else{

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
      echo '}, 1000);</script>';
      header('Refresh: 2; url=patientAccount.php');
    }
  }

  /*****************************    for request again to join the program ************* */

  if(isset($_POST["sendRequestToJoinAgain"])){

    $sql3 = "UPDATE `patient` SET `requestToJoin` = '1',answerToRequest='0' WHERE `patient`.`patientID` = $ID;";

    $result3 = mysqli_query($conn,$sql3);

    if($result3 == TRUE){
        
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("تم اعادة طلب الانظمام","","success");';
        echo '}, 500);</script>';
        header('Refresh: 2; url=patientAccount.php');
    }else{

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
      echo '}, 500);</script>';
      header('Refresh: 2; url=patientAccount.php');
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nameOfuser; ?></title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
 

<!-- ***************************************** sweet alert    *****************-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- ***************************************** Bootstrap    *****************-->
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

   <!-- CSS & js -->
  <link rel="stylesheet" href="patientAccount.css">
  <script src="patientAccount.js"></script>
 
</head>
<body>
       
<!--*****************************            NavBar   ************************************************-->

<?php
 
 require_once('Header.php');

 ?>
 

<!--************************************************   Contents    *****************************************-->

<div class="contents">

    <div class="firstBox">


          <div class="infoAboutTheDoctor">


              <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
              <p><b>: الدكتور المشرف</b></p>
              </button>

              <div class="collapse" id="collapseExample">
                <div class="card card-body">
                  

                  <p><?php echo ($doctorName);?></p>
                  <p><?php echo ($doctorSpecialty);?> : التخصص</p>
                  <p><?php echo ($doctorExperience);?>  : سنوات الخبرة </p>
                  
                </div>
              </div>

        </div>

          <div class="infoaboutTheWieght">

            <p> <?php echo($perfectWeight);?>: الوزن المثالي </p>
            <p><?php echo($BMI);?> :BMI موشرة الكتلة الجسم </p>
            <p>  حالة الجسم :<?php echo($Case);?></p>

           
            
          </div>


          <?php

                if($requestToJoin == "0"){
                  
                  echo ("
                      <div class='joinProgramm'>
                      <form action='' method='post'>
                        <input type='submit' value='طلب الانظمام الى البرنامج '  name='sendRequestToJoin'>
                      </form>

                        </div>
                  ");
                  }
                  else {
                      if($answerToRequest =="0"){
                        echo ("
                        <div class='answerToRequest'>
                        
                         
                          <div class='alert alert-warning' role='alert'>
                              حالة الطلب : انتظار
                          </div>


                        </div>
                        ");
                      }else if($answerToRequest == "1"){
                        echo ("
                        <div class='answerToRequest'>
                        
                          <div class='alert alert-success' role='alert'>
                         حالة الطلب : تم القبول
                          </div>

                        </div>
                        ");
                      }else if($answerToRequest == "2"){
                        echo ("
                        <div class='answerToRequest'>
                        
                          <div class='alert alert-danger' role='alert'>
                          حالة الطلب : مرفوض 
                          </div>
                          <div class='joinProgramm'>
                            <form action='' method='post'>
                              <input type='submit' value=' اعادة طلب الانظمام الى البرنامج '  name='sendRequestToJoinAgain'>
                            </form>

                        </div>
                        </div>
                        ");
                      }
                  }

                  /*************  this part when user start the program  */
                  if($answerToRequest == "1" && $startProgram=="0"){
                    echo ("
                      <div class='joinProgramm'>
                      <form action='' method='post'>
                        <input type='submit' value=' بدأ البرنامج  '  name='startProgram'>
                      </form>

                        </div>
                  ");
                  }else if($answerToRequest == "1" && $startProgram=="1"){

                    $finishMonth = $month + 2;
                    $percentage =0;

                    if(  date("Y") == $year){

                      if((date("m") - $month) ==0){

                        $percentage= (date("d")-$day)*1.6;
                      }else if((date("m") - $month) ==1){
                        $n = 30 - $day;
                        $percentage= ($n+date("d"))*1.6;
                      }else if((date("m") - $month) ==2){
                        $n = (30 - $day)+30;
                        $percentage= ($n+date("d"))*1.6;
                        if($percentage > 100){
                          $percentage=100;
                        }
                      }

                    }else{
                      $percentage =100;
                    }
                    echo ("
                    <div class='progressBar'>
                        <div class='progress'>
                            <div class='progress-bar' role='progressbar' style='width: $percentage%;' 
                            aria-valuenow='25' aria-valuemin='0' aria-valuemax='100'>$percentage%</div>
                      </div>
                      <p>

                      تارخ الابتداء :$year/$month/$day
                      </p>
                      <p>

                      تارخ الانتهاء :$year/$finishMonth/$day 
                      </p>
                      <form action='' method='post'>
                        <input type='submit' value=' البدا من جديد    '  name='startAgain'>
                      </form>
                      </div>
                     
                      ");


                     
                  }



?>
          

           
           
   </div>

    <div class="InfoBox">

        <table class="table table-striped table-bordered">
          
          
          
          <tbody>
          <tr class="thead-dark">
              <th  colspan="2"><img src="images/user.png" alt="no" width="27px" ;height="27px;"> المعلومات الشخصية    </th>
              
            </tr>
            <tr>
              <td><?php echo ($nameOfuser)?></td>
              <th scope="row"> : الاسم</th>
            </tr>
            <tr>
              <td><?php echo ($email)?></td>
              <th scope='row'> : الايميل</th>
            </tr>
            <tr>
              <td><?php echo ($age)?></td>
              <th scope="row"> : العمر</th>
            </tr>
            <tr>
              <?php
              if($gender == "male"){
                echo("<td> ذكر </td>");
              }else{
                echo("<td> انثي </td>");
              }
              ?>
              
              <th scope="row"> : الجنس</th>
            </tr>
            <tr>
              <td><?php echo ($height)?> CM</td>
              <th scope="row"> : الطول</th>
            </tr>
            <tr>
              <td><?php echo ($weight)?> KG</td>
              <th scope="row"> : الوزن </th>
            </tr>
            <tr>
              <td><?php echo ($healthStatus)?></td>
              <th scope="row"> : الحالة الصحية </th>
            </tr>
            <tr>
              <td><?php echo ($previousDiseases)?></td>
              <th scope="row"> : الامراض السابقة </th>
            </tr>
            <tr>
              <td><?php echo ($previousMedicines)?></td>
              <th scope="row"> : الادوية السابقة </th>
            </tr>
          </tbody>
        </table>

    </div>

</div>



 <!--************************************************   Footer    *****************************************-->
 <div class="footer">
    &copy;Challenge program
  </div>


   </body>
   
</html>
