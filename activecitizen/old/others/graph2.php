<?php
	$con = mysqli_connect('localhost','root','');
		if(!$con){
			echo "Failed to connect";
		}

	$link = mysqli_select_db($con, "egov");
		if(!$link){
			echo "Connection unsuccessful";
		}


	$date = "";
	$expectation = "";
	$services = "";
	$satisfaction = "";
	$delivery = "";
	$communication = "";
	$corruption = "";
	$information = "";
	$understanding = "";
	$extentExpec = "";
	$exceedExpec = "";
		$number=1;
		$i=0;
		$services=array();
		$expectation=array();
	$query = "select * from egov_table";
	$result = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($result)) {
		$expectation[$i] = $row["expectation"];
		$services[$i] = $row["services"];

		//$satisfaction = $row["satisfaction"];
		//$delivery = $row["delivery"];
		//$communication = $row["communication"];
		//$corruption = $row["corruption"];
		//$information = $row["information"];
		//$understanding = $row["understanding"];
		//$extentExpec = $row["extentExpec"];
		//$exceedExpec = $row["exceedExpec"];
		//$date = date('M, Y');
		//$date = date('M, Y, strtotime($row['date'])');
		//$data="data";
		
		$variable_name = "data".$number;

		$$variable_name= [$expectation, $services];
			//print_r($$variable_name);
			//echo "<br>";
			$variable_name2 = "js_data".$number;
		$$variable_name2 = json_encode($$variable_name);
		// echo $$variable_name2;
		// echo "<br>";
		$number=$number+1;
		$i++;
/*
		$expectation = $expectation.$expectation.',';
		$services = $services.$services.',';
		$satisfaction = $satisfaction.$satisfaction.',';
		$delivery = $delivery.$delivery.',';
		$communication = $communication.$communication.',';
		$corruption = $corruption.$corruption.',';
		$information = $information.$information.',';
		$understanding = $understanding.$understanding.',';
		$extentExpec = $extentExpec.$extentExpec.',';
		$exceedExpec = $exceedExpec.$exceedExpec.',';
		$date = $date.'"'.$date.'",';

		*/
	}

	$j = 0;
	$dates = array();
	$id = array();
	$query = "select * from graph_date";
	$result = mysqli_query($con, $query);
	while ($rows = mysqli_fetch_array($result)) {
		$id[$j] = $rows["0"];
		$dates[$j] = $rows["1"];
		$j++;
	
	}

	// echo "<br>";
	// print_r($dates);
	// echo "<br>";
	// print_r($expectation);

	$expect = json_encode($expectation);
	$services = json_encode($services);
	$dates = json_encode($dates);
	// echo "<br>";
			
	// echo $expect;
	// echo "<br>";	
	// echo $services;	
	// echo "<br>";
	// echo $dates;
	// 	echo "<br>";
	// print_r($id);	

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Charts</title>

  <!-- Custom fonts for this template-->
  <link href="precious/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="precious/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <!-- <link href="css/sb-admin.css" rel="stylesheet"> -->

</head>

<body id="page-top">

  

  <div id="wrapper">

    <!-- Sidebar -->
    

    <div id="content-wrapper">

      <div class="container-fluid">

       

        <!-- Area Chart Example-->
        <!-- <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i> 
            Area Chart Example</div>
          <div class="card-body">
            <canvas id="myAreaChart" width="100%" height="30%">Canvas</canvas>
          </div>
        </div> -->

        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Line Chart Example</div>
              <div class="card-body">
                <canvas id="line" style="width:300px; height:100px;"></canvas>
              </div>
             
            </div>
          </div>

         <!--  <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Pie Chart Example</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100%"></canvas>
              </div>
              
            </div>
          </div> -->
        </div>

       <!--  <div class="card mb-3">
          <div class="card-header">
              <i class="fas fa-chart-area"></i> 
              Area Chart Example</div>
          <div class="card-body">
            <canvas id="line-chart" width="100%" height="30%"></canvas>
          </div>
        </div> -->


      </div>
      <!-- /.container-fluid -->



    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 

  <!-- Bootstrap core JavaScript-->
  <script src="precious/vendor/jquery/jquery.min.js"></script>
  <script src="precious/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="precious/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="precious/vendor/chart.js/Chart.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="precious/js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="precious/js/demo/chart-bar-demo.js"></script>
  <!-- <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-line-demo.js"></script> -->



<script type="text/javascript">
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Line Chart Example
new Chart(document.getElementById("line"), {
  type: 'line',
  data: {
    // labels: ["Jan","Feb","Mar","Apr","May","June","July","Aug","Sept","Oct","Nov","Dec"],
    labels: <?php echo $dates; ?>,
    datasets: [{ 
        data: <?php echo $expect; ?>,
        label: "Expectation",
        borderColor: "#3e95cd",
        fill: false
      }, { 
        data: <?php echo $services; ?>,
        label: "Services",
        borderColor: "#8e5ea2",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: ''
    }
  }
});

</script>
</body>

</html>
