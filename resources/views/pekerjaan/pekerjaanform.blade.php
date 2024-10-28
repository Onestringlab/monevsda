@extends('templates.app')

@section('title')
	Data Pekerjaan
@endsection

@section('content')
<script>
function button_cancel(idkegiatan,data){
	if(data == 'n'){
		location.replace("{{ asset('/')}}"+"pekerjaan/"+idkegiatan);
	}else if(data == 'y'){
		location.replace("{{ asset('/')}}"+"pekerjaanall/");
	}
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title text-primary">
			<h2>Data Pekerjaan</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}pekerjaan/manage" method="post">
				@if($action == 'insert')
					<div class="x_title text-success">
						<h2>Satuan Kerja</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kabupaten</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kabupaten" value="{{ $kabupaten->value }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Satuan Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="satuankerja" value="{{ $satuankerja->value }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Bidang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($databidang,'kode','value','bidang','')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Anggaran</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ session()->get('ta')}}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Surat Keputusan dan Pejabat</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal DPA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tgldpa" value="{{ $tgldpa->value }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal RKA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglrka" value="{{ $tglrka->value }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nopa" value="{{ $skpa->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglpa" value="{{ $skpa->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($skpa->penjabat,'nip','namapenjabat','namapa','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="noppk" value="{{ $ppk->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglppk" value="{{ $ppk->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($ppk->penjabat,'nip','namapenjabat','namappk','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nopptk" value="{{ $pptk->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglpptk" value="{{ $pptk->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pptk->penjabat,'nip','namapenjabat','namapptk','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nopp" value="{{ $pp->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglpp" value="{{ $pp->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pp->penjabat,'nip','namapenjabat','namapp','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nopphp" value="{{ $pphp->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglpphp" value="{{ $pphp->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tim PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pphp->penjabat,'nip','namapenjabat','timpphp','')!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Informasi Lelang</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kode Lelang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kodelelang" value="">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Lelang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tgllelang" value="">
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Informasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pekerjaan</div>
						<div class="col-xs-8 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="namapekerjaan" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nokontrak" value="">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglkontrak" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglselesaikerja" value="">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Pemeliharaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglselesaipemeliharaan" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu Pengerjaan (Hari)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="jmlhhari" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jenis Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datajnspek,'kode','value','jnspek','','N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kategori Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakatpek,'kode','value','katpek','','N')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Proses Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datapropeng,'kode','value','propeng','','N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datathnkon,'kode','value','tahunkontrak','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Pagu (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nilaipagu" value="" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Kontrak (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nilaikontrak" value="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Sumber Dana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datasumberdana,'kode','value','sumberdana','')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datastapek,'kode','value','statuspekerjaan','Belum Selesai')!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Volume Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang dibangun (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="jmlpintuairbangun" value="0">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang direhabilitasi (APBD) (DAK) (IPDMIP) (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="pjgsaluranrehab" value="0">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang direhab (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="jmlpintuairpelihara" value="0" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dinormalisasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="pjgsungai" value="0" step="any">
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jaringan Rawa yang direhabilitasi (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="jawarehab" value="0" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Jaringan Rawa (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="pjgjawa" value="0" step="any">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="tangguljaringan" value="0" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dipelihara (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="pstkendalibanjir" value="0" step="any">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang direhabilitasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="kanalbanjir" value="0" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="peliharaparit" value="0" step="any">
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Pembersihan dan Pengerukkan Sungai (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="pembersihansungai" value="0" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Prasarana Air Baku (Buah)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="rehabairbaku" value="0" step="any">
						</div>
					</div> -->
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Saluran DAS (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="number" name="rehabdas" value="0" step="any">
						</div>
					</div> -->
					<div class="x_title text-success">
						<h2>Pelaksana Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Perencana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konperencana','','N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pengawas</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konpengawas','','N')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konpelaksana','','N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kontraktor Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konpelaksana','','N')!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Lokasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kecamatan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakecamatan,'idkecamatan','nama','idkecamatan','','Y','kecamatan')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Desa</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datadesa,'iddesa','nama','iddesa','','Y','desa')!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Status Data</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status','Aktif')!!}
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkegiatan" value = "{{ $idkegiatan }}"?>
							<input type = "hidden" name = "ta" value = "{{ session() -> get('ta') }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $idkegiatan }},'n')">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
				  <div class="x_title text-success">
						<h2>Satuan Kerja</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kabupaten</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="kabupaten" value="{{ $row->kabupaten }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Satuan Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="satuankerja" value="{{ $row->satuankerja }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Bidang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($databidang,'kode','value','bidang',$row->bidang)!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Anggaran</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ session() -> get('ta') }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Surat Keputusan dan Pejabat</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal DPA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tgldpa" value="{{ $row->tgldpa }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal RKA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglrka" value="{{ $row->tglrka }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nopa" value="{{ $row->nopa }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglpa" value="{{ $row->tglpa }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($skpa->penjabat,'nip','namapenjabat','namapa',$row->namapa)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="noppk" value="{{ $row->noppk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglppk" value="{{ $row->tglppk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($ppk->penjabat,'nip','namapenjabat','namappk',$row->namappk)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nopptk" value="{{ $row->nopptk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglpptk" value="{{ $row->tglpptk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pptk->penjabat,'nip','namapenjabat','namapptk',$row->namapptk)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="nopp" value="{{ $pp->nosk }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tglpp" value="{{ $pp->tglsk }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pp->penjabat,'nip','namapenjabat','namapp',$row->namapp)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nopphp" value="{{ $row->nopphp }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglpphp" value="{{ $row->tglpphp }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tim PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($pphp->penjabat,'nip','namapenjabat','timpphp',$row->timpphp)!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Informasi Lelang</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kode Lelang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kodelelang" value="{{ $row->kodelelang }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Lelang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							<input class="form-control" type="date" name="tgllelang" value="{{ $row->tgllelang }}">
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Informasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pekerjaan</div>
						<div class="col-xs-8 col-sm-10 col-md-10">
	   					<input class="form-control" type="text" name="namapekerjaan" value="{{ $row->namapekerjaan }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nokontrak" value="{{ $row->nokontrak }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglkontrak" value="{{ $row->tglkontrak }}" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglselesaikerja" value="{{ $row->tglselesaikerja }}">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Pemeliharaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="date" name="tglselesaipemeliharaan" value="{{ $row->tglselesaipemeliharaan }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu Pengerjaan (Hari)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="jmlhhari" value="{{ $row->jmlhhari }}">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jenis Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datajnspek,'kode','value','jnspek',$row->jnspek,'N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kategori Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakatpek,'kode','value','katpek',$row->katpek,'N')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Proses Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datapropeng,'kode','value','propeng',$row->propeng,'N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datathnkon,'kode','value','tahunkontrak',$row->tahunkontrak,'N')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Pagu (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nilaipagu" value="{{ $row->nilaipagu }}" {!! fieldRequired('Harap Diisi') !!}>
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Kontrak (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="nilaikontrak" value="{{ $row->nilaikontrak }}" >
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Sumber Dana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datasumberdana,'kode','value','sumberdana',$row->sumberdana)!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datastapek,'kode','value','statuspekerjaan',$row->statuspekerjaan)!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Volume Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang dibangun (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="jmlpintuairbangun" value="{{ $row->jmlpintuairbangun }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang direhabilitasi (APBD) (DAK) (IPDMIP) (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="pjgsaluranrehab" value="{{ $row->pjgsaluranrehab }}" step="any">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang direhab (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="jmlpintuairpelihara" value="{{ $row->jmlpintuairpelihara }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dinormalisasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="pjgsungai" value="{{ $row->pjgsungai }}" step="any">
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jaringan Rawa yang direhabilitasi (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="jawarehab" value="{{ $row->jawarehab }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Jaringan Rawa (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="pjgjawa" value="{{ $row->pjgjawa }}" step="any">
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="tangguljaringan" value="{{ $row->tangguljaringan }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dipelihara (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="pstkendalibanjir" value="{{ $row->pstkendalibanjir }}" step="any">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang direhabilitasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="kanalbanjir" value="{{ $row->kanalbanjir }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="peliharaparit" value="{{ $row->peliharaparit }}" step="any">
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Pembersihan dan Pengerukkan Sungai (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="pembersihansungai" value="{{ $row->pembersihansungai }}" step="any">
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Prasarana Air Baku (Buah)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="rehabairbaku" value="{{ $row->rehabairbaku }}" step="any">
						</div>
					</div> -->
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Saluran DAS (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
	   					<input class="form-control" type="number" name="rehabdas" value="{{ $row->rehabdas }}" step="any">
						</div>
					</div> -->
					<div class="x_title text-success">
						<h2>Pelaksana Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pengawas</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konpengawas',$row->konpengawas,'N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Perencana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konperencana',$row->konperencana,'N')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','konpelaksana',$row->konpelaksana,'N')!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kontraktor Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakonsultan,'nama','nama','ktrpelaksana',$row->ktrpelaksana,'N')!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Lokasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kecamatan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datakecamatan,'idkecamatan','nama','idkecamatan',$row->idkecamatan)!!}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Desa</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datadesa,'iddesa','nama','iddesa',$row->iddesa)!!}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Status Data</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<input type = "hidden" name = "idkegiatan" value = "{{ $row->idkegiatan }}"?>
							<input type = "hidden" name = "data" value = "{{ $data }}"?>
							<input type = "hidden" name = "ta" value = "{{ session() -> get('ta') }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idkegiatan}}, '{{ $data}}' )">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
				  <div class="x_title text-success">
						<h2>Satuan Kerja</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kabupaten</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->kabupaten }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Satuan Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->satuankerja }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Bidang</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->bidang }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Anggaran</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->ta }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Surat Keputusan dan Pejabat</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal DPA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tgldpa) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal RKA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglrka) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglpa) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->nopa }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PA</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ namaPenjabat($row->namapa) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglppk) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->noppk }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ namaPenjabat($row->namappk) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglpptk) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->nopptk }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPTK</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ namaPenjabat($row->namapptk) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->nopp }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ formatTanggal($row->tglpp) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pejabat Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ namaPenjabat($row->namapp) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglpphp) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->nopphp }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tim PPHP</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ namaPenjabat($row->timpphp) }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Informasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pekerjaan</div>
						<div class="col-xs-8">
							: {{ $row->namapekerjaan }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->nokontrak }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglkontrak) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Kerja</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglselesaikerja) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Pemeliharaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatTanggal($row->tglselesaipemeliharaan) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu Pengerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->jmlhhari }} hari
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jenis Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->jnspek }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kategori Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->katpek }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Proses Pengadaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->propeng }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Kontrak</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->tahunkontrak }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Pagu (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatNumber($row->nilaipagu) }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Kontrak (Rp)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ formatNumber($row->nilaikontrak) }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Sumber Dana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->sumberdana }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status Pekerjaan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->statuspekerjaan }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Volume Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang dibangun (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->jmlpintuairbangun }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang direhabilitasi (APBD) (DAK) (IPDMIP) (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->pjgsaluranrehab }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang direhab (APBD) (DAK) (IPDMIP)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->jmlpintuairpelihara }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dinormalisasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->pjgsungai }}
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jaringan Rawa yang direhabilitasi (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->jawarehab }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Jaringan Rawa (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->pjgjawa }}
						</div>
					</div> -->
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->tangguljaringan }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dipelihara (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->pstkendalibanjir }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang direhabilitasi (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->kanalbanjir }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dibangun (Kilometer)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->peliharaparit }}
						</div>
					</div>
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Pembersihan dan Pengerukkan Sungai (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->pembersihansungai }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Prasarana Air Baku (Buah)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->rehabairbaku }}
						</div>
					</div> -->
					<!-- <div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Saluran DAS (Meter)</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							{{ $row->rehabdas }}
						</div>
					</div> -->
					<div class="x_title text-success">
						<h2>Pelaksana Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pengawas</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->konpengawas }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Perencana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->konperencana }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->konpelaksana }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kontraktor Pelaksana</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->ktrpelaksana }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Lokasi Pekerjaan</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kecamatan</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->kecamatan->nama }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Desa</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->desa->nama }}
						</div>
					</div>
					<div class="x_title text-success">
						<h2>Status Data</h2>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Oleh</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->modified_by }}
						</div>
						<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu</div>
						<div class="col-xs-8 col-sm-4 col-md-4">
							: {{ $row->updated_at }}
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idpekerjaan" value = "{{ $row->idpekerjaan }}"?>
							<input type = "hidden" name = "idkegiatan" value = "{{ $row->idkegiatan }}"?>
							<input type = "hidden" name = "data" value = "{{ $data }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idkegiatan }}, '{{ $data }}')">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#idkecamatan").change(function(){
    	  var idkecamatan = $(this).val();
    	  var urlajax = "https://monevsda-kkr.com/public/datadesa/"+idkecamatan;
    	  var datadesa = "<option value=\"\"></option>";
        $.ajax({url: urlajax, success: function(result){
        		for(i=0 ; i < result.length ; i++){
        			datadesa += "<option value=\"" + result[i].iddesa + "\">";
        			datadesa += result[i].nama;
        			datadesa += "</option>";
        		}
        	$("#iddesa").html(datadesa);
    		}});
    });
});
</script>
@endsection
