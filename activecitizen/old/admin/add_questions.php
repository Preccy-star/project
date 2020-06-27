<?php
	include 'connect.php';
?>

<?php
	$question_error = $title_error = $option_error = "";
	$question = $title = $option = "";


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
		}else{
			$title = test_input($_POST["title"]);
			//check if name only contains letters and whitespaces
			if (!preg_match("/^[a-zA-Z ]*$/",$title)) {
	  			$title_error = "Only letters and white space allowed";
			}
		}

		if(empty($_POST["question"])){
			$question_error = "Question is required";
		}else{
			$question = test_input($_POST["question"]);
		}

		if(empty($_POST["option"])){
			$option_error = "Option is required";
		}else{
			$option = test_input($_POST["option"]);
		}



		$query = "INSERT INTO ecg_questionnaires (title, question, option_range) VALUES ('$title', '$question', '$option')";
		$result = mysqli_query($con, $query);
		if($result){
			echo "<script type='text/Javascript'>";
			echo "alert('Question added successful')";
			echo "</script>";;		
		}else{
			echo "Error " . mysqli_error($con);
		}
	}

	function test_input($data){
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Active Citizen</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

  	<link rel="stylesheet" type="text/css" href="css/add_questions.css">
</head>
<body>
	<div class="container">
		<form role="form" method="POST" action="add_questions.php">
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
				<input //style="margin-top:10px;" type="submit" name="submit" value="Enter">
			</div>
		</form>
	</div>
</body>
</html>

