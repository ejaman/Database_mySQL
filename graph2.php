<?php
$connection = mysqli_connect('localhost', 'root', '1234', 'culture_world');
$result = mysqli_query($connection, "select register_data, count(*) from register group by register_data;");
//if($result){
//    echo "CONNECTED";
//}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['register_data', 'count(*)'],

                <?php

                    if(mysqli_num_rows($result)> 0){

                        while($row = mysqli_fetch_array($result)){

                            echo "['".$row['register_data']."', '".$row['count(*)']."'],";

                        }


                    }



                ?>
                ]);

            var options = {
                chart: {
                    title: 'Current Enrollement amount',
                    width: 5000,
                    height: 500
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>
<body>

<div id="columnchart_material"></div>


</body>
</html>
