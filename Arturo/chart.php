
<?php

require_once('../connect.php');
 
?>


<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Registro de actividad'
                
        },
        xAxis: {
            categories: ['Salida 1', 'Salida 2', 'Salida 3', 'Salida 4'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
			max: 20,
            title: {
                text: ' ',
                align: 'low'
            },
            labels: {
                overflow: 'justify'
            }
        },
       
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
			name: 'Entrada',
			
			
			
            data: [<?php echo $result['res1'] ?>, <?php echo $result2['res2'] ?>, <?php echo $result3['res3'] ?>, <?php echo $result4['res4'] ?>]
        }, {
            name: 'Salidas',
            data: [<?php echo $result5['res5'] ?>, <?php echo $result6['res6'] ?>, <?php echo $result7['res7'] ?>, <?php echo $result8['res8'] ?>]
       
        }]
    });
});
		</script>
	</head>
	<body>
<script src="assets\js\highcharts.js"></script>
<script src="assets\js\exporting.js"></script>

<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

	</body>
</html>

