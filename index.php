<html>
<head>
	<script src="Chart.js"></script>
	<script src="jquery.min.js"></script>
</head>
<body>
	<canvas id="myChart" width="400" height="400"></canvas>
	<script type="text/javascript">

	

	var lineChartData = {
			labels : ["00h00","01h00","02h00","03h00","04h00","05h00","06h00","07h00", "08h00", "09h00","10h00","11h00","12h00", "13h00", "14h00", "15h00", "16h00", "17h00", "18h00", "19h00","20h00", "21h00", "22h00", "23h00" ],
			datasets : [
				{
					label: "My First dataset",
					fillColor : "rgba(220,220,220,0.2)",
					strokeColor : "rgba(220,220,220,1)",
					pointColor : "rgba(220,220,220,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(220,220,220,1)",
					data : [22.3,22.9,24,26,17,9,9]
				}
			
			]

		}
		
		window.onload = function(){
		var ctx = document.getElementById("myChart").getContext("2d");
		window.myLine = new Chart(ctx).Line(lineChartData, {
			responsive: false
		});
	}
	</script>
</body>
</html>