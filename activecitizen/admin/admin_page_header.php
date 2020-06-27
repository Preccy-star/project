<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template"> -->

  <!-- Title Page-->
  <title>AdminPortal</title>
  <link rel="icon" type="image/png" sizes="16x16" href="images/icon/favicon.png">

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <!-- <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all"> -->
  <!--  <link href="vendor/wow/animate.css" rel="stylesheet" media="all"> -->
  <!-- <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all"> -->
  <!--  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all"> -->
  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body class="animsition">
  <div class="page-wrapper">

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <a href="#">
          <img src="images/icon/admin_logo.png" alt="Admin Portal" />
        </a>
      </div>

      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="active has-sub">
              <a class="js-arrow" href="index.php">
                <i class="fas fa-home"></i>Home
              </a>
            </li>

            <li>
              <a href="function_trial.php">
                <i class="fas fa-chart-bar"></i>Charts
              </a>
            </li>

            <li>
              <a href="add_questions.php">
                <i class="fas fa-check-square"></i>Add Questions
              </a>
            </li>

            <li>
              <a href="survey.php">
                <i class="fas fa-eye"></i>View Survey
              </a>
            </li>

            <li>
              <a href="comments.php">
                <i class="fas fa-comment"></i>View Comments
              </a>
            </li>

            <li>
              <a href="changePassword.php">
                <i class="fas fa-eraser"></i>Change Password
              </a>
            </li>

            <li>
              <a href="logout.php">
                <i class="fas fa-sign-out-alt"></i>Logout
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->   
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <!-- <h1 id="header-style1"> WELCOME <?php //echo $_SESSION["permission"]; ?> </h1> -->
              <h1 id="header-style1">  
              <?php 
                $query = "SELECT users.org_id, institutions.institution_name FROM users INNER JOIN institutions ON users.org_id=institutions.id WHERE organization = $_SESSION['organization']";
                $result = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($result)){
                  // var_dump($row); //checks what is in an array
                  // echo $row["org_id"] . " " . $row["institution_name"];
                   echo "WELCOME " . $row["institution_name"] . " ADMIN";
                  // echo "<br>"; 
                }
              ?> 
              </h1>
             
        <!--  <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">

                    <div class="image">
                      <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                    </div>

                    <div class="content">
                      <a class="js-acc-btn" href="#">john doe</a>
                    </div>

                    <div class="account-dropdown js-dropdown">
                      <div class="info clearfix">

                        <div class="image">
                          <a href="#">
                            <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                          </a>
                        </div>

                        <div class="content">
                          <h5 class="name">
                            <a href="#">john doe</a>
                          </h5>
                          <span class="email">johndoe@example.com</span>
                        </div>
                      </div>

                      <div class="account-dropdown__body">
                        <div class="account-dropdown__item">
                          <a href="#">
                            <i class="zmdi zmdi-account"></i>Account
                          </a>
                        </div>

                        <div class="account-dropdown__item">
                          <a href="#">
                            <i class="zmdi zmdi-settings"></i>Setting
                          </a>
                        </div>

                        <div class="account-dropdown__item">
                          <a href="#">
                            <i class="zmdi zmdi-money-box"></i>Billing
                          </a>
                        </div>
                      </div>

                      <div class="account-dropdown__footer">
                        <a href="#">
                          <i class="zmdi zmdi-power"></i>Logout
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->