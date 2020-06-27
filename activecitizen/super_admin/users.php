<?php
    session_start();
    include "connect.php";
?>

<?php
    include "sadmin_page_header.php"; 
?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>DOB</th>
                                                <th>EMAIL</th>
                                                <th>STATUS</th>
                                                <th>PERMISSION</th>
                                                <th>CONTROL-BUTTONS</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                                $query = "SELECT * FROM users";
                                                $result = mysqli_query($con, $query);
                                                if(mysqli_num_rows($result) > 0){
                                                    //output data for each row
                                                    while($row = mysqli_fetch_assoc($result)){
                                                        echo "<tr><td>" . $row['id'] . "</td><td>" . $row['fname'] . ' ' . $row['lname']. "</td><td>". $row['date_of_birth']. "</td><td>". $row['email']. "</td><td>". $row['status']. "</td><td>". $row['permission']. "</td><td>" . "<a href='activate_user.php?id=". $row["id"]. "'>ACTIVATE</a>&nbsp;&nbsp;". "<a href='deactivate_user.php?id=". $row["id"]. "'>DEACTIVATE</a>". "</td></tr>";
                                                    }
                                                }else{
                                                    echo "No registered user!";
                                                }
                                            ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

<?php
    include "sadmin_page_footer.php"; 
?>