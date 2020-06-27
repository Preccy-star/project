<?php
	session_start();
	include 'connect.php';
	
?>
<?php
	// if(!isset($_SESSION["isuserlogin"])){
	// 	header("Location: login.php");
	// }
?>


<?php
	include "page_header.php";
?>
<div style="margin-top: 60px; color: black;">
<?php echo date("d-m-Y h:s");?>
	<form action="survey.php" method="POST">

		Choose Institution: <br>
		<select name="institution">
		<option value="">
		<option value="NAFDAC">NAFDAC
			<option value="ECG">ECG
			<option value="landCommission">Land Commission
			<option value="DVLA">DVLA
			<option value="GRA">GRA
		</select>
		<br><br>
			
		<!--<input type="submit" name="search" value="Search">-->
		<input type="date" name="date"><br><br>

		Gender:<!--  <input type="radio" name="gender">Male
		<input type="radio" name="gender">Female -->
		<select name="gender">
			<option>Male</option>
			<option>Female</option>
		</select>
		<br><br>

		Region: <select name="region">
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

		Age: <select name="age">
			<option>18-30</option>
			<option>31-40</option>
			<option>41-50</option>
			<option>51-60</option>
			<option>60 and above</option>
		</select>
		<br><br>


		<p>Between 1 to 10, how would you rate your expectation for the overall quality of service?</p>
		<select name="expectation">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how easy was it to obtain services from this organization?</p>
		<select name="services">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how satisfied were you with the services provided?</p>
		<select name="satisfaction">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how efficient and timely was the delivery of the service?</p>
		<select name="delivery">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how satified were you with their customer services and communication?</p>
		<select name="communication">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Did anyone demand money from you before the service were provided?</p> 
		<select name="corruption">
			<option>No</option>
			<option>Yes</option>
		</select>

		<p>Between 1 to 10, how easy was it to obtain information from  this organization?</p> 
		<select name="information">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how understandable was the information?</p> 
		<select name="understanding">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Between 1 to 10, how accessible are their employees/officers?</p> 
		<select name="accessibility">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>


 		<p>Considering all your expectations, to what extent between 1 to 10 have the institution's services fallen short of your expectations?</p> 
		<select name="extentExpec">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>

		<p>Considering all your expectations, to what extent between 1 to 10 have the institution's services exceeded your expectations?</p> 
		<select name="exceedExpec">
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			<option>5</option>
			<option>6</option>
			<option>7</option>
			<option>8</option>
			<option>9</option>
			<option>10</option>
		</select>


		<p>Other comments:</p> <textarea placeholder="Write comments here" name="comments"></textarea><br><br>
		<button type="submit" name="submit" class="btn btn-default">OK</button>
	</form>





	<?php

		//Connecting to the database
		// $con = mysqli_connect('localhost','root','');
		// if(!$con){
		// 			echo "Failed to connect";
		// 		}


			if(isset($_POST ["submit"])){
				$Institution = $_POST["institution"];
				$Sdate = $_POST["date"];
				$Gender = $_POST["gender"];
				$Region = $_POST["region"];
				$Age = $_POST["age"];
				$Expectation = $_POST["expectation"];
				$Services = $_POST["services"];
				$Satisfaction = $_POST["satisfaction"];
				$Delivery = $_POST["delivery"];
				$Communication = $_POST["communication"];
				$Corruption = $_POST["corruption"];
				$Information = $_POST["information"];
				$Understanding = $_POST["understanding"];
				$Short_Expectation = $_POST["extentExpec"];
				$Exceeded_Expectation = $_POST["exceedExpec"];
				$Comments = $_POST["comments"];

				
				//selecting the database
				// $link = mysqli_select_db($con, "egov");
				// if(!$link){
				// 	echo "Connection unsuccessful";
				// }

				//executing the query
				$query = "insert into questionnaire_replys values ('".$Institution."', '".$Sdate."', '".$Gender."', '".$Region."', '".$Age."', '".$Expectation."', '".$Services."', '".$Satisfaction."', '".$Delivery."', '".$Communication."', '".$Corruption."', '".$Information."', '".$Understanding."', '".$Short_Expectation."', '".$Exceeded_Expectation."', '".$Comments."')";

				$result = mysqli_query($con, $query);
				if($result){
					echo "<script type='text/Javascript'>";
					echo "alert('Data saved successfully.')";
					echo "</script>";
				}else{
					echo "<script type='text/Javascript'>";
					echo "alert('Could not save data')";
					echo "</script>";
				}
			}

	?>
</div>
<?php
	include "page_footer.html";
?>