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
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Di Atas Target
          <i class="fa fa-arrow-up white"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Diatas Target"><h2 class="text-right">{{$totaldiatas}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Sesuai Target
          <i class="fa fa-check-square-o white"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Sesuai+Target"><h2 class="text-right">{{$totalsesuai}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Di Bawah Target
          <i class="fa fa-arrow-down yellow"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Dibawah+Target"><h2 class="text-right">{{$totaldibawah}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Kritis
          <i class="fa fa-exclamation white"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Kritis"><h2 class="text-right">{{$totalkritis}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Kontrak Akan Berakhir
          <!-- <i class="fa fa-calendar white"></i> -->
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}lappekakanexpired"><h2 class="text-right">{{ $jumlahpekerjaanakanexpired }} <i class="fa fa-road white"></i> Belum Selesai </h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Kontrak Berakhir
          <!-- <i class="fa fa-check-square-o white"></i> -->
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}lappekexpired"><h2 class="text-right">{{ $jumlahpekerjaanexpired }} <i class="fa fa-road white"></i> Belum Selesai</h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Belum Kontrak
          <i class="fa fa-edit yellow"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Belum+Kontrak"><h2 class="text-right">{{$jumlahpekerjaanbelumkontrak}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
  <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Belum Monitoring
          <i class="fa fa-desktop white"></i>
        </div>
      </div>
      <div class="panel-body">
        <a href="{{asset('/')}}pekerjaancari?pencarian=Belum+Monitoring"><h2 class="text-right">{{$jumlahpekerjaanbelummonitoring}} <i class="fa fa-road white"></i></h2></a>
      </div>
    </div>
  </div>
</div>
<div class="row top_tiles">
  <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Jumlah Pekerjaan Setiap Kecamatan <i class="fa fa-road white"></i>
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
            @foreach ($datapekerjaanKecamatan as $pekerjaanKecamatan)
            @php ($totalkontrak += $pekerjaanKecamatan -> totalpekerjaan)
            <tr>
              <td width="35px">{{ $no++ }}.</td>
              <td><i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                <a href="{{asset('/')}}lappeklok?pencarian={{ $pekerjaanKecamatan -> nama }}">
                  {{ $pekerjaanKecamatan -> nama }}
                </a>
              </td>
                <td class="text-right">
                  {{ $pekerjaanKecamatan -> totalpekerjaan }} Pekerjaan
                </td>
              </tr>
              @endforeach
              <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td class="text-right"><strong>{{ $totalkontrak }} Pekerjaan</strong></td>
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
            Grafik Jumlah Pekerjaan Kecamatan <i class="fa fa-pie-chart white"></i>
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
                  <td width="15px">{{ $no++ }}. </td>
                  <td>
                    <i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                    {{ $prosespengadaan -> propeng}}
                  </td>
                  <td width="140px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{$prosespengadaan -> propeng}}">
                      {{ $prosespengadaan -> totalpropeng}} Pekerjaan
                    </a>
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ $totalpekerjaan }} Pekerjaan</strong></td>
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
                  <td>
                    <i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                    {{ $jenispekerjaan -> jnspek}}
                  </td>
                  <td width="140px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $jenispekerjaan -> jnspek }}">
                    {{ $jenispekerjaan -> totaljnspek}} Pekerjaan </a>
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ $totalpekerjaan }} Pekerjaan</strong></td>
                </tr>
            </tbody>
          </table>
          <div class="text-center">
            <canvas id="chart-area4" width="270px" height="270px" />
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
                  <td>
                    <i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                    {{ $katpekerjaan -> katpek}}
                  </td>
                  <td width="140px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $katpekerjaan -> katpek }}">
                        {{ $katpekerjaan -> totalkatpek}} Pekerjaan
                    </a>
                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ $totalpekerjaan }} Pekerjaan</strong></td>
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
                  <td>
                    <i class="fa fa-square" style="color:{{ $warna[$no-2] }}"></i>
                    {{ $sumberdanapekerjaan -> sumberdana}}
                  </td>
                  <td width="140px" class="text-right">
                    <a href="{{asset('/')}}pekerjaancari?pencarian={{ $sumberdanapekerjaan -> sumberdana }}">
                        {{ $sumberdanapekerjaan -> totalsumberdana}} Pekerjaan
                    </a>

                  </td>
                </tr>
            @endforeach
                <tr>
                  <td colspan="2"><strong>Total </strong></td>
                  <td class="text-right"><strong>{{ $totalpekerjaan }} Pekerjaan</strong></td>
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
          Total Pekerjaan Selesai
          <i class="fa fa-road white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">
          <a href="{{asset('/')}}pekerjaancari?pencarian=Selesai">
          {{ $jumpekerjaanselesai }} dari {{ $jumpekerjaan }} Pekerjaan </a>
        </h2>
      </div>
    </div>
 <!--  </div>
  <div class="animated flipInY col-lg-4 col-md-4 col-sm-4 col-xs-12"> -->
    <div class="panel panel-primary">
      <div class="panel-heading">
        <div class="besar">
          Total Pekerjaan Belum Selesai
          <i class="fa fa-road white"></i>
        </div>
      </div>
      <div class="panel-body">
        <h2 class="text-right">
          <a href="{{asset('/')}}pekerjaancari?pencarian=Belum+Selesai">
            {{ $jumpekerjaan - $jumpekerjaanselesai }} dari {{ $jumpekerjaan }} Pekerjaan</h2>
          </a>
      </div>
    </div>
  </div>
</div>

@php ($kecamatan = "")
@php ($dana = "")
@foreach ($datapekerjaanKecamatan as $pekerjaanKecamatan)
  @php ($kecamatan .= "\"". $pekerjaanKecamatan -> nama."\",")
  @php ($dana .= $pekerjaanKecamatan -> totalpekerjaan. ",")
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