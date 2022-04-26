@include('layouts.nav')
<html>

<head>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>

<body>
<center><h1 style="color:red;">Highcharts in Laravel 8 Example</h1></center>

<div>
            <div id="chart"></div>

</div>

</body>



<script type="application/javascript">
    var userData = <?php echo json_encode($userData)?>;
    var userDataStr = userData.map(function(v) { return parseInt(v, 10); });
    Highcharts.chart('chart', {
        title: {
            text: 'New User 2021'
        },
        subtitle: {
            text: 'Bluebird youtube channel'
        },
        xAxis: {
            categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                'October', 'November', 'December'
            ]
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'New Users',
            data: userDataStr
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>

</html>





