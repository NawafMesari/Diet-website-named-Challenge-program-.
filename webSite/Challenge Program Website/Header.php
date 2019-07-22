


<nav class="navbar navbar-expand-lg navbar-light fixed-top  navbar">
    <a class="navbar-brand" href="home.html">
      <img src="images/challenge.png" width="50" height="40" class="d-inline-block align-top" alt="">
      برنامج التحدي</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
      aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="index.php"> <img src="images/home.png" alt="home" width="27px" height="23px">
            الرئيسية <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            عن البرنامج
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="About-the-Challenge-program.php">المقدمة</a>
            <a class="dropdown-item" href="About-the-Challenge-program.php#part2">اهداف البرنامج</a>
            <a class="dropdown-item" href="About-the-Challenge-program.php#part3">شرح برنامج التحدي</a>
            <span class="dropdown-item item-in-dropdown-menu">المراحل</span>
            <a class="dropdown-item" href="About-the-Challenge-program.php#part4">الجزء الاول</a>
            <a class="dropdown-item" href="About-the-Challenge-program.php#part5">الجزء الثاني</a>

          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="About-Us.php">من نحن </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="perfect-weight.php"> الوزن المثالي </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">للتواصل </a>
        </li> -->
        <?php 
        if($isSession == TRUE){

          if($typeOfUser == "doctor"){

            echo ("<li class='nav-item'>
            <a class='nav-link' href='Home-control-panel.php'>اضافة مقال </a>
          </li>");
          
        }

        }

        ?>
       
       <?php

        if($isSession ==TRUE){
          echo ("</ul>
          <ul class='navbar-nav mr-auto mt-2 mt-lg-0' >");
    
          if($typeOfUser == "doctor"){
              echo("
            <li class='nav-item '>
              <a class='nav-link ' href='doctorAccount.php'> <img src='images/user.png' alt='no' width='27px' height='27px'>
              $name  </a>
            </li>");
          }else{
            echo("
            <li class='nav-item '>
              <a class='nav-link ' href='patientAccount.php'> <img src='images/user.png' alt='no' width='27px' height='27px'>
              $name  </a>
            </li>");
          }

          echo("
            <li class='nav-item '>
              <a class='nav-link ' href='log-out.php'><img src='images/sign-out.png' alt='login' width='27px'
                  height='23px'> تسجيل خروج </a>
            </li>
    
          </ul>");
        }else{
          echo ("</ul>
          <ul class='navbar-nav mr-auto mt-2 mt-lg-0' >
    
            <li class='nav-item '>
              <a class='nav-link ' href='Log-In.php'> <img src='images/login.png' alt='login' width='27px 'height='23px'>
                تسجيل دخول </a>
            </li>
            <li class='nav-item '>
              <a class='nav-link ' href='Sign-Up.php'><img src='images/sginup.png' alt='login' width='27px'
                  height='26px'>حساب جديد </a>
            </li>
    
          </ul>");
        }

        ?>


      <!-- </ul>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">

        <li class="nav-item ">
          <a class="nav-link " href="Log-In.php"> <img src="images/login.png" alt="login" width="27px" height="23px">
            تسجيل دخول </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="Sign-Up.php"><img src="images/sginup.png" alt="login" width="27px"
              height="26px">حساب جديد </a>
        </li>

      </ul> -->

    </div>
  </nav>

