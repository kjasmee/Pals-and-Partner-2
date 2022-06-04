<?php
	include('include/header.php');
	include('php/functions.php');

	$newusrfetch=reportUsers();  
    while($usrn = $newusrfetch->fetch_array()) { $newuser[] = $usrn; }

	$quotesfetch=getQuotes();  
    while($qutsn = $quotesfetch->fetch_array()) { $quotesdet[] = $qutsn; }

	$condition='WHERE status="Approved"';
	$apprquotesfetch=getApprQuotes($condition);  
    while($qutasn = $apprquotesfetch->fetch_array()) { $apprquotesdet[] = $qutasn; }

	$difquotesfetch=getApprQuotes('');  
    while($quasn = $difquotesfetch->fetch_array()) { $difquotesdet[] = $quasn; }

	//user bar chart
	foreach ($newuser as $monthnum) {
		$monthName[] = $monthnum['Month'];
		$registeredno[] = $monthnum['Total'];
	};

	// quotes status pie chart
	$apprcount = 0;
	$declcount = 0;
	$pendcount = 0;
	foreach($quotesdet as $value){
		if ($value['status']=="Approved") {
			$apprcount=$apprcount+1;
		} elseif ($value['status']=="Declined") {
			$declcount = $declcount+1;
		}
		else {
			$pendcount = $pendcount+1;
		}
	}

	//types of quotes received bar chart
	foreach ($difquotesdet as $cleantype) {
		$qutType[] = $cleantype['cleaning_type'];
		$qutTot[] = $cleantype['total'];
	};

	//approved quotes bar chart
	foreach ($apprquotesdet as $cleant) {
		$cleanType[] = $cleant['cleaning_type'];
		$cleanTot[] = $cleant['total'];
	};
?>
<div id="page-wrapper">
	<div class="header">
		<h1 class="page-header">
			Reporting
		</h1>
	</div>

	<div id="page-inner">
		<div class="reportCharts">
		<!-- user bar chart -->
		<div class="barchart" style="background: #fff; width: 500px;"><canvas id="userChartReport" style="width:500px;max-width:500px;height:450px;"></canvas></div>

		<!-- pie chart for approved/pending/denied -->
		<div id="piechart"></div>

		<!-- different quotes bar chart -->
		<div class="barchart1" style="background: #fff; width: 500px;"><canvas id="quotesReceReport" style="width:500px;max-width:500px;height:450px;"></canvas></div>

		<!-- approved quotes bar chart -->
		<div class="barchart2" style="background: #fff; width: 500px;"><canvas id="quotesApprReport" style="width:500px;max-width:500px;height:450px;"></canvas></div>
		</div>
		</div>
	
	</div>

	<!-- /. PAGE INNER  -->
	<script type="text/javascript">
		// user bar chart
		var xValues = [<?php foreach ($monthName as $monthnam) { echo '"'.$monthnam.'",'; } ?>];
		var yValues = [<?php foreach ($registeredno as $monthlycount) { echo $monthlycount.', '; } ?>,0];
		var barColors = ["red", "green","blue","orange","brown", "DarkCyan", "FloralWhite", "YellowGreen"];

		new Chart("userChartReport", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
			backgroundColor: barColors,
			data: yValues
			}]
		},
		options: {
			legend: {display: false},
			title: {
			display: true,
			text: "Number of users joined in a month for year 2022"
			}
		}
		});
	</script>

	<script type="text/javascript">
		// approved quotes/declined/pending piechart
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		// Draw the chart and set the chart values
		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Task', 'Hours per Day'],
			['Approved', <?php echo $apprcount; ?>],
			['Declined', <?php echo $declcount; ?>],
			['Pending', <?php echo $pendcount; ?>],
			]);

			// Optional; add a title and set the width and height of the chart
			var options = {'title':'Approved quotes over Pending / Declined', 'width':500, 'height':450};

			// Display the chart inside the <div> element with id="piechart"
			var chart = new google.visualization.PieChart(document.getElementById('piechart'));
			chart.draw(data, options);
		}
	</script>

	<script type="text/javascript">
		// received quotes bar chart
		var xValues = [<?php foreach ($qutType as $qutnam) { echo '"'.$qutnam.'",'; } ?>];
		var yValues = [<?php foreach ($qutTot as $qutcount) { echo $qutcount.', '; } ?>,0];
		var barColors = ["red", "green","blue","orange","brown", "DarkCyan", "FloralWhite", "YellowGreen"];

		new Chart("quotesReceReport", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
			backgroundColor: barColors,
			data: yValues
			}]
		},
		options: {
			legend: {display: false},
			title: {
			display: true,
			text: "Total types of quotes received"
			}
		}
		});
	</script>

	<script type="text/javascript">
		// approved quotes bar chart
		var xValues = [<?php foreach ($cleanType as $cleannam) { echo '"'.$cleannam.'",'; } ?>];
		var yValues = [<?php foreach ($cleanTot as $cleancount) { echo $cleancount.', '; } ?>,0];
		var barColors = ["red", "green","blue","orange","brown", "DarkCyan", "FloralWhite", "YellowGreen"];

		new Chart("quotesApprReport", {
		type: "bar",
		data: {
			labels: xValues,
			datasets: [{
			backgroundColor: barColors,
			data: yValues
			}]
		},
		options: {
			legend: {display: false},
			title: {
			display: true,
			text: "Types of quotes approved"
			}
		}
		});
	</script>
</div>
<!-- /. PAGE WRAPPER  -->

<?php include('include/footer.php');?>