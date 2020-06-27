<?php 
session_start();
?>
<?php

$question=$title=$option="";
$create_question="off";

if(isset($_POST['submit'])){

	if(isset($_POST['question'])){
	$question=$_POST['question'];
	$question=test_input($question);
	}

	if(isset($_POST['title'])){
	$title=$_POST['title'];
	$title=test_input($title);
	}

	if(isset($_POST['option'])){
	$option=$_POST['option'];
	}
$create_question="on";
}

	function test_input($data) 
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}


?>



<html>
	<body>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<label>Question Title</label><br>
		<input type="text" name="title" value="" /required><br>

		<label>Question</label><br>
		<input type="text" name="question" value="" /required>

		<br><label>Number of option</label><br>
		<input type="number" name="option" value="" /required><br>

		<input style="margin-top:10px;" type="submit" name="submit" value="Enter"><br>
		</form>
		<?php 
echo $_SESSION["name"];
		//echo $create_question;?>

		
		<div style="margin-top:60px;">
			<?php
			if($create_question=="on"){
			echo "<h1>" . "This is the Questionnaire" . "</h1>";
			echo "<form>";
			echo $question . "<br>";
			echo "Please select between 1 to 10"."<br>";
			echo "<select>";
			for($i=1; $i<=$option; $i++){
				echo "<option>" . $i  . "</option>";
				
				}
				echo "</select>";
			



			echo "</form>";
			}else{echo "something went wrong";}

			?>
				
		</div>
	</body>
</html>