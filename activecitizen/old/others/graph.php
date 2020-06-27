<!DOCTYPE html>
<html>
<head>
	<title></title>
 	<script type="text/javascript">
		window.onload = function () {

		var chart = new CanvasJS.Chart("chartContainer", {
			theme: "light1", // "light2", "dark1", "dark2"
			animationEnabled: false, // change to true		
			title:{
				text: "Basic Column Chart"
			},
			data: [
			{
				// Change type to "bar", "area", "spline", "pie",etc.
				type: "column",
				dataPoints: [
					{ label: "apple",  y: 23  },
					{ label: "orange", y: 15  },
					{ label: "banana", y: 25  },
					{ label: "mango",  y: 30  },
					{ label: "grape",  y: 98  }
				]
			}
			]
		});
		chart.render();

		}
	</script>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		//window.onload = function(){
			var chart = new CanvasJS.Chart("char_div",{
				animationEnabled: true, //for animation
				title: {
					text: "Basic Chart"
				},
				data: [
					{
						type: "line",
						dataPoints: [
							{x:1, y:5},
							{x:2, y:2},
							{x:3, y:3},
							{x:4, y:7},
							{x:5, y:5}
						]
					}
				]
			});
			chart.render();
		});
	</script>
	<script src="canvasjs/canvasjs.min.js"> </script>

</head>
<body>


<div id="chartContainer" style="height: 400px; width: 400px;"></div>
<script src="canvasjs/canvasjs.min.js"> </script>

<br><br>
<div id="char_div" style="height: 400px; width: 400px;"></div>

</body>
</html>