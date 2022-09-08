<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Historical data</title>
</head>

<body class="ml-2 mr-2">
<a class="float-right" href="{{ route('searchForm') }}" ><button type="button" class="btn btn-primary">Go to the search form</button></a>
@if(!$prices)
    <h3> No data to display</h3>
@else
<h3> Historical data for {{$companyName}}</h3>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col" style="width: 18%">Date</th>
        <th scope="col" style="width: 18%">Open</th>
        <th scope="col" style="width: 18%">High</th>
        <th scope="col" style="width: 18%">Low</th>
        <th scope="col" style="width: 18%">Close</th>
    </tr>
    </thead>
    <tbody>
    @foreach($prices as $price)
        <tr>
            <td>{{$price->date}}</td>
            <td>{{$price->open}}</td>
            <td>{{$price->high}}</td>
            <td>{{$price->low}}</td>
            <td>{{$price->close}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class="container p-5">
    <h5>Diagram</h5>

    <div id="google-line-chart" style="width: 1000px; height: 500px"></div>

</div>
@endif
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Date', 'Open', 'Close'],

            @php
                foreach($prices as $price) {
                    echo "['".$price->date."', ".$price->open.", ".$price->close."],\n";
                }
            @endphp
        ]);

        var options = {
            title: 'Quotes',
            // curveType: 'function',
            legend: {position: 'bottom'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));

        chart.draw(data, options);
    }
</script>
</body>


</html>
