@extends('templates.app')

@section('title')
Data Dashboard
@endsection

@section('content')
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Tahun Anggaran
          <i class="fa fa-calendar putih"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{session()->get('ta')}}</h2>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Program
          <i class="fa fa-book white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{ $jumprogram }}</h2>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Kegiatan
          <i class="fa fa-file-text-o white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{ $jumkegiatan }}</h2>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Pekerjaan
          <i class="fa fa-road white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{ $jumpekerjaan }}</h2>
      </div>
    </div>
  </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Total Nilai Pagu
          <i class="fa fa-money white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{formatNumber($totalpagu)}}</h2>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Total Nilai Kontrak
          <i class="fa fa-pencil white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{formatNumber($totalkontrak)}}</h2>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Total Pencairan Dana
          <i class="fa fa-money white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">{{ formatNumber($jumdanacair) }}</h2>
      </div>
    </div>
  </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Nilai Kontrak Setiap Kecamatan
          <i class="fa fa-money white"></i>
        </div>
      </div>
      <div class="canvas-holder">
        <table class="table table-striped jambo_table ">
         <!--  <thead>
            <tr>
              <th width="35px">#</th>
              <th width="200px">Kecamatan</th>
              <th >Dana</th>
            </tr>
          </thead> -->
          <tbody>
            @php ($no = 1)
            @php ($totalkontrak = 0)
            @php ($warna = ["#FF0000", "#00FF00", "#0000FF", "#FFFF00", "#00FFFF", "#FF00FF", "#808080", "#800000", "#808000", "#800080"])
            @foreach ($datadanaKecamatan as $danaKecamatan)
            @php ($totalkontrak += $danaKecamatan -> totaldana)
            <tr>
              <td width="35px">{{ $no++ }}.</td>
              <td><i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                <a href="{{asset('/')}}lappeklok?pencarian={{ $danaKecamatan -> nama }}">
                  {{ $danaKecamatan -> nama }}</td>
                </a>
                <td class="text-right">
                    {{ formatNumber($danaKecamatan -> totaldana) }}
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td class="text-right"><strong>{{ formatNumber($totalkontrak) }}</strong></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <div class="besar">
            Grafik Nilai Kontrak Kecamatan <i class="fa fa-pie-chart white"></i>
          </div>
        </div>
        <div class="canvas-holder">
          <div class="text-center">
            <canvas id="chart-area2" width="400px" height="400px" />
          </div>
        </div>
      </div>
    </div>
  </div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Proses Pengadaan
          <i class="fa fa-road white"></i>
        </div>
      </div>
     <div class="canvas-holder">
        <table class="table table-striped jambo_table ">
          <tbody>
            @php ($no = 1)
            @php ($totalpekerjaan = 0)
            @foreach ($dataprosespengadaan as $prosespengadaan)
              @php ($totalpekerjaan += $prosespengadaan -> totalpropeng)
                <tr>
                  <td width="15px">{{ $no++ }}.</td>
                  <td><i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i> {{ $prosespengadaan -> propeng}} </td>
                  <td width="160px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{$prosespengadaan -> propeng}}">
                      {{  formatNumber($prosespengadaan -> totalpropeng) }}
                    </a> 
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{  formatNumber($totalpekerjaan) }} </strong></td>
                </tr>
            </tbody>
          </table>
          <div class="text-center">
            <canvas id="chart-area3" width="200px" height="200px" />
          </div>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Jenis Pekerjaan
          <i class="fa fa-road white"></i>
        </div>
      </div>
     <div class="canvas-holder">
        <table class="table table-striped jambo_table ">
          <tbody>
            @php ($no = 1)
            @php ($totalpekerjaan = 0)
            @foreach ($datajenispekerjaan as $jenispekerjaan)
              @php ($totalpekerjaan += $jenispekerjaan -> totaljnspek)
                <tr>
                  <td width="15px">{{ $no++ }}. </td>
                  <td><i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i> {{ $jenispekerjaan -> jnspek}} </td>
                  <td width="160px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $jenispekerjaan -> jnspek }}">
                      {{  formatNumber($jenispekerjaan -> totaljnspek) }}
                    </a>
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ formatNumber($totalpekerjaan) }} </strong></td>
                </tr>
            </tbody>
          </table>
          <div class="text-center">
            <canvas id="chart-area4" width="300px" height="300px" />
          </div>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Kategori Pekerjaan
          <i class="fa fa-road white"></i>
        </div>
      </div>
     <div class="canvas-holder">
        <table class="table table-striped jambo_table ">
          <tbody>
            @php ($no = 1)
            @php ($totalpekerjaan = 0)
            @foreach ($datakatpekerjaan as $katpekerjaan)
              @php ($totalpekerjaan += $katpekerjaan -> totalkatpek)
                <tr>
                  <td width="15px">{{ $no++ }}. </td>
                  <td><i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i> {{ $katpekerjaan -> katpek}} </td>
                  <td width="160px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $katpekerjaan -> katpek }}">
                      {{ formatNumber($katpekerjaan -> totalkatpek) }}
                    <
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ formatNumber($totalpekerjaan) }} </strong></td>
                </tr>
            </tbody>
          </table>
          <div class="text-center">
            <canvas id="chart-area5" width="200px" height="200px" />
          </div>
      </div>
    </div>
  </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Sumber Dana
          <i class="fa fa-road white"></i>
        </div>
      </div>
     <div class="canvas-holder">
        <table class="table table-striped jambo_table ">
          <tbody>
            @php ($no = 1)
            @php ($totalpekerjaan = 0)
            @foreach ($datasumberdanapekerjaan as $sumberdanapekerjaan)
              @php ($totalpekerjaan += $sumberdanapekerjaan -> totalsumberdana)
                <tr>
                  <td width="15px">{{ $no++ }}. </td>
                  <td>{{ $sumberdanapekerjaan -> sumberdana}} </td>
                  <td width="160px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $sumberdanapekerjaan -> sumberdana }}">
                        {{ formatNumber($sumberdanapekerjaan -> totalsumberdana) }}
                    </a>
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ formatNumber($totalpekerjaan) }} </strong></td>
                </tr>
            </tbody>
          </table>
          <div class="text-center">
            <canvas id="chart-area6" width="200px" height="200px" />
          </div>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Jumlah Pekerjaan Sudah Pencairan
          <i class="fa fa-money white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">
          <a href="{{asset('/')}}lappekcair?pencarian=Sudah Pencairan">
            {{ $jumlahpekerjaancair }} dari {{ $jumpekerjaan }} Pekerjaan</i></h2>
          </a>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Jumlah Pekerjaan Belum Pencairan
          <i class="fa fa-money white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">
          <a href="{{asset('/')}}lappekcair?pencarian=Belum Pencairan">
            {{ $jumpekerjaan - $jumlahpekerjaancair }} dari {{ $jumpekerjaan }} Pekerjaan</i></h2>
          </a>
      </div>
    </div>
  </div>
</div>

@php ($kecamatan = "")
@php ($dana = "")
@foreach ($datadanaKecamatan as $danaKecamatan)
  @php ($kecamatan .= "\"". $danaKecamatan -> nama."\",")
  @php ($dana .= $danaKecamatan -> totaldana. ",")
@endforeach

@php ($jnspek = "")
@php ($totaljnspek = "")
@foreach ($datajenispekerjaan as $jenispekerjaan)
  @php ($jnspek .= "\"".$jenispekerjaan -> jnspek. "\",")
  @php ($totaljnspek .= $jenispekerjaan -> totaljnspek.",")
@endforeach

@php ($propeng = "")
@php ($totalpropeng = "")
@foreach ($dataprosespengadaan as $prosespengadaan)
  @php ($propeng .= "\"".$prosespengadaan -> propeng. "\",")
  @php ($totalpropeng .= $prosespengadaan -> totalpropeng.",")
@endforeach

@php ($katpek = "")
@php ($totalkatpek = "")
@foreach ($datakatpekerjaan as $katpekerjaan)
  @php ($katpek .= "\"".$katpekerjaan -> katpek. "\",")
  @php ($totalkatpek .= $katpekerjaan -> totalkatpek.",")
@endforeach

@php ($sumberdana = "")
@php ($totalsumberdana = "")
@foreach ($datasumberdanapekerjaan as $sumberdanapekerjaan)
  @php ($sumberdana .= "\"".$sumberdanapekerjaan -> sumberdana. "\",")
  @php ($totalsumberdana .= $sumberdanapekerjaan -> totalsumberdana.",")
@endforeach
<script>
  var config = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
          {!!$dana!!}
          ],
          backgroundColor: [
          "#FF0000",
          "#00FF00",
          "#0000FF",
          "#FFFF00",
          "#00FFFF",
          "#FF00FF",
          "#808080",
          "#800000",
          "#808000",
          "#800080"
          ],
        }],
        labels: [
        {!!$kecamatan!!}
        ]
      },
      options: {
        responsive: false,
        legend : true
      }
    };

  var config3 = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
          {!!$totalpropeng!!}
          ],
          backgroundColor: [
          "#FF0000",
          "#00FF00",
          "#0000FF",
          "#FFFF00",
          "#00FFFF",
          "#FF00FF",
          "#808080",
          "#800000",
          "#808000",
          "#800080"
          ],
        }],
        labels: [
        {!!$propeng!!}
        ]
      },
      options: {
        responsive: false,
        legend : true
      }
    };

  var config4 = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
          {!!$totaljnspek!!}
          ],
          backgroundColor: [
          "#FF0000",
          "#00FF00",
          "#0000FF",
          "#FFFF00",
          "#00FFFF",
          "#FF00FF",
          "#808080",
          "#800000",
          "#808000",
          "#800080"
          ],
        }],
        labels: [
        {!!$jnspek!!}
        ]
      },
      options: {
        responsive: false,
        legend : true
      }
    };

  var config5 = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
          {!!$totalkatpek!!}
          ],
          backgroundColor: [
          "#FF0000",
          "#00FF00",
          "#0000FF",
          "#FFFF00",
          "#00FFFF",
          "#FF00FF",
          "#808080",
          "#800000",
          "#808000",
          "#800080"
          ],
        }],
        labels: [
        {!!$katpek!!}
        ]
      },
      options: {
        responsive: false,
        legend : true
      }
    };

  var config6 = {
      type: 'pie',
      data: {
        datasets: [{
          data: [
          {!!$totalsumberdana!!}
          ],
          backgroundColor: [
          "#FF0000",
          "#00FF00",
          "#0000FF",
          "#FFFF00",
          "#00FFFF",
          "#FF00FF",
          "#808080",
          "#800000",
          "#808000",
          "#800080"
          ],
        }],
        labels: [
        {!!$sumberdana!!}
        ]
      },
      options: {
        responsive: false,
        legend : true
      }
    };

  var barChartData3 = {
    labels: [{!!$propeng!!}],
    datasets: [{
      label: 'Proses Pengadaaan',
      backgroundColor: "#FFFF00",
      data: [{!! $totalpropeng !!}]
    }]
  };

  var barChartData4 = {
    labels: [{!!$jnspek!!}],
    datasets: [{
      label: 'Jenis Pekerjaan',
      backgroundColor: "#808080",
      data: [{!! $totaljnspek !!}]
    }]
  };

  var barChartData5 = {
    labels: [{!!$katpek!!}],
    datasets: [{
      label: 'Kategori Pekerjaan',
      backgroundColor: "#0000FF",
      data: [{!! $totalkatpek !!}]
    }]
  };

  var barChartData6 = {
    labels: [{!!$sumberdana!!}],
    datasets: [{
      label: 'Sumber Dana Pekerjaan',
      backgroundColor: "#0000FF",
      data: [{!! $totalsumberdana !!}]
    }]
  };

  window.onload = function() {
    var ctx = document.getElementById("chart-area2").getContext("2d");
    window.myPie = new Chart(ctx, config);

    var ctx3 = document.getElementById("chart-area3").getContext("2d");
    window.myPie = new Chart(ctx3, config3);

  //   var ctx3 = document.getElementById("chart-area3").getContext("2d");
  //   window.myBar3 = new Chart(ctx3, {
  //     type: 'bar',
  //     data: barChartData3,
  //     options: {
  //       elements: {
  //         rectangle: {
  //           borderWidth: 2,
  //           borderColor: '#00FF00',
  //           borderSkipped: 'bottom'
  //         }
  //       },
  //       responsive: true,
  //       legend: {
  //         display: false,
  //       },
  //   }
  //   });
  // window.myBar3.update();

  var ctx4 = document.getElementById("chart-area4").getContext("2d");
  window.myPie = new Chart(ctx4, config4);

  // var ctx4 = document.getElementById("chart-area4").getContext("2d");
  //   window.myBar4 = new Chart(ctx4, {
  //     type: 'bar',
  //     data: barChartData4,
  //     options: {
  //       elements: {
  //         rectangle: {
  //           borderWidth: 2,
  //           borderColor: 'rgb(0, 255, 0)',
  //           borderSkipped: 'bottom'
  //         }
  //       },
  //       responsive: true,
  //       legend: {
  //         display: false,
  //       },
  //   }
  //   });
  // window.myBar4.update();

  var ctx5 = document.getElementById("chart-area5").getContext("2d");
  window.myPie = new Chart(ctx5, config5);

  // var ctx5 = document.getElementById("chart-area5").getContext("2d");
  //   window.myBar5 = new Chart(ctx5, {
  //     type: 'bar',
  //     data: barChartData5,
  //     options: {
  //       elements: {
  //         rectangle: {
  //           borderWidth: 2,
  //           borderColor: 'rgb(0, 255, 0)',
  //           borderSkipped: 'bottom'
  //         }
  //       },
  //       responsive: true,
  //       legend: {
  //         display: false,
  //       },
  //   }
  //   });
  // window.myBar5.update();

  var ctx6 = document.getElementById("chart-area6").getContext("2d");
  window.myPie = new Chart(ctx6, config6);
}
</script>
@endsection