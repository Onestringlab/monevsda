@extends('templates.app')

@section('title')
	Hasil Pelaksanaan Program
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	@if(session()->get('role')=='Superman')
		<a href="#" id ="export"  class="btn btn-success btn-xs"><i class="fa fa-download"></i></a>
		<a href="#" id ="print"  class="btn btn-info btn-xs"><i class="fa fa-print"></i></a>
	@endif
	<div class="x_panel" id="cetak">
		<div>
			<img src="{{asset('/')}}images/kopSuratPUPR.jpeg" width="100%">
		</div>
		<div class="x_title text-primary">
			<h2>Hasil Pelaksanaan Program Tahun Anggaran {{session()->get('ta')}}</h2> 
			<div class="clearfix"></div>
		</div>
		<div class="x_content" id="data">
			<table class="table  jambo_table">
				<thead>
					<tr>
						<th>#</th>
						<!-- <th>Kegiatan</th>
						<th>kabupaten</th>
						<th>satuankerja</th>
						<th>dpa</th>
						<th>norka</th> -->
						<th width="400px">Nama Pekerjaan</th>
						<!-- <th >No Kontrak</th> -->
						<!-- <th width="100px">Tgl Laporan</th> -->
						<!-- <th>tglselesaipemeliharaan</th>
						<th>jmlhhari</th>
						<th>tglspmk</th>
						<th>nospmk</th>
						<th>tglpa</th>
						<th>nopa</th>
						<th>namapa</th>
						<th>tglppk</th>
						<th>noppk</th>
						<th>namappk</th>
						<th>tglpptk</th>
						<th>nopptk</th>
						<th>namapptk</th>
						<th>tglpenerima</th>
						<th>nopenerima</th>
						<th>namapenerima</th>
						<th>tglpphp</th>
						<th>nopphp</th>
						<th>timpphp</th> -->
						<!-- <th>bidang</th>
						<th>jnspek</th>
						<th>katpek</th>
						<th>ta</th>
						<th>propeng</th>
						<th>tahunkontrak</th>
						<th>nilaipagu</th> -->
						<!-- <th width="120px">Nilai Kontrak</th> -->
						<!-- <th width="100px">Tgl Selesai</th> -->
						<!-- <th>sumberdana</th> -->
						<!-- <th>Pengawas</th> -->
						<!-- <th>Perencana</th> -->
						<!-- <th>Pelaksana</th> -->
						<th class="text-center">A<br>(Buah)</th>
						<th class="text-center">B<br>(Buah)</th>
						<th class="text-center">C<br>(Km)</th>
						<th class="text-center">D<br>(Km)</th>
						<th class="text-center">E<br>(Km)</th>
						<th class="text-center">F<br>(Km)</th>
						<th class="text-center">G<br>(Km)</th>
						<th class="text-center">H<br>(Km)</th>
						<!-- <th class="text-center">I<br>(Meter)</th>
						<th class="text-center">J<br>(Meter)</th>
						<th class="text-center">K<br>(Meter)</th>
						<th class="text-center">L<br>(Buah)</th>
						<th class="text-center">M<br>(Meter)</th> -->
						<!-- <th>Kecamatan</th>
						<th>Desa</th> -->
						<!-- <th>status</th>
						<th>created_at</th>
						<th>updated_at</th>
						<th width="50px">Target</th>
						<th width="50px">Realisasi</th>
						<th width="50px">Margin</th>
						<th width="120px">Status Realisasi</th> -->
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@php ($A = 0)
					@php ($B = 0)
					@php ($C = 0)
					@php ($D = 0)
					@php ($E = 0)
					@php ($F = 0)
					@php ($G = 0)
					@php ($H = 0)
				<!-- 	@php ($I = 0)
					@php ($J = 0)
					@php ($K = 0)
					@php ($L = 0)
					@php ($M = 0) -->
					@php ($class = "")
					@foreach ($datapekerjaan as $pekerjaan)
						@php ($class = "")
						@if($pekerjaan['statuskemajuan'] != "" && $pekerjaan['statuskemajuan']== "Kritis")
							@php ($class = "danger")
						@elseif ($pekerjaan['statuskemajuan'] != "" && $pekerjaan['statuskemajuan']== "Dibawah Target")
							@php ($class = "warning")
						@endif
					<tr class="{{ $class }}">
						<td class="text-right">{{ $no++ }}</td>
						<!-- <td>{{ $pekerjaan['idkegiatan'] }}</td>
						<td>{{ $pekerjaan['kabupaten'] }}</td>
						<td>{{ $pekerjaan['satuankerja'] }}</td>
						<td>{{ $pekerjaan['dpa'] }}</td>
						<td>{{ $pekerjaan['norka'] }}</td> -->
						<td>{{ $pekerjaan['namapekerjaan'] }}</td>
						<!-- <td>{{ $pekerjaan['nokontrak'] }}</td> -->
						<!-- <td class="tengah">{{ $pekerjaan['tgllaporan'] }}</td> -->
						<!-- <td>{{ $pekerjaan['tglselesaipemeliharaan'] }}</td>
						<td>{{ $pekerjaan['jmlhhari'] }}</td>
						<td>{{ $pekerjaan['tglspmk'] }}</td>
						<td>{{ $pekerjaan['nospmk'] }}</td>
						<td>{{ $pekerjaan['tglpa'] }}</td>
						<td>{{ $pekerjaan['nopa'] }}</td>
						<td>{{ $pekerjaan['namapa'] }}</td>
						<td>{{ $pekerjaan['tglppk'] }}</td>
						<td>{{ $pekerjaan['noppk'] }}</td>
						<td>{{ $pekerjaan['namappk'] }}</td>
						<td>{{ $pekerjaan['tglpptk'] }}</td>
						<td>{{ $pekerjaan['nopptk'] }}</td>
						<td>{{ $pekerjaan['namapptk'] }}</td>
						<td>{{ $pekerjaan['tglpenerima'] }}</td>
						<td>{{ $pekerjaan['nopenerima'] }}</td>
						<td>{{ $pekerjaan['namapenerima'] }}</td>
						<td>{{ $pekerjaan['tglpphp'] }}</td>
						<td>{{ $pekerjaan['nopphp'] }}</td>
						<td>{{ $pekerjaan['timpphp'] }}</td> -->
						<!-- <td>{{ $pekerjaan['bidang'] }}</td>
						<td>{{ $pekerjaan['jnspek'] }}</td>
						<td>{{ $pekerjaan['katpek'] }}</td>
						<td>{{ $pekerjaan['ta'] }}</td>
						<td>{{ $pekerjaan['propeng'] }}</td>
						<td>{{ $pekerjaan['tahunkontrak'] }}</td>
						<td>{{ $pekerjaan['nilaipagu'] }}</td> -->
						<!-- <td align="right">{{ formatNumber($pekerjaan['nilaikontrak']) }}</td> -->
						<!-- <td>{{ $pekerjaan['tglselesaikerja'] }}</td> -->
						<!-- <td>{{ $pekerjaan['sumberdana'] }}</td> -->
						<td class="text-right">{{ $pekerjaan['jmlpintuairbangun'] }}</td>
						<td class="text-right">{{ $pekerjaan['jmlpintuairpelihara'] }}</td>
						<td class="text-right">{{ $pekerjaan['tangguljaringan'] }}</td>
						<td class="text-right">{{ $pekerjaan['kanalbanjir'] }}</td>
						<td class="text-right">{{ $pekerjaan['pjgsaluranrehab'] }}</td>
						<td class="text-right">{{ $pekerjaan['pjgsungai'] }}</td>
						<td class="text-right">{{ $pekerjaan['pstkendalibanjir'] }}</td>
						<td class="text-right">{{ $pekerjaan['peliharaparit'] }}</td>
						<!-- <td class="text-right">{{ $pekerjaan['kanalbanjir'] }}</td>
						<td class="text-right">{{ $pekerjaan['peliharaparit'] }}</td>
						<td class="text-right">{{ $pekerjaan['pembersihansungai'] }}</td>
						<td class="text-right">{{ $pekerjaan['rehabairbaku'] }}</td> -->
						<!-- <td class="text-right">{{ $pekerjaan['rehabdas'] }}</td> -->
						<!-- <td>{{ $pekerjaan['konpengawas'] }}</td> -->
						<!-- <td>{{ $pekerjaan['konperencana'] }}</td> -->
						<!-- <td>{{ $pekerjaan['konpelaksana'] }}</td> -->
						<!-- <td>{{ $pekerjaan->kecamatan->nama }}</td> -->
						<!-- <td>{{ $pekerjaan->desa->nama }}</td> -->
						<!-- <td>{{ $pekerjaan['status'] }}</td>
						<td>{{ $pekerjaan['created_at'] }}</td>
						<td>{{ $pekerjaan['updated_at'] }}</td>
						<td class="text-center">{{ $pekerjaan['targetkemajuan'] }}%</td>
						<td class="text-center">{{ $pekerjaan['realisasikemajuan'] }}%</td>
						<td class="text-center">{{ $pekerjaan['realisasikemajuan'] - $pekerjaan['targetkemajuan'] }}%</td>
						<td>{{ $pekerjaan['statuskemajuan'] }}</td> -->
					</tr>
						@php ($A += $pekerjaan['jmlpintuairbangun'])
						@php ($B += $pekerjaan['jmlpintuairpelihara'])
						@php ($C += $pekerjaan['tangguljaringan'])
						@php ($D += $pekerjaan['kanalbanjir'])
						@php ($E += $pekerjaan['pjgsaluranrehab'])
						@php ($F += $pekerjaan['pjgsungai'])
						@php ($G += $pekerjaan['pstkendalibanjir'])
						@php ($H += $pekerjaan['peliharaparit'])
						<!-- @php ($I += $pekerjaan['kanalbanjir'])
						@php ($J += $pekerjaan['peliharaparit'])
						@php ($K += $pekerjaan['pembersihansungai'])
						@php ($L += $pekerjaan['rehabairbaku'])
						@php ($M += $pekerjaan['rehabdas']) -->
					@endforeach
					<tr class="{{ $class }}">
						<td class="text-center"></td>
						<td class="text-left"><strong>Total </strong></td>
						<td class="text-right"><strong>{{ formatNumber($A,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($B,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($C,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($D,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($E,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($F,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($G,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($H,'Angka') }} </strong></td>
						<!-- <td class="text-right"><strong>{{ formatNumber($I,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($J,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($K,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($L,'Angka') }} </strong></td>
						<td class="text-right"><strong>{{ formatNumber($M,'Angka') }} </strong></td> -->
					</tr>
				</tbody>
			</table>
		</div>
		<div style="page-break-before: always;">&nbsp;</div>
		<div class="x_title text-primary">
			<h2>Rekap Hasil Pelaksanaan Program Tahun Anggaran {{session()->get('ta')}}</h2> 
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table width="100%">
				<tr>
					<td>A. Jumlah Pintu Air yang dibangun</td>
					<td>{{ formatNumber($A,'Angka') }} Buah</td>
					<td>B. Jumlah Pintu Air yang dipelihara</td>
					<td>{{ formatNumber($B,'Angka') }} Buah</td>
				</tr>
				<tr>
					<td>C. Panjang Tanggul Air yang dibangun</td>
					<td>{{ formatNumber($C,'Angka') }} Kilometer</td>
					<td>D. Panjang Tanggul Air yang direhabilitasi</td>
					<td>{{ formatNumber($D,'Angka') }} Kilometer</td>
				</tr>
				<tr>
					<td>E. Panjang Saluran yang direhabilitasi (DAK)</td>
					<td>{{ formatNumber($E,'Angka') }} Kilometer</td>
					<td>F. Panjang Saluran yang dinormalisasi</td>
					<td>{{ formatNumber($F,'Angka') }} Kilometer</td>
				</tr>
				<tr>
					<td>G. Panjang Saluran yang dipelihara</td>
					<td>{{ formatNumber($G,'Angka') }} Kilometer</td>
					<td>H. Panjang Saluran yang dibangun</td>
					<td>{{ formatNumber($H,'Angka') }} Kilometer</td>
				</tr>
				<!-- <tr>
					<td>I. Pembuatan Kanal Banjir</td>
					<td>{{ formatNumber($I,'Angka') }} Meter</td>
					<td>J. Peliharaan Parit Penanggulangan Banjir</td>
					<td>{{ formatNumber($J,'Angka') }} Meter</td>
				</tr>
				<tr>
					<td>K. Pembersihan dan Pengerukkan Sungai</td>
					<td>{{ formatNumber($K,'Angka') }} Meter</td>
					<td>L. Rehab Prasarana Air Baku</td>
					<td>{{ formatNumber($L,'Angka') }} Buah</td>
				</tr>
				<tr>
					<td>M. Rehab Saluran DAS</td>
					<td>{{ formatNumber($M,'Angka') }} Meter</td>
					<td></td>
					<td></td>
				</tr> -->
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function () {
	$("#export").click(function (event) {
    // var outputFile = 'export'
    var outputFile = window.prompt("Tuliskan Nama File .csv :");
    if(outputFile != null && outputFile !=''){
	    outputFile = outputFile.replace('.csv','') + '.csv'
	    // CSV
	    exportTableToCSV.apply(this, [$('#data>table'), outputFile]);
	  }
  });
  $("#print").click(function () {
    printData("cetak");
	});
});
</script>
@endsection
