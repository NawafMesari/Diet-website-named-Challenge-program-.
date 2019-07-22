

<?php
 
 include('Config.php');

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




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>الرئيسية</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->

  <!-- ***************************************** Bootstrap    *****************-->
  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>

   <!-- CSS & js -->
  <link rel="stylesheet" href="index.css">
 
</head>

<body class="">


  <!--*****************************            NavBar   ************************************************-->
 
 <?php
 
 include('Header.php');

 ?>


  <!--**************************************   slide show      *********************************-->


  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>


    </ul>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slideshow1.jpg" alt="Los Angeles" width="1100" height="500">
        <div class="carousel-caption">
          <h3>الوزن الزائد</h3>
          <p>الوزن الزائد يؤدي بشكل مباشر لازمة قلبية </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/slideshow2.jpg" alt="Chicago" width="1100" height="500">
        <div class="carousel-caption">
          <h3>eat an apple a day keep the doctor away </h3>
          <p></p>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/slideshow3.jpg" alt="New York" width="1100" height="500">
        <div class="carousel-caption">
          <h3>المشي</h3>
          <p>عادة ما يوصي بالمشي لمدة 30 دقيقة على الأقل</p>
        </div>
      </div>



    </div>

    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>

  <!--************************************************   Contents    *****************************************-->
  <div class='contents' id='nawaf'>

<?php 

//include('Config.php');



if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM articles";
$result = mysqli_query($conn, $sql);



if (mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){

    echo( "  <div id='block".$row["id"]."'>

      <img src='images/demo.png' alt='no' width='100% 'height='100%'>
     
      <p><span>".$row["title"]."</span><br> 
      ".$row["article"]."
      </p>
    </div>");
  }
 
}



?>

</div>
  
  <!--************************************************   Footer    *****************************************-->
  <div class="footer">
    &copy;Challenge program
  </div>
</body>

</html>