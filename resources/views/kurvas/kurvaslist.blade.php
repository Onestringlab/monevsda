@php ($labels = "\"0\",")
@php ($data1 = "0,")
@php ($data2 = "0,")
@php ($datagabungan = "[0,0,0],")

@foreach ($datalaporanfisik as $laporanfisik)
	@php ($labels .= "\"".$laporanfisik["mingguke"]."\",")
	@php ($data1 .= $laporanfisik["target"].",")
	@php ($data2 .= $laporanfisik["kemajuan"].",")
  @php ($datagabungan .= "[".$laporanfisik["mingguke"].",".$laporanfisik["kemajuan"].",".$laporanfisik["target"]."],")
@endforeach
<style>
canvas{
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
}
</style>

<div class="x_title text-success">
	<h2>Kurva S</h2> 
	<div class="clearfix"></div>
</div>
<div class="x_content text-info">
	<div  class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_title">
			<h2>Data Kurva S</h2> 
		</div>
		<table class="table table-bordered" style="font-size: 10px">
			<tr>
				<th class="text-left bg-primary" width="100px">Minggu Ke</th>
				@foreach ($datalaporanfisik as $laporanfisik)
					<td class="text-center bg-info">{{ $laporanfisik["mingguke"] }}</td>
				@endforeach
			</tr>
			<tr>
				<th class="text-left bg-primary">Rencana (%)</th>
				@foreach ($datalaporanfisik as $laporanfisik)
					<td class="text-center ">{{ $laporanfisik["target"] }}</td>
				@endforeach
			</tr>
			<tr>
				<th class="text-left bg-primary">Realisasi (%)</th>
				@foreach ($datalaporanfisik as $laporanfisik)
					<td class="text-center ">{{ $laporanfisik["kemajuan"] }}</td>
				@endforeach
			</tr>
			<tr>
				<th class="text-left bg-primary">Deviasi (%)</th>
				@php ($class = "")
				@foreach ($datalaporanfisik as $laporanfisik)
					@php($selisih = $laporanfisik["kemajuan"] - $laporanfisik["target"])
					@if($selisih >= 0)
						@php ($class = "")
					@elseif($selisih >= -5)
						@php ($class = "warning")
					@elseif($selisih < -5)
						@php ($class = "danger")
					@endif
					<td class="text-center {{$class}}">{{ $selisih }}</td>
				@endforeach
			</tr>
		</table>
	</div>
	<div  class="col-md-12 col-sm-12 col-xs-12" style="height: 100%">
    <canvas id="canvas"></canvas>
    <!-- <div class="text-center">
      <i class="fa fa-square" style="color:rgb(255,0,0)"></i> Target
      <i class="fa fa-square" style="color:rgb(0,255,0)"></i> Realisasi
    </div> -->
	</div>
</div>
<script>
    var config = {
      type: 'line',
      data: {
        labels: [{!!$labels!!}],
        datasets: [{
            label: "Target",
            data: [{!!$data1!!}],
            fill: false,
            borderColor : 'rgb(255,0,0)',
            backgroundColor : 'rgb(255,0,0)'
        },{
            label: "Realisasi",
            data: [{!!$data2!!}],
            fill: false,
            borderColor : 'rgb(0,255,0)',
            backgroundColor : 'rgb(0,255,0)'
        }]
      },
      options: {
        responsive: true,
        title:{
            display:true,
            text:'Grafik'
        },
        tooltips: {
            mode: 'label',
        },
        hover: {
            mode: 'dataset'
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
                show: true,
                labelString: 'Minggu Ke'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              show: true,
              labelString: 'Presentase Pekerjaan (%)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 100,
            }
          }]
        }
      }
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        var myLine = new Chart(ctx, config);
        // document.getElementById("legendDiv").innerHTML = myLine.generateLegend();
        // console.log(myLine.generateLegend());
    };

</script>
