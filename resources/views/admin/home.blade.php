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
        title: 'Gráfico Galería Chillán',
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
        <div class="col-md-12 col-ls-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="columnchart_material"></div>
                    <div id="table_div"></div>
                    <p>
                        <a href="{{ route('tabla.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar tabla PDF
                        </a>
                    </p>
                    <p>
                        <a href="{{ route('rank.pdf') }}" class="btn btn-sm btn-primary">
                            Descargar Ranking PDF
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
