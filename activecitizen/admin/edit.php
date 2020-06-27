<?php 
	session_start();
	include "../connect.php";
?>

<?php
	$id = $_GET["id"];
	// $question_error = $title_error = $option_error = "";
	// $err_status="off";
	// $question = $title = $option = "";
	if($_SESSION["organization"] == "ECG"){
        
    }

    else if($_SESSION["organization"] == "Lands Commission"){
           
    }

    else if($_SESSION["organization"] == "Ghana Water Company"){
        $query = "SELECT * FROM gh_water_company_questionnaires WHERE id = $id";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) > 0){
            //output data for each row
           	while($row = mysqli_fetch_assoc($result)){
           		$title = $row["title"];
				$question = $row["question"];
				$option = $row["option_range"];		
			}
		}else{
			echo "No result found";
		}

		if(isset($_POST ["update"])){
			header("Location:survey.php");
			// $title = test_input($_POST["title"]);
			// $question = test_input($_POST["question"]);
			// $option = $_POST["option_range"];

			// $query = "UPDATE gh_water_company_questionnaires SET title = '$title', question = '$question', option_range = '$option' WHERE id = $id ";
			// 	$result = mysqli_query($con, $query);
			// 	if($result){
			// 		header("Location: survey.php");
			// 	}else{
			// 		echo "Error";
			// 	}
		}
 
    }
    else{
        echo "Organization unknown, please contact the super admin for rectification.";
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
		<form role="form" method="POST" action='edit.php?id=$id'>
			<div class="form-group">
				<label class="control-label" for="title">Question Title</label>
				<input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
				<!-- <span class="error"><?php //echo $title_error;?></span> -->
			</div>

			<div class="form-group">
				<label class="control-label" for="question">Question</label>
				<input class="form-control" type="text" name="question" value="<?php echo $question; ?>">
				<!-- <span class="error"><?php //echo $question_error;?></span> -->
			</div>

			<div class="form-group">
				<label class="control-label" for="option">Number of option</label>
				<input class="form-control" type="number" name="option" value="<?php echo $option; ?>">
				<!-- <span class="error"><?php //echo $option_error;?></span> -->
			</div>

			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-default" id="button">SAVE</button>
				<!-- <input type="submit" name="submit" value="ENTER" id="button"> -->
			</div>
		</form>
	</div>

<?php
    include 'admin_page_footer.php'; 
?>