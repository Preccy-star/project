<?php
	session_start();
	include 'connect.php';	
?>

<?php
	if(!isset($_SESSION["isuserlogin"])){
		header("Location: login.php");
	}
?>


<?php
  include "page_header.php";
?>

<section class="blog-area section">
	<div class="container survey-style">
		<div class="row survey-style2">
			<div>
				<div style="text-align: center; font-size: 23px; color: white;">
					<?php echo date("d-m-Y h:s");?>
				</div>
				<!-- <br><br> -->
				<form action="landsComm_survey_processing.php" method="POST" >

					Gender: 
					<select name="gender">
						<option></option>
						<option>Male</option>
						<option>Female</option>
					</select>
					<br><br>

					Region: 
					<select name="region">
						<option></option>
						<option>Ahafo Region</option>
						<option>Ashanti Region</option>
						<option>Bono East Region</option>
						<option>Bono Region</option>
						<option>Central Region</option>
						<option>Eastern Region</option>
						<option>Greater Accra Region</option>
						<option>North East Region</option>
						<option>Northern Region</option>
						<option>Oti Region</option>
						<option>Savannah Region</option>
						<option>Upper East Region</option>
						<option>Upper West region</option>
						<option>Volta Region</option>
						<option>Western North Region</option>
						<option>Western Region</option>
					</select>
					<br><br>

					Age: 
					<select name="age">
						<option></option>
						<option>18-30</option>
						<option>31-40</option>
						<option>41-50</option>
						<option>51-60</option>
						<option>60 and above</option>
					</select>
					<br><br>

					<?php
						$query = "SELECT * FROM landscomm_questionnaires";
						$result = mysqli_query($con, $query);
						//if(mysqli_num_rows($result) > 0){	
							//output data for each row
						while($row = mysqli_fetch_assoc($result)){
							$i=1;
							$question=$row['question'];
							$option=$row['option_range'];
							$title=$row['title'];			
						
					?>

					<p><?php echo $question; ?></p>
					<select name="<?php echo $title; ?>">
					<?php
						while($i<=$option){
							echo "<option>";
							echo $i;
							echo "</option>";
						$i++;
						}
					?>
						
					</select>
					<br><br>

					<?php } ?>

					<p>Other comments:</p> <textarea placeholder="Write comments here" name="comments"></textarea>
					<input type="submit" name="submit" value="Submit">
				</form>

			</div>
		</div>
	</div>
</section>


<?php
  include "page_footer.php";
?>