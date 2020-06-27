<?php 
	session_start();
	include "../connect.php";
?>

<?php
    include 'admin_page_header.php'; 
?> 
 <div style="padding-top: 40%;">
 <?php
// function trying(){ 
		$query = "SELECT * FROM gh_water_company_questionnaires LIMIT 1";
        $result = mysqli_query($con, $query);
         if(mysqli_num_rows($result) > 0){
            //output data for each row
           	while($row = mysqli_fetch_assoc($result)){
    //        		$title = $row["title"];
				// $question = $row["question"];
				$option = $row["option_range"];	
				$half = $option/2;
				echo $half;	
			}
		}else{
			echo "No result found";
		}
	
// }

?>
</div>

<?php
    include 'admin_page_footer.php'; 
?>