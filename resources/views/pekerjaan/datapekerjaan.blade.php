<div class="x_title text-success">
	<h2>Satuan Kerja</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kabupaten</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->kabupaten }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Satuan Kerja</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->satuankerja }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Bidang</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->bidang }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Anggaran</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->ta }}
	</div>
</div>
<div class="x_title text-success">
	<h2>Surat Keputusan dan Penjabat</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal DPA</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tgldpa) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal RKA</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglrka) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PA</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglpa) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PA</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->nopa }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PA</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->namapa }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglppk) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->noppk }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ namaPenjabat($pekerjaan->namappk) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPTK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglpptk) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPTK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->nopptk }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Pejabat Pengadaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->nopp }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Pejabat Pengadaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglpp) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pejabat Pengadaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ namaPenjabat($pekerjaan->namapp) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama PPTK</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ namaPenjabat($pekerjaan->namapptk) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tim PPHP</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ namaPenjabat($pekerjaan->timpphp) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal PPHP</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglpphp) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK PPHP</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->nopphp }}
	</div>
</div>
<div class="x_title text-success">
	<h2>Informasi Lelang</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kode Lelang</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->kodelelang }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Lelang</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tgllelang) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Proses Pengadaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->propeng }}
	</div>
</div>
<div style="page-break-before: always"></div>
<div class="x_title text-success">
	<h2>Informasi Pekerjaan</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nama Pekerjaan</div>
	<div class="col-xs-8">
		: {{ $pekerjaan->namapekerjaan }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Kontrak</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglkontrak) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">SK Kontrak</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->nokontrak }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Kerja</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglselesaikerja) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tahun Kontrak</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->tahunkontrak }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu Pengerjaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->jmlhhari }} Hari
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Tanggal Selesai Pemeliharaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatTanggal($pekerjaan->tglselesaipemeliharaan) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jenis Pekerjaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->jnspek }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kategori Pekerjaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->katpek }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Pagu</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatNumber($pekerjaan->nilaipagu) }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Nilai Kontrak</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ formatNumber($pekerjaan->nilaikontrak) }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Sumber Dana</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->sumberdana }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status Pekerjaan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->statuspekerjaan }}
	</div>
</div>
<div class="x_title text-success">
	<h2>Volume Pekerjaan</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang dibangun (APBD) (DAK) (IPDMIP)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->jmlpintuairbangun }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang direhabilitasi (APBD) (DAK) (IPDMIP) (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->pjgsaluranrehab }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jumlah Pintu Air yang direhab (APBD) (DAK) (IPDMIP)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->jmlpintuairpelihara }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dinormalisasi (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->pjgsungai }}
	</div>
</div>
<!-- <div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Jaringan Rawa yang direhabilitasi (Meter)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->jawarehab }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Jaringan Rawa (Meter)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->pjgjawa }}
	</div>
</div> -->
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang dibangun (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->tangguljaringan }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dipelihara (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->pstkendalibanjir }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Tanggul Air yang direhabilitasi (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->kanalbanjir }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Panjang Saluran yang dibangun (Kilometer)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->peliharaparit }}
	</div>
</div>
<!-- <div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Pembersihan dan Pengerukkan Sungai (Meter)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->pembersihansungai }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Prasarana Air Baku (Buah)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->rehabairbaku }}
	</div>
</div> -->
<!-- <div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Rehab Saluran DAS (Meter)</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		{{ $pekerjaan->rehabdas }}
	</div>
</div> -->
<div class="x_title text-success">
	<h2>Pelaksana Pekerjaan</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pengawas</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->konpengawas }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Perencana</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->konperencana }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Konsultan Pelaksana</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->konpelaksana }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kontraktor Pelaksana</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->ktrpelaksana }}
	</div>
</div>
<div class="x_title text-success">
	<h2>Lokasi Pekerjaan</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Kecamatan</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->kecamatan->nama }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Desa</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->desa->nama }}
	</div>
</div>
<div class="x_title text-success">
	<h2>Status Data</h2>
	<div class="clearfix"></div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Status</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->status }}
	</div>
</div>
<div class="form-group">
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Oleh</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->modified_by }}
	</div>
	<div class="col-xs-4 col-sm-2 col-md-2 tebal">Waktu</div>
	<div class="col-xs-8 col-sm-4 col-md-4">
		: {{ $pekerjaan->updated_at }}
	</div>
</div>