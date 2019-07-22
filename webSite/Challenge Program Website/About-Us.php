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
    <title>من نحن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">




    <!-- ***************************************** Bootstrap    *****************-->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  <script src="js/jquery-3.3.1.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="About-Us.css">
</head>

<body class="">


    <!--*****************************            NavBar   ************************************************-->
    <?php
 
        include('Header.php');

    ?>

    <!--**************************************   header show      *********************************-->

    <div class="header">

        <h1><b>من نحن  </b></h1>
       </div>

    <!--************************************************  contents     *****************************************-->

    
    <div class="contents">

       
        <div class="card " style="width: 18rem;">
            <img src="images/user-icon.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">عبدالقادر المهيار محمد بشير حلوي</h5>
                <p class="card-text">
                   صيدلي اكلينيكي خريج عام 2001ميلادي , مستشار لاكثر من شركة عالمية ومركز ابحاث للخلايا الجذعية في ماليزيا. </p>

            </div>
        </div>

   

        <div class="card" style="width: 18rem;">
            <img src="images/user-icon.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">توفيق الدويك</h5>
                <p class="card-text">مستشار اداري - مهتم بالصحة العامة والعمل التطوعي في خدمة المجتمع.</p>

            </div>
        </div>
        <div class="card female" style="width: 18rem;">
            <img src="images/user-icon.png" class="card-img-top" alt="...">
            <div class="card-body ">
                <h5 class="card-title">حنان الكردي</h5>
                <p class="card-text">
                    أخصائية نفسية - علاج سلوك ومعرفة.</p>

            </div>
        </div>
        <div class="card female" style="width: 18rem;">
                <img src="images/user-icon.png" class="card-img-top" alt="...">
                <div class="card-body ">
                    <h5 class="card-title">النشمية </h5>
                    <p class="card-text">
                        ناشطة اجتماعية ومشرفة في مجموعة التحدي</p>
    
                </div>
            </div>
            <div class="card female" style="width: 18rem;">
                    <img src="images/user-icon.png" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title">فاطمة سلامة  </h5>
                        <p class="card-text">
                            ناشطة اجتماعية ومشرفة في مجموعة التحدي</p>
        
                    </div>
                </div>

                <div class="card female" style="width: 18rem;">
                        <img src="images/user-icon.png" class="card-img-top" alt="...">
                        <div class="card-body ">
                            <h5 class="card-title">فاطمة الزيود  </h5>
                            <p class="card-text">
                                ناشطة اجتماعية ومشرفة في مجموعة التحدي</p>
            
                        </div>
                    </div>

    </div>

    <!--************************************************    Footer   *****************************************-->
    <div class="footer">
        &copy;Challenge program
    </div>
</body>

</html>