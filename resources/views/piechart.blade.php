@include('layouts.nav')
<html>
<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <div id="container"></div>
</body>
<script type="application/javascript">
    var userData = <?php echo json_encode($userData)?>;
    var userD = <?php echo json_encode($userD)?>;
    var pieData = <?php echo json_encode($Data)?>;
    // Radialize the colors
    Highcharts.setOptions({
        colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // Build the chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Anzahl von Posts'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y} Posts',
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Verteilung',
            data: pieData
        }]
    });
    </script>
</html>
