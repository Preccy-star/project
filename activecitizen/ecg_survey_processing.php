<?php
  session_start();
  include 'connect.php';  
?>

<?php
	$Sdate = $Gender = $Region = $Age = $Expectation = $Services = $Satisfaction = $Delivery = $Communication = $Corruption = $Information = $Understanding = $Accessibility = $Low_Expectation = $Exceeded_Expectation = $Comments = "";

	if(isset($_POST["submit"])){
    if(isset($_POST["sdate"])){
          $Sdate = $_POST["sdate"];
      }

		if(isset($_POST["gender"])){
      		$Gender = $_POST["gender"];
  		}

  		if(isset($_POST["region"])){
      		$Region = $_POST["region"];
  		}

  		if(isset($_POST["age"])){
      		$Age = $_POST["age"];
  		}

  		if(isset($_POST["expectation"])){
      		$Expectation = $_POST["expectation"];
  		}

  		if(isset($_POST["services"])){
      		$Services = $_POST["services"];
  		}

  		if(isset($_POST["satisfaction"])){
      		$Satisfaction = $_POST["satisfaction"];
  		}

  		if(isset($_POST["delivery"])){
      		$Delivery = $_POST["delivery"];
  		}

  		if(isset($_POST["communication"])){
      		$Communication = $_POST["communication"];
  		}

  		if(isset($_POST["corruption"])){
      		$Corruption = $_POST["corruption"];
  		}

  		if(isset($_POST["information"])){
      		$Information = $_POST["information"];
  		}

  		if(isset($_POST["understanding"])){
      		$Understanding = $_POST["understanding"];
  		}

  		if(isset($_POST["accessibility"])){
      		$Accessibility = $_POST["accessibility"];
  		}

  		if(isset($_POST["lowExpectation"])){
      		$Low_Expectation = $_POST["lowExpectation"];
  		}

      if(isset($_POST["exceededExpectation"])){
          $Exceeded_Expectation = $_POST["exceededExpectation"];
      }

  		if(isset($_POST["comments"])){
  			$Comments = test_input($_POST["comments"]);
      		$Comments = $_POST["comments"];
  	 	}

  	 	$Comments = mysqli_real_escape_string($con, $Comments);
  	 	$query = "INSERT INTO ecg_questionnaire_replys (sdate, gender, region, age, expectation, services, satisfaction,delivery, communication, corruption, information, understanding, accessibility, lowExpectation, exceededExpectation, comments) VALUES ('$Sdate', '$Gender', '$Region', '$Age', '$Expectation', '$Services', '$Satisfaction', '$Delivery', '$Communication', '$Corruption', '$Information', '$Understanding', '$Accessibility', '$Low_Expectation', '$Exceeded_Expectation', '$Comments')";

  	 	if(!mysqli_query($con, $query)){
        	die('Error: ' . mysqli_error($con));
      	}else{
      		header("location: sent_success.php");
      	}
  		 
	}

	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
