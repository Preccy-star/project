<?php
	session_start();
	include '../connect.php';
?>

<?php
	$question_error = $title_error = $option_error = "";
	$question = $title = $option = "";
	$err_status="off";


	// if(isset($_POST['submit'])){

	// 	if(isset($_POST['question'])){
	// 	$question=$_POST['question'];
	// 	//$question=test_input($question);
	// 	}

	// 	if(isset($_POST['title'])){
	// 	$title=$_POST['title'];
	// 	//$title=test_input($title);
	// 	}

	// 	if(isset($_POST['option'])){
	// 	$option=$_POST['option'];
	// 	}


	// if($_SERVER["REQUEST_METHOD"] == "POST"){
	if(isset($_POST['submit'])){
		if(empty($_POST["title"])){
			$title_error = "Title is required";
			$err_status="on";
		}else{
			$title = test_input($_POST["title"]);
			//check if name only contains letters and whitespaces
			if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
	  			$title_error = "Only letters and white space allowed";
	  			$err_status="on";
			}
		}

		if(empty($_POST["question"])){
			$question_error = "Question is required";
			$err_status="on";
		}else{
			$question = test_input($_POST["question"]);
		}

		if(empty($_POST["option"])){
			$option_error = "Option is required";
			$err_status="on";
		}else{
			$option = $_POST["option"];
		}


		if($err_status == "off"){
      		//removing sql injections
      		$title = mysqli_real_escape_string($con, $title);
      		$question = mysqli_real_escape_string($con, $question);

      		if($_SESSION["organization"] == "ECG"){
				$query = "INSERT INTO ecg_questionnaires (title, question, option_range) VALUES ('$title', '$question', '$option')";
				$result = mysqli_query($con, $query);
				if($result){
					echo "<script type='text/Javascript'>";
					echo "alert('Question added successful')";
					echo "</script>";		
				}else{
					echo "Error " . mysqli_error($con);
				} 
            }

            else if($_SESSION["organization"] == "Lands Commission"){ 	
				$query = "INSERT INTO landscomm_questionnaires (title, question, option_range) VALUES ('$title', '$question', '$option')";
				$result = mysqli_query($con, $query);
				if($result){
					echo "<script type='text/Javascript'>";
					echo "alert('Question added successful')";
					echo "</script>";		
				}else{
					echo "Error " . mysqli_error($con);
				}
            }

            else if($_SESSION["organization"] == "Ghana Water Company"){                
				$query = "INSERT INTO gh_water_company_questionnaires (title, question, option_range) VALUES ('$title', '$question', '$option')";
				$result = mysqli_query($con, $query);
				if($result){
					echo "<script type='text/Javascript'>";
					echo "alert('Question added successful')";
					echo "</script>";		
				}else{
					echo "Error " . mysqli_error($con);
				}
            }

            else{
            	echo "<script type='text/Javascript'>";
				echo "alert('Organization Unknown')";
				echo "</script>";
            }
		}
	}

	function test_input($data){
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>


<?php
    include 'admin_page_header.php'; 
?>

	<div class="container form_style">
		<form role="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class="form-group">
				<label class="control-label" for="title">Question Title</label>
				<input class="form-control" type="text" name="title" placeholder="Enter question title" value="<?php echo $title; ?>">
				<span class="error"><?php echo $title_error;?></span>
			</div>

			<div class="form-group">
				<label class="control-label" for="question">Question</label>
				<input class="form-control" type="text" name="question" placeholder="Enter question" value="<?php echo $question; ?>">
				<span class="error"><?php echo $question_error;?></span>
			</div>

			<div class="form-group">
				<label class="control-label" for="option">Number of option</label>
				<input class="form-control" type="number" name="option" placeholder="Enter number of options needed" value="<?php echo $option; ?>">
				<span class="error"><?php echo $option_error;?></span>
			</div>

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-default" id="button">ENTER</button>
				<!-- <input type="submit" name="submit" value="ENTER" id="button"> -->
			</div>
		</form>
	</div>

<?php
    include 'admin_page_footer.php'; 
?>
