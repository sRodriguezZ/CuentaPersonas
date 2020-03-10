@extends('layouts.admin')

@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  var picture = <?php echo $picture; ?>;
  console.log(picture);
  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(picture);

    var options = {
      chart: {
        title: 'Galería de Arte',
        subtitle: 'Cantidad de vistas y visitas',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<script type="text/javascript">
  var pictable = <?php echo $pictable; ?>;
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {
    var data = google.visualization.arrayToDataTable(pictable);

    var table = new google.visualization.Table(document.getElementById('table_div'));

    table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
  }
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Gráficos y Tablas</div>
                <div class="table-reponsive">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="columnchart_material" style=" height: 300px; width:100%;"></div>
                  </br>
                    <div id="table_div"></div>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
