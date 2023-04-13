<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    // Load google charts
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại Phòng', 'Phòng'],
            <?php
            $tongTK = count($listtk);
            $i = 1;
            foreach ($listtk as $tk) {
                extract($tk);
                if ($i == $tongTK) $dauphay = "";
                else $dauphay = ",";
                echo "['" . $tk['tenlp'] . "'," . $tk['countPhong'] . "]" . $dauphay;
                $i += 1;
            }
            ?>
        ]);

        // Optional; add a title and set the width and height of the chart
        var options = {

            'title': 'My Average Day',

            'title': 'Thống kế số phòng theo thể loại',
            'width': 550,
            'height': 400
        };

        // Display the chart inside the <div> element with id="piechart"
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
    }
</script>