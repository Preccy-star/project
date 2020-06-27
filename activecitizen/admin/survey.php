<?php
    session_start();
    include "../connect.php";
?>

<?php
    include "admin_page_header.php"; 
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                 <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                           <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="table_style"> 
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>TITLE</th>
                                                <th>QUESTION</th>
                                                <th>OPTION RANGE</th>
                                                <th>CONTROL-BUTTON</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                                if($_SESSION["organization"] == "ECG"){
                                                    $query = "SELECT * FROM ecg_questionnaires";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title']  . "</td><td>" . $row['question'] . "</td><td>" . $row['option_range'] . "</td><td>" . "<a href='edit.php?id=". $row["id"] . "'>EDIT" . "</td></tr>";
                                                        }
                                                    }    
                                                }else if($_SESSION["organization"] == "Lands Commission"){
                                                    $query = "SELECT * FROM landscomm_questionnaires";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title']  . "</td><td>" . $row['question'] . "</td><td>" . $row['option_range'] . "</td><td>" . "<a href='edit.php?id=". $row["id"] . "'>EDIT" . "</td></tr>";
                                                        }
                                                    }   
                                                }else if($_SESSION["organization"] == "Ghana Water Company"){
                                                    $query = "SELECT * FROM gh_water_company_questionnaires";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['title']  . "</td><td>" . $row['question'] . "</td><td>" . $row['option_range'] . "</td><td>" . "<a href='edit.php?id=". $row["id"] . "'>EDIT" . "</td></tr>";
                                                        }
                                                    }   
                                                }else{
                                                    echo "No survey available, please check again later. ";
                                                }
                                                // $row['permission']. "</td><td>" . "<a href='activate_user.php?id=". $row["id"]. "'>ACTIVATE</a>&nbsp;&nbsp;". "<a href='deactivate_user.php?id=". $row["id"]. "'>DEACTIVATE</a>". "</td></tr>";
                                                    
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<?php
    include "admin_page_footer.php"; 
?>
 