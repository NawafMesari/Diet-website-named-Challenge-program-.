<?php
 
 include('Config.php');

 $isSession=FALSE;

 session_start();

if ($_SESSION['$check_Session']=="1"){
  $isSession=TRUE;
  $user_check = $_SESSION['myemail'];
  $typeOfUser = $_SESSION['typeOfUser'];
  $name = $_SESSION["nameOfUser"];
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>حساب الوزن المثالي</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-- ***************************************** Bootstrap    *****************-->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="perfect-weight.css">
    <script src="perfect-weight.js"></script>
</head>

<body class="">


    <!--*****************************            NavBar   ************************************************-->
   
    <?php
 
        include('Header.php');

    ?>



    <!--**************************************   header show      *********************************-->

    <div class="header">

        <h1><b>حساب الوزن المثالي </b></h1>
    </div>

    <!--************************************************   Contents    *****************************************-->

    <div class="contents">

        <div class="calc-perfect-weight">
            <h1> BMIمعرفة الوزن المثالي وحساب كتلة الجسم </h1>
            <br>

            <p>
                <label for="">: الوزن </label> <br>
                <input type="number" id="weight" placeholder=" KG الوزن">

            </p>

            <p>
                <label for=""> : الطول</label> <br>
                <input type="number" id="height" placeholder="  ex:186 CM الطول">
            </p>
            <p>
                <label for=""> : الجنس</label> <br>
               
                <select name="" id="gender">
                  <option> ذكر</option>
                  <option> انثى </option>
                </select>
                
            </p>



            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
                onclick="calc()">
                <img src="images/calc.png" alt="no" width="30" height="30"> احسب
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"> النتيجة</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                           
                        </div>
                        <div class="modal-body" id="result">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!--************************************************   Footer    *****************************************-->
    <div class="footer">
        &copy;Challenge program
    </div>
</body>

</html>