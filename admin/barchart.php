<?php
include('includes/db.php');
$get_date="select * from customers";
$run=mysqli_query($con, $get_date);
$count_c=array(0,0,0,0,0,0,0,0,0,0,0,0);
while($row=mysqli_fetch_array($run)){

	$g_date=$row['created_at'];
	$month=substr($g_date,5,2);
	for($i=1;$i<=12;$i++){
		if($month==$i){
			$count_c[$i-1]++;
			break;
		}
	}
}

?>

<div class="container" style="height: 20px;"></div>
	<div id="container" style="width: 100%; height: 100%"></div>
	<script>
		anychart.onDocumentReady(function() {

        // set the data
        var data = {
        	header: ["Month", "Total No. of register User"],
        	rows: [
        	["Jan", <?php echo" $count_c[0]" ?>],
        	["Feb", <?php echo" $count_c[1]" ?>],
        	["Mar", <?php echo" $count_c[2]" ?>],
        	["Apr", <?php echo" $count_c[3]" ?>],
        	["May", <?php echo" $count_c[4]" ?>],
        	["Jun", <?php echo" $count_c[5]" ?>],
        	["Jul", <?php echo" $count_c[6]" ?>],
        	["Aug", <?php echo" $count_c[7]" ?>],
        	["Sep", <?php echo" $count_c[8]" ?>],
        	["Oct", <?php echo" $count_c[9]" ?>],
        	["Nov", <?php echo" $count_c[10]" ?>],
        	["Dec", <?php echo" $count_c[11]" ?>]
        	]};

        // create the chart
        var chart = anychart.column();
        series=chart.column(
        	[
        	["Jan", <?php echo" $count_c[0]" ?>],
        	["Feb", <?php echo" $count_c[1]" ?>],
        	["Mar", <?php echo" $count_c[2]" ?>],
        	["Apr", <?php echo" $count_c[3]" ?>],
        	["May", <?php echo" $count_c[4]" ?>],
        	["Jun", <?php echo" $count_c[5]" ?>],
        	["Jul", <?php echo" $count_c[6]" ?>],
        	["Aug", <?php echo" $count_c[7]" ?>],
        	["Sep", <?php echo" $count_c[8]" ?>],
        	["Oct", <?php echo" $count_c[9]" ?>],
        	["Nov", <?php echo" $count_c[10]" ?>],
        	["Dec", <?php echo" $count_c[11]" ?>]


        	]);
        series.labels(true);
        	chart.yAxis().labels(false);
        	chart.yAxis().title("No. of register User");
        	chart.xAxis().title("Months");
        
        // add the data
        chart.data(data);

        // set the chart title
        chart.title("Total number of register users(Monthly Basis).");

        // draw
        chart.container("container");
        chart.draw();
    });
</script>


<script src="https://cdn.anychart.com/releases/8.0.0/js/anychart-base.min.js"></script>