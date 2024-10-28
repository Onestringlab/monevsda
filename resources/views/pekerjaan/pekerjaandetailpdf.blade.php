@extends('templates.pdf')

@section('title')
	Data Pekerjaan Detail
@endsection

@section('content')

<div class="header">Pekerjaan {{ $pekerjaan->namapekerjaan }}</div>
<br>
<div class="subheader">Satuan Kerja</div>
<hr>
<table width="100%" class="simple">
  <tr>
    <th class="title" width="20%">Kabupaten</th>
    <td width="30%">: {{ $pekerjaan->kabupaten }}</td>
    <th class="title" width="20%">Satuan Kerja</th>
    <td width="30%">: {{ $pekerjaan->satuankerja }}</td>
  </tr>
  <tr>
    <th class="title">Bidang</th>
    <td >: {{ $pekerjaan->bidang }}</td>
    <th class="title">T.A.</th>
    <td >: {{ $pekerjaan->ta }}</td>
  </tr>
</table>
<br>
<div class="subheader">Surat Keputusan dan Penjabat</div>
<hr>
<table width="100%" class="simple">
  <tr>
    <th class="title" width="20%">Tanggal DPA</th>
    <td width="30%">: {{ formatTanggal($pekerjaan->tgldpa) }}</td>
    <th class="title" width="20%">Tanggal RKA</th>
    <td width="30%">: {{ formatTanggal($pekerjaan->tglrka) }}</td>
  </tr>
  <tr>
    <th class="title">Tanggal PA</th>
    <td >: {{ formatTanggal($pekerjaan->tglpa) }}</td>
    <th class="title">SK PA</th>
    <td >: {{ $pekerjaan->nopa }}</td>
  </tr>
  <tr>
    <th class="title">Nama PA</th>
    <td colspan="3">: {{ namaPenjabat($pekerjaan->namapa) }}</td>
  </tr>
   <tr>
    <th class="title">Tanggal PPK</th>
    <td >: {{ formatTanggal($pekerjaan->tglppk) }}</td>
    <th class="title">SK PPK</th>
    <td >: {{ $pekerjaan->noppk }}</td>
  </tr>
  <tr>
    <th class="title">Nama PPK</th>
    <td colspan="3">: {{ namaPenjabat($pekerjaan->namappk) }}</td>
  </tr>
  </tr>
   <tr>
    <th class="title">Tanggal PPTK</th>
    <td >: {{ formatTanggal($pekerjaan->tglpptk) }}</td>
    <th class="title">SK PPTK</th>
    <td >: {{ $pekerjaan->nopptk }}</td>
  </tr>
  <tr>
    <th class="title">Nama PPTK</th>
    <td colspan="3">: {{ namaPenjabat($pekerjaan->namapptk) }}</td>
  </tr>
  <tr>
    <th class="title">Tanggal PPHP</th>
    <td >: {{ formatTanggal($pekerjaan->tglpphp) }}</td>
    <th class="title">SK pphp</th>
    <td >: {{ $pekerjaan->nopphp }}</td>
  </tr>
  <tr>
    <th class="title">Tim PPHP</th>
    <td colspan="3">: {{ namaPenjabat($pekerjaan->timpphp) }}</td>
  </tr>
  </tr>
</table>
<br>
<div class="subheader">Informasi Lelang</div>
<hr>
<table width="100%" class="simple">
	 <tr>
    <th class="title" width="20%">Kode Lelang</th>
    <td width="30%">: </td>
    <th class="title" width="20%">Tanggal Lelang</th>
    <td width="30%">: {{ formatTanggal($pekerjaan->tglkontrak) }}</td>
  </tr>
  <tr>
    <th class="title">Proses Pengadaan</th>
    <td>: {{ $pekerjaan->propeng }}</td>
  </tr>
</table>
<div class="page_break"></div>
<div class="subheader">Informasi Pekerjaan</div>
<hr>
<table width="100%" class="simple">
  <tr>
    <th class="title" width="20%">Nama Pekerjaan</th>
    <td colspan="3">: {{ $pekerjaan->namapekerjaan }}</td>
  </tr>
  <tr>
  	<th class="title" width="20%">Tanggal Kontrak</th>
    <td width="30%">: {{ formatTanggal($pekerjaan->tglkontrak) }}</td>
    <th class="title" width="20%">SK Kontrak</th>
    <td width="30%">: {{ $pekerjaan->nokontrak }}</td>
  </tr>
  <tr>
    <th class="title">Tanggal Selesai Kerja</th>
    <td>: {{formatTanggal($pekerjaan->tglselesaikerja)}}</td>
     <th class="title">Tahun Kontrak</th>
    <td>: {{ $pekerjaan->tahunkontrak }}</td>
  </tr>
  <tr>
    <th class="title">Waktu Pengerjaan</th>
    <td>: {{ $pekerjaan->jmlhhari }} Hari</td>
    <th class="title">Tanggal Selesai Pemeliharaan</th>
    <td>: {{ formatTanggal($pekerjaan->tglselesaipemeliharaan) }}</td>
  </tr>
  <tr>
    <th class="title">Jenis Pekerjaan</th>
    <td>: {{ $pekerjaan->jnspek }}</td>
    <th class="title">Kategori Pekerjaan</th>
    <td>: {{ $pekerjaan->katpek }}</td>
  </tr>
  <tr>
    <th class="title">Nilai Pagu</th>
    <td>: {{ formatNumber($pekerjaan->nilaipagu) }} </td>
    <th class="title">Nilai Kontrak</th>
    <td>: {{ formatNumber($pekerjaan->nilaikontrak) }}</td>
  </tr>
  <tr>
    <th class="title">Sumber Dana</th>
    <td>: {{ $pekerjaan->sumberdana }} </td>
    <th class="title">Status Pekerjaan</th>
    <td>: {{ $pekerjaan->statuspekerjaan }}</td>
  </tr>
</table>
<div class="subheader">Pelaksana Pekerjaan</div>
<hr>
<table width="100%" class="simple">
	<tr>
    <th class="title" width="20%">Konsultan Pengawas</th>
    <td width="30%">: {{ $pekerjaan->konpengawas }} </td>
    <th class="title" width="20%">Konsultan Perencana</th>
    <td width="30%">: {{ $pekerjaan->konperencana }}</td>
  </tr>
  <tr>
    <th class="title" >Kontraktor Pelaksana</th>
    <td>: {{ $pekerjaan->konpelaksana }} </td>
  </tr>
</table>
<br>
<div class="subheader">Lokasi Pekerjaan</div>
<hr>
<table width="100%" class="simple">
	<tr>
    <th class="title" width="20%">Kecamatan</th>
    <td width="30%">: {{ $pekerjaan->kecamatan->nama }} </td>
    <th class="title" width="20%">Desa</th>
    <td width="30%">: {{ $pekerjaan->desa->nama }}</td>
  </tr>
</table>
<br>
<div class="subheader">Data Koordinat dan Peta Pekerjaan</div>
<hr>
<table width="100%" class="simple">
	<tr>
    <td width="30%" style="vertical-align: top">
			<table width="100%" class="bordasimples">
				<thead>
					<tr>
						<th class="tengah" width="50px">#</th>
						<th class="tengah">Latitude</th>
						<th class="tengah">Latitude</th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 0)
					@php ($abjad = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N'])
					@foreach ($datakoordinat as $koordinat)
					<tr>
						<td class="tengah">{{ $abjad[$no++] }}</td>
						<td>{{ $koordinat['latkoor'] }}</td>
						<td>{{ $koordinat['lngkoor'] }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
    </td>

    <td width="60%">
			<div id="map">
			</div>
    </td>
  </tr>
</table>
<script>
  var map;
  function initMap() {
  	var marker;
  	var markers = [];
    var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    var labelIndex = 0;
    var cenLatLong = 0;
   	var flightPlanCoordinates = [
   			@foreach ($datakoordinat as $koordinat)
          {lat: {{$koordinat['latkoor']}}, lng: {{$koordinat['lngkoor']}} },
        @endforeach
        ];
	  var flightPath = new google.maps.Polyline({
	    path: flightPlanCoordinates,
	    geodesic: true,
	    strokeColor: '#FF0000',
	    strokeOpacity: 1.0,
	    strokeWeight: 2
	  });
	  cenLatLong = Math.floor(flightPlanCoordinates.length/2);
	  map = new google.maps.Map(document.getElementById('map'), {
      center: flightPlanCoordinates[cenLatLong],
      zoom: 16
    });
	  //Add listener
		google.maps.event.addListener(map, "click", function (event) {
		    var latitude = event.latLng.lat();
		    var longitude = event.latLng.lng();
		    console.log( latitude + ', ' + longitude );
		}); //end addListener


	  clearMarkers();
    for (var i = 0; i < flightPlanCoordinates.length; i++) {
      addMarkerWithTimeout(flightPlanCoordinates[i], i * 1000);
    }

    function addMarkerWithTimeout(position, timeout) {
      window.setTimeout(function() {
      	marker = new google.maps.Marker({
          position: position,
          map: map,
          label: labels[labelIndex++],
          animation: google.maps.Animation.DROP
        });
        markers.push(marker);
      	google.maps.event.addListener(marker, 'click', (function(marker, i) {
	        return function() {
      			console.log(this.getPosition().lat() +' '+this.getPosition().lng());
      			// infowindow.open(map, marker);
	        }
	      })(marker, i));
      }, timeout);
    }

    function clearMarkers() {
      for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
      }
      markers = [];
    }
  	flightPath.setMap(map);

  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-gxjioIryRlDLbf-s2lpHbO1sRhqEZWk&callback=initMap" async defer></script>
<br>
<div class="subheader">Kurva S</div>
<hr>
<table width="100%" class="bordasimples">
	<tr>
		<th width="120px">Minggu Ke</th>
		@foreach ($datalaporanfisik as $laporanfisik)
		<th class="tengah">{{ $laporanfisik["mingguke"] }}</th>
		@endforeach
	</tr>
	<tr>
			<th>Target</th>
			@foreach ($datalaporanfisik as $laporanfisik)
				<td class="tengah">{{ $laporanfisik["target"] }}%</td>
			@endforeach
		</tr>
		<tr>
			<th>Realisasi</th>
			@foreach ($datalaporanfisik as $laporanfisik)
				<td class="tengah">{{ $laporanfisik["kemajuan"] }}%</td>
			@endforeach
		</tr>
		<tr>
			<th>Deviasi</th>
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
				<td class="tengah {{$class}}">{{ $selisih }}%</td>
			@endforeach
		</tr>
</table>
<br>
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
<br>
<table width="100%" class="simple">
	<tr>
		<td>
			<canvas id="canvas"></canvas>
		</td>
	</tr>
</table>
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
<div class="page_break"></div>
<div class="subheader">Data Laporan Fisik</div>
<hr>
@php ($no = 1)
@foreach ($datalaporanfisik as $laporanfisik)
<table width="100%" class="bordasimples">
	<thead>
		<tr>
			<th class="tengah" width="50px" >#</th>
			<th class="tengah" width="150px">Tanggal</th>
			<th class="tengah" width="150px">Minggu Ke</th>
			<th class="tengah">Keterangan</th>
			<th class="tengah" width="100px">Target</th>
			<th class="tengah" width="100px">Realisasi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td class="tengah">{{ $no++ }}</td>
			<td class="tengah">{{ formatTanggal($laporanfisik['tanggal']) }}</td>
			<td class="tengah">{{ $laporanfisik['mingguke'] }}</td>
			<td>{{ $laporanfisik['keterangan'] }}</td>
			<td class="tengah">{{ $laporanfisik['target'] }}%</td>
			<td class="tengah">{{ $laporanfisik['kemajuan'] }}%</td>
		</tr>
	</tbody>
</table>
<div class="subheader">Photo</div>
<hr>
	@foreach ($laporanfisik->dataphotofisik as $photofisik)
		<img style="border: 5px solid black;" src="{{$_SERVER['DOCUMENT_ROOT']}}/monevsda/public/dataunggah/gambar/{{ $photofisik['photofisik'] }}" align="center" />
		<div class="judul-gambar">{{ $photofisik['judul'] }}</div>
	@endforeach
<div class="page_break"></div>
@endforeach
<div class="subheader">Data Laporan Keuangan</div>
<hr>
<table width="100%" class="bordasimples">
	<thead>
		<tr>
			<th class="tengah" width="50px">#</th>
			<th class="tengah" width="120px">Tanggal</th>
			<th class="tengah" >Keterangan</th>
			<th class="tengah"  width="200px">Pembayaran</th>
		</tr>
	</thead>
	<tbody>
		@php ($no = 1)
		@php ($totalpembayaran = 0)
		@php ($totalpersen = 0)
		@foreach ($datalaporankeuangan as $laporankeuangan)
			@php ($totalpembayaran += $laporankeuangan['pembayaran'])
			@php ($totalpersen = 100 * $totalpembayaran / $pekerjaan['nilaikontrak'])
		<tr>
			<td class="tengah" >{{ $no++ }}</td>
			<td class="tengah" >{{ formatTanggal($laporankeuangan['tanggal']) }}</td>
			<td>{{ $laporankeuangan['keterangan'] }}</td>
			<td class="kanan">{{ formatNumber($laporankeuangan['pembayaran']) }}</td>
		</tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td><strong>Total</strong></td>
			<td class="kanan"><strong>{{ formatNumber($totalpembayaran) }}</strong></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><strong>Sisa Pembayaran</strong></td>
			<td class="kanan"><strong>{{ formatNumber($pekerjaan['nilaikontrak'] - $totalpembayaran ) }} </strong></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><strong>Nilai Kontrak </strong></td>
			<td class="kanan"><strong>{{ formatNumber($pekerjaan['nilaikontrak']) }} </strong></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td><strong>Presentase Pembayaran</strong></td>
			<td class="kanan"><strong>{{ formatPersen(100 * $totalpembayaran / $pekerjaan['nilaikontrak']) }}%</strong></td>
		</tr>
</table>
<div class="subheader">Data File Terkait</div>
<hr>
<table width="100%" class="bordasimples">
  <thead>
    <tr>
      <th class="tengah" width="50px">#</th>
      <th class="tengah">Nama File</th>
    </tr>
  </thead>
  <tbody>
    @php ($no = 1)
    @foreach ($datadokumen as $dokumen)
    <tr>
      <td class="tengah">{{ $no++ }}</td>
      <td>{{ $dokumen['juduldokumen'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection