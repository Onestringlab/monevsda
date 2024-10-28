<div class="x_title text-success">
	<h2>Laporan Fisik</h2> 
	<div class="clearfix"></div>
</div>
<div class="x_content">
	<table class="table table-striped table-bordered ">
		<thead>
			<tr>
				<th width="100px">Tanggal</th>
				<th>Keterangan</th>
				<th width="50px">%</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ formatTanggal($laporanfisik['tanggal']) }}</td>
				<td>{{ $laporanfisik['keterangan'] }}</td>
				<td class="text-center">{{ $laporanfisik['kemajuan'] }}</td>
			</tr>
		</tbody>
	</table>
</div>