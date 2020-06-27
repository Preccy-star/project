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
	<div class="container">
			
		<div class="row" style="margin-top: 80px;" >
			<h3 class="title"><b style="margin-left: 100px; color: blue;">CHOOSE ORGANIZATION BELOW</b></h3>
		</div><br>

		<div class="row selection-style" >
			<div class="col-lg-4 col-md-6">
				<div class="card h-100">
					<div class="single-post post-style-4">

						<div class="display-table">
							<h4 class="title display-table-cell"><a href="ecg_survey.php"><b style="font-size: 20px;">Electricity Company Of Ghana</b></a></h4>
						</div>
							
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6">
				<div class="card h-100">
					<div class="single-post post-style-4">

						<div class="display-table">
							<h4 class="title display-table-cell"><a href="gh_water_company_survey.php"><b style="font-size: 20px;">Ghana Water Company</b></a></h4>
						</div>

					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6">
				<div class="card h-100">
					<div class="single-post post-style-4">

						<div class="display-table">
							<h4 class="title display-table-cell"><a href="landsCommission_survey.php"><b style="font-size: 20px;">Lands Commission Ghana</b></a></h4>
						</div>

					</div>
				</div>
			</div>
	
		</div><!-- row -->
	
	</div><!-- container -->
</section><!-- section -->

<?php
  include "page_footer.php";
?>
