<?php
    session_start();
    include "../connect.php";

    if($_SESSION["isuserlogin"] == "YES"){
        
        if($_SESSION["permission"] == "USER"){
            header("Location: ../organizations.php");
        }

        if($_SESSION["permission"] == "SUPER ADMIN"){
            header("Location: ../super_admin/index.php");
        }
    }

    if(!isset($_SESSION["isuserlogin"])){
        header("Location: ../login.php");
    }

?>

<?php
    include 'admin_page_header.php'; 
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    $query = "SELECT * FROM users WHERE permission = 'USER' ";
                                                    $result = mysqli_query($con, $query);
                                                    $counter = mysqli_num_rows($result);
                                                    if($counter > 0){ 
                                                        echo "<h2>" . " " . $counter . "</h2>";
                                                    }else{
                                                        echo "<h2>0</h2>";
                                                    }
                                                ?>
                                                
                                                <!-- <h2>10368</h2> -->
                                                <span>member(s) registered</span> 
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <!-- <canvas id="widgetChart1"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    // if($_SESSION["organization"] == "ECG"){
                                                    //     $query = "SELECT * FROM ecg_questionnaire_replys";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     }
                                                        // else{
                                                        //     echo "0";
                                                        // }     
                                                    // }
                                                    // else if($_SESSION["organization"] == "Lands Commission"){
                                                    //     $query = "SELECT * FROM landscomm_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // }
                                                    // else if($_SESSION["organization"] == "Ghana Water Company"){
                                                    //     $query = "SELECT * FROM gh_wc_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // } 
                                                    // else{
                                                    //     echo "<h2>0</h2>";
                                                    // }       




                                                $query = "SELECT users.org_id, institutions.institution_name FROM users INNER JOIN institutions ON users.org_id=institutions.id";
                                                $result = mysqli_query($con, $query);
                                                while($row = mysqli_fetch_array($result)){
                                                    // var_dump($row); //checks what is in an array
                                                    echo $row["org_id"] . " " . $row["institution_name"];
                                                    // echo "<br>";
                                                }
                                                  

                                                ?>
                                                <!-- <h2>388,688</h2> -->
                                                <!-- <span>survey(s) submitted</span> -->
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <!-- <canvas id="widgetChart2"></canvas> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text"> -->
                                                <?php
                                                    // if($_SESSION["organization"] == "ECG"){
                                                    //     $query = "SELECT * FROM ecg_questionnaire_replys";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     }
                                                    //     // else{
                                                    //     //     echo "0";
                                                    //     // }     
                                                    // }
                                                    // else if($_SESSION["organization"] == "Lands Commission"){
                                                    //     $query = "SELECT * FROM landscomm_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // }
                                                    // else if($_SESSION["organization"] == "Ghana Water Company"){
                                                    //     $query = "SELECT * FROM gh_wc_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // } 
                                                    // else{
                                                    //     echo "<h2>0</h2>";
                                                    // }       
                                                ?>

                                                <!-- <h2>1,086</h2> -->
                                               <!--  <span>favourable response</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart"> -->
                                            <!-- <canvas id="widgetChart3"></canvas> -->
                                        <!-- </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-money"></i>
                                            </div>
                                            <div class="text"> -->
                                                <?php
                                                    // if($_SESSION["organization"] == "ECG"){
                                                    //     $query = "SELECT * FROM ecg_questionnaire_replys";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     }
                                                    //     // else{
                                                    //     //     echo "0";
                                                    //     // }     
                                                    // }
                                                    // else if($_SESSION["organization"] == "Lands Commission"){
                                                    //     $query = "SELECT * FROM landscomm_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // }
                                                    // else if($_SESSION["organization"] == "Ghana Water Company"){
                                                    //     $query = "SELECT * FROM gh_wc_questionnaire_replys ";
                                                    //     $result = mysqli_query($con, $query);
                                                    //     $counter = mysqli_num_rows($result);
                                                    //     if($counter > 0){ 
                                                    //         echo "<h2>" . " " . $counter . "</h2>";
                                                    //     } 
                                                    // } 
                                                    // else{
                                                    //     echo "<h2>0</h2>";
                                                    // }       
                                                ?>
                                            
                                                <!-- <h2>$1,060,386</h2> -->
                                               <!--  <span>unfavourable response</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart"> -->
                                            <!-- <canvas id="widgetChart4"></canvas> -->
                                        <!-- </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                      
<?php
    include 'admin_page_footer.php'; 
?>
