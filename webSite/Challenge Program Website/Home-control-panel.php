<?php
 
//  include('Config.php');
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

$doctorID=$row["doctorID"];

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_POST["Add"])){

    $title = $_POST["title"];
    $article = $_POST["article"];


    if(!(empty($title)) && !(empty($article))){

    // $sql = "INSERT INTO 'articles'('id','title','article') VALUES (NULL,'$title','$article')";
    $sql = "INSERT INTO `articles` (`id`, `title`, `article`,`author`) VALUES (NULL,'$title','$article','$doctorID');";
    $result = mysqli_query($conn, $sql);

        if($result == TRUE){
                
          echo '<script type="text/javascript">';
          echo 'setTimeout(function () { swal(" تم اضافة مقال","","success");';
          echo '}, 500);</script>';
          header('Refresh: 3; url=Home-control-panel.php');
          
      }else{

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
        echo '}, 500);</script>';
        header('Refresh: 3; url=Home-control-panel.php');
        
      }

    }else{
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("  العنوان او المقال لا يحتوي على شي ","","error");';
      echo '}, 500);</script>';
      header('Refresh: 3; url=Home-control-panel.php');
    }
  }

/*********************************** this for delete article ******************* */
  
    if(isset($_POST["Delete"])){

      $articleId = $_POST["articleId"];

      if(!(empty($articleId))){

        $sql = "DELETE FROM articles WHERE id=$articleId AND author=$doctorID";
        $result = mysqli_query($conn, $sql);
    
            if($result == TRUE){
                    
              if (mysqli_num_rows($result) > 0){
                  echo '<script type="text/javascript">';
                  echo 'setTimeout(function () { swal(" تم حذف المقال  ","","success");';
                  echo '}, 500);</script>';
                  header('Refresh: 3; url=Home-control-panel.php');
              }else{
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("WRONG !"," لم يستطيع العثور على المقال ","error");';
                echo '}, 500);</script>';
                header('Refresh: 3; url=Home-control-panel.php');
              }
              

            }else{
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("WRONG !","حدثت مشكلة وقت الارسال","error");';
              echo '}, 500);</script>';
              header('Refresh: 3; url=Home-control-panel.php');
            }


    }else{
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("    اختار رقم المقال الذي تريد حذفه ","","error");';
      echo '}, 500);</script>';
      header('Refresh: 3; url=Home-control-panel.php');
    }

  }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>الرئيسية</title>
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

  <!-- CSS & js -->
  <link rel="stylesheet" href="Home-control-panel.css">
  <script src="Home-control-panel.js"></script>
</head>

<body class="">


  <!--*****************************            NavBar   ************************************************-->
  <?php
 
 include('Header.php');

 ?>



 


<!--************************************************   input fields to add or change     *****************************************-->



<div class="inputFields">

<form action="" method="post">
    <p>
        <span>:عنوان المقال</span><br>
        <input type="text" name="title">
    </p>
<p>

    <span>: محتوى المقال</span><br>
    <textarea name="article" id="article" cols="30" rows="5"></textarea>
</p>
<p >
    <input type="submit" value="اضافة" name="Add">
   
</p>
</form>

<form action="" method="post">
    <p>
<span >:ادخل رقم المقال الذي تريد حذفه</span><br>
<input type="number" name="articleId">
    </p>
    <p>
        <input type="submit" value="حذف" name="Delete">
    </p>
</form>

<!--***************************  for show number of article *****************************-->
<?php

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM articles WHERE author=$doctorID";
$result = mysqli_query($conn, $sql);

$counter=0;


if (mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_assoc($result)){

   $counter++;
  }
 
}




?>
<div class="numberOfParagraph">
    <p>: عدد المقالات </p>
    <p id="numberOfParagraph"><?php echo ($counter);?></p>
</div>

</div>
  <!--************************************************   Contents    *****************************************-->

  <div class="contents" id="allParagraphs">

    <?php 

   
    
    
    
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT * FROM articles WHERE author=$doctorID";
    $result = mysqli_query($conn, $sql);
    
    
    
    if (mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_assoc($result)){
    
        echo( "  <div id='block".$row["id"]."'>
    
          <img src='images/demo.png' alt='no' width='100% 'height='100%'>
         
          <p><span>".$row["title"]."</span><br> 
          ".$row["article"]."<br> id = <span class='idOfArticle'>".$row["id"]."</span>
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