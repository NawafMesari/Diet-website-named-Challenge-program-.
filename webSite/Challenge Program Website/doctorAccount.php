<<?php
  include('session.php');
 
// this part for navbar to check if ther user sign in or not
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

$doctorId = $row["doctorID"];


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
  <link rel="stylesheet" href="doctorAccount.css">
 
</head>
<body>
       
      <!--*****************************            NavBar   ************************************************-->    

      <?php
      
      require_once('Header.php');

      ?>


      <!--*****************************     content          ************************************************-->

      <div class="contents">

          <div class="navForContent">
                <nav aria-label="...">
                  <ul class="pagination pagination-lg">
                    <li class="page-item active" aria-current="page">
                      <span class="page-link">
                     MENU
                        <span class="sr-only">(current)</span>
                      </span>
                    </li>
                    <li class="page-item"><a class="page-link" href="doctorAccount.php">المشتركين</a></li>
                    <li class="page-item"><a class="page-link" href="doctorAccount.php?name=request">طلبات الانضمام</a></li>
                  </ul>
                </nav>

          </div>
          <div class="users">

           

                <?php

                if($_SERVER["REQUEST_METHOD"] == "GET"){
                    if(isset($_GET['name'] )  ){
                      $sql="SELECT * FROM patient WHERE treatID='$doctorId' AND answerToRequest='0' AND requestToJoin='1'";
                      $result =  mysqli_query($conn, $sql);
                        $counter=0;

                        echo ("
                           <h1>طلبات الانضمام</h1>
                          <table class='table table-striped table-bordered'>
                          <tbody>
                          <tr class='thead-dark'>
            
                            <th scope='row'>  #   </th>
                            <th>  الاسم   </th>
                            <th>  ID   </th>
                            <th>   العمر </th>
                            <th>   الوزن </th>
                            <th>    الطول</th>
                            <th>    الجنس</th>
                            <th>    الحالة الصحية</th>
                            <th>    الامراض السابقة</th>
                            <th>    الادوية السابقة</th>
                            <th colspan='2'>    قبول او رفض </th>
                              
                            </tr>
                        ");

                      if (mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                          $counter++;
                          $startProgram;
                         
                          echo("
                          <tr>
                            <td scope='row'> $counter</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['patientID']."</td>
                            <td>".$row1['age']."</td>
                            <td>".$row1['weight']." KG</td>
                            <td>".$row1['height']." CM</td>
                            <td>".$row1['gender']."</td>
                            <td>".$row1['healthStatus']."</td>
                            <td>".$row1['previousDiseases']."</td>
                            <td>".$row1['previousMedicines']."</td>

                            <td> <a href='doctorAccount.php?name=request&id=".$row1['patientID']."&as=t'> 
                            <img src='images/true.png' alt='no' width='15%' height='10%'></a> </td>

                            <td> <a href='doctorAccount.php?name=request&id=".$row1['patientID']."&as=f'>
                            <img src='images/false.png' alt='no' width='25%' height='20%'></a> </td>
                          </tr>
                          ");
                        }
                      
                        if(isset($_GET["id"]) && isset($_GET["as"]) ){
                          if($_GET['as'] == 't'){

                            $ID = $_GET["id"];
                            $sql3 = "UPDATE `patient` SET `answerToRequest` = '1' WHERE `patient`.`patientID` = $ID;";
                            $result3 = mysqli_query($conn,$sql3);

                                if($result3 == TRUE){
            
                                  echo '<script type="text/javascript">';
                                  echo 'setTimeout(function () { swal(" ","","success");';
                                  echo '}, 500);</script>';
                                  
                              }else{
                          
                                echo '<script type="text/javascript">';
                                echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
                                echo '}, 1000);</script>';
                                
                              }
                          }else if($_GET['as'] == 'f'){

                            $ID = $_GET["id"];
                            $sql3 = "UPDATE `patient` SET `answerToRequest` = '2' WHERE `patient`.`patientID` = $ID;";
                            $result3 = mysqli_query($conn,$sql3);

                                if($result3 == TRUE){
                
                                  echo '<script type="text/javascript">';
                                  echo 'setTimeout(function () { swal(" ","","success");';
                                  echo '}, 500);</script>';
                                  
                              }else{
                          
                                echo '<script type="text/javascript">';
                                echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
                                echo '}, 1000);</script>';
                                
                              }
                          }

                        }



                      }
                    }else
                   {
                      $sql="SELECT * FROM patient WHERE treatID='$doctorId' AND answerToRequest='1'";
                      $result =  mysqli_query($conn, $sql);
                        $counter=0;

                        echo ("
                          <h1>المشتركين في البرنامج</h1>
                          <table class='table table-striped table-bordered'>
                          <tbody>
                          <tr class='thead-dark'>
            
                            <th scope='row'>  #   </th>
                            <th>  الاسم   </th>
                            <th>  ID   </th>
                            <th>   العمر </th>
                            <th>   الوزن </th>
                            <th>    الطول</th>
                            <th>    الجنس</th>
                            <th>    الحالة الصحية</th>
                            <th>    الامراض السابقة</th>
                            <th>    الادوية السابقة</th>
                            <th>    بدا البرنامج ؟ </th>
                              
                            </tr>
                        ");

                      if (mysqli_num_rows($result) > 0){
                        while($row1 = mysqli_fetch_assoc($result)){
                          $counter++;
                          $startProgram;
                          if($row1["startProgram"]==1){
                            $startProgram="<img src='images/true.png' alt='no' width='15%' height='10%'>";
                          }else{
                            $startProgram="<img src='images/false.png' alt='no' width='25%' height='15%'>";
                          }
                          echo("
                          <tr>
                            <td scope='row'> $counter</td>
                            <td>".$row1['name']."</td>
                            <td>".$row1['patientID']."</td>
                            <td>".$row1['age']."</td>
                            <td>".$row1['weight']." KG</td>
                            <td>".$row1['height']." CM</td>
                            <td>".$row1['gender']."</td>
                            <td>".$row1['healthStatus']."</td>
                            <td>".$row1['previousDiseases']."</td>
                            <td>".$row1['previousMedicines']."</td>
                            <td>". $startProgram."</td>
                          </tr>
                          ");
                        }
                      
                      }
                    }
                  }
                ?>
                   

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
