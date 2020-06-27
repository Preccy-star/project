<?php 
	session_start();
	include "connect.php";
?>

<?php
	$id = $_GET["id"];


	// $query = "UPDATE users SET status = 'ACTIVE' WHERE id = $id" ;
	// $result = mysqli_query($con, $query);
	// 	if($result){
	// 		header("Location: update_success.php");
	// 	}else{
	// 		die('Error: ' . mysqli_error($con));
	// 	}
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




<!DOCTYPE html>
<html>
<head>
	<title>LMS</title>
</head>
<body>
<?php 

	$id = $_GET["id"];	

	$query = "select * from books where id = $id";
		$result = mysqli_query($con, $query);
		if(mysqli_num_rows($result) > 0){
			//output data for each row
			while($row = mysqli_fetch_assoc($result)){
				$name = $row["name"];
				$author = $row["author"];
				$edition = $row["edition"];
				$department = $row["Department"];

				echo "<form action='update-book.php?id=$id' method='post'>
						<label>Name</label> <input type='text' name='name' value='$name'><br><br>
						<label>Author</label><input type='text' name='author' value='$author'><br><br>
						<label>Edition</label><input type='text' name='edition' value='$edition'><br><br>
						<label>Department</label><input type='text' name='Department' value='$department'><br><br>
						<input type='submit' name='update' value='Update'>
				</form>";
			}
		}
		else{
			echo "0 result";
		}



		if(isset($_POST ["update"])){
			$name = $_POST["name"];
			$author = $_POST["author"];
			$edition = $_POST["edition"];
			$department = $_POST["Department"];

			$query = "update books set name = '".$name."', author = '".$author."', edition = '".$edition."', Department = '".$department."' where id = $id" ;
				$result = mysqli_query($con, $query);
				if($result){
					header("Location: allBooks.php");
				}else{
					echo "Error";
				}
		}

	?>
</body>
</html>