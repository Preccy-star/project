<?php 
	session_start();
	include "../connect.php";
?>

<?php
	$id = $_GET["id"];

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

				$form = "<form action='edit.php?id=$id' method='post'>
						<label>Title</label> <input type='text' name='title' value='$title'><br><br>
						<label>Question</label><input type='text' name='question' value='$question'><br><br>
						<label>Number of option</label><input type='number' name='option_range' value='$option'><br><br>
						<input type='submit' name='update' value='SAVE'>
						</form>";
				require_once "admin_page_header.php";
				echo "<script type='text/javascript'>";
				echo "alert('$form')";
				echo "</script>";
				require_once "admin_page_footer.php"; 	
			}
		}else{
			echo "0 result";
		}

		if(isset($_POST ["update"])){
			$title = $_POST["title"];
			$question = $_POST["question"];
			$option = $_POST["option_range"];

			$query = "UPDATE gh_water_company_questionnaires SET title = '$title', question = '$question', option_range = '$option' WHERE id = $id ";
				$result = mysqli_query($con, $query);
				if($result){
					header("Location: survey.php");
				}else{
					echo "Error";
				}
		}
 
    }
    else{
        echo "Organization unknown, please contact the super admin for rectification.";
    }

?>



<?php
    // include 'admin_page_header.php'; 
?>
	
<?php
    // include 'admin_page_footer.php'; 
?>

<?php 

	// $id = $_GET["id"];	

	// $query = "select * from books where id = $id";
	// 	$result = mysqli_query($con, $query);
	// 	if(mysqli_num_rows($result) > 0){
	// 		//output data for each row
	// 		while($row = mysqli_fetch_assoc($result)){
	// 			$name = $row["name"];
	// 			$author = $row["author"];
	// 			$edition = $row["edition"];
	// 			$department = $row["Department"];

	// 			echo "<form action='update-book.php?id=$id' method='post'>
	// 					<label>Name</label> <input type='text' name='name' value='$name'><br><br>
	// 					<label>Author</label><input type='text' name='author' value='$author'><br><br>
	// 					<label>Edition</label><input type='text' name='edition' value='$edition'><br><br>
	// 					<label>Department</label><input type='text' name='Department' value='$department'><br><br>
	// 					<input type='submit' name='update' value='Update'>
	// 			</form>";
	// 		}
	// 	}
	// 	else{
	// 		echo "0 result";
	// 	}



		// if(isset($_POST ["update"])){
		// 	$name = $_POST["name"];
		// 	$author = $_POST["author"];
		// 	$edition = $_POST["edition"];
		// 	$department = $_POST["Department"];

		// 	$query = "update books set name = '".$name."', author = '".$author."', edition = '".$edition."', Department = '".$department."' where id = $id" ;
		// 		$result = mysqli_query($con, $query);
		// 		if($result){
		// 			header("Location: allBooks.php");
		// 		}else{
		// 			echo "Error";
		// 		}
		// }

?>