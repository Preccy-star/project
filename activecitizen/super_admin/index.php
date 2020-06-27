<?php
    session_start();
    include "connect.php";

    if($_SESSION["isuserlogin"] == "YES"){
        
        if($_SESSION["permission"] == "USER"){
            header("Location: ../organizations.php");
        }

        if($_SESSION["permission"] == "ADMIN"){
            header("Location: ../admin/index.php");
        }
    }

    if(!isset($_SESSION["isuserlogin"])){
        header("Location: ../login.php");
    }

?>

<?php
    include 'sadmin_page_header.php'; 
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                           <!--  <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i> --> <!-- material design iconic font -->
                                            <!-- </div> -->
                                            <div class="text text2">
                                                <?php
                                                    $query = "SELECT * FROM users WHERE permission = 'USER' ";
                                                    $result = mysqli_query($con, $query);
                                                    $counter = mysqli_num_rows($result);
                                                    if($counter > 0){ 
                                                        echo "<h3> Users Registered </h3>" . " " . $counter;
                                                    }else{
                                                         echo "<h3> Users Registered </h3>" . " " . "0";
                                                    }
                                                ?>
                                                <!-- <h2>10368</h2> -->
                                                <!-- <span>member(s) registered </span>  -->
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!-- <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div> -->
                                            <div class="text text2">
                                                <?php
                                                    $query = "SELECT * FROM users WHERE permission = 'ADMIN' ";
                                                    $result = mysqli_query($con, $query);
                                                    $counter = mysqli_num_rows($result);
                                                    if($counter > 0){ 
                                                        echo "<h3> Admins Registered </h3>" . " " . $counter;
                                                    }else{
                                                         echo "<h3> Admins Registered </h3>" . " " . "0";
                                                    }
                                                ?>
                                               
                                                <!-- <span>admin(s) registered</span>  -->
                                                <!-- <h2>388,688</h2> -->
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <!-- <div class="icon">
                                                <i class="zmdi mdi-account-supervisor"></i>
                                            </div> -->
                                            <div class="text">
                                                <?php
                                                    $query = "SELECT * FROM institutions";
                                                    $result = mysqli_query($con, $query);
                                                    $counter = mysqli_num_rows($result);
                                                    if($counter > 0){ 
                                                        echo "<h3> Organizations Registered </h3>" . " " . $counter;
                                                    }else{
                                                        echo "<h3> Organizations Registered </h3>" . " " . "0";
                                                    }
                                                ?>
                                                
                                                <!-- <h2>1,086</h2> -->
                                                <!-- <span>organization(s) registered</span> --> 
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text">
                                                <h2>$1,060,386</h2>
                                                <span>total earnings</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div> 

                      
<?php
    include 'sadmin_page_footer.php'; 
?>
