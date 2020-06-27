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
                                                <th>COMMENT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if($_SESSION["organization"] == "ECG"){
                                                    $query = "SELECT * FROM ecg_questionnaire_replys";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                        while($row = mysqli_fetch_assoc($result)){
                                                         echo "<tr><td>" . $row['id'] . "</td><td>". $row['comments'] . "</td></tr>";
                                                        }
                                                    }    
                                                }else if($_SESSION["organization"] == "Lands Commission"){
                                                    $query = "SELECT * FROM landscomm_questionnaire_replys";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                        while($row = mysqli_fetch_assoc($result)){
                                                         echo "<tr><td>" . $row['id'] . "</td><td>". $row['comments'] . "</td></tr>";
                                                        }  
                                                    }   
                                                }else if($_SESSION["organization"] == "Ghana Water Company"){
                                                    $query = "SELECT * FROM gh_wc_questionnaire_replys";
                                                    $result = mysqli_query($con, $query);
                                                    if(mysqli_num_rows($result) > 0){
                                                        //output data for each row
                                                       while($row = mysqli_fetch_assoc($result)){
                                                         echo "<tr><td>" . $row['id'] . "</td><td>". $row['comments'] . "</td></tr>";
                                                        }
                                                    }   
                                                }else{
                                                    echo "No comment available ";
                                                }
                                                // $row['permission']. "</td><td>" . "<a href='activate_user.php?id=". $row["id"]. "'>ACTIVATE</a>&nbsp;&nbsp;". "<a href='deactivate_user.php?id=". $row["id"]. "'>DEACTIVATE</a>". "</td></tr>";
                                                    
                                            ?>






                                            <?php
                                                // $query = "SELECT * FROM questionnaire_replys";
                                                // $result = mysqli_query($con, $query);
                                                // if(mysqli_num_rows($result) > 0){
                                                //     //output data for each row
                                                //     while($row = mysqli_fetch_assoc($result)){
                                                //         echo "<tr><td>" . $row['id'] . "</td><td>". $row['comments'] . "</td></tr>";
                                                //     }
                                                // }else{
                                                //     echo "No Comments";
                                                // }
                                            ?>


                                           <!-- <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100398</td>
                                                
                                            </tr>
                                            <tr>
                                                <td>2018-09-28 01:22</td>
                                                <td>100397</td>
                                          
                                            </tr>
                                            <tr>
                                                <td>2018-09-27 02:12</td>
                                                <td>100396</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>2018-09-26 23:06</td>
                                                <td>100395</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>2018-09-25 19:03</td>
                                                <td>100393</td>
                                           
                                            </tr>
                                            <tr>
                                                <td>2018-09-29 05:57</td>
                                                <td>100392</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>2018-09-24 19:10</td>
                                                <td>100391</td>
                                             
                                            </tr>
                                            <tr>
                                                <td>2018-09-22 00:43</td>
                                                <td>100393</td>
                                            
                                            </tr> -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

<?php
    include "admin_page_footer.php"; 
?>
 