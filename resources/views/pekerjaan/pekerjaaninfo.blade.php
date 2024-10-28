<div class="x_title text-primary">
	<h2>Monitoring dan Evaluasi Pekerjaan</h2> 
	<div class="clearfix"></div>
</div>
<div class="x_content">
	<table class="table table-striped jambo_table">
		<thead>
			<tr>
				<th>Nama Pekerjaan</th>
				<th width="120">No Kontrak</th>
				<th width="180">Pelaksana</th>
				<th width="90">Tgl Kontrak</th>
				<th width="90">Tgl Selesai</th>
				<th width="150">Nilai Kontrak</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{ $pekerjaan['namapekerjaan'] }} </td>
				<td>{{ $pekerjaan['nokontrak'] }}</td>
				<td>
					@if( $pekerjaan['konpelaksana'] != "" && $pekerjaan['konpelaksana'] != "-")
						{{ $pekerjaan['konpelaksana'] }}
					@else
						 {{ $pekerjaan['ktrpelaksana'] }}
					@endif
				</td>
				<td class="text-center">{{ formatTanggal($pekerjaan['tglkontrak']) }}</td>
				<td class="text-center">{{ formatTanggal($pekerjaan['tglselesaikerja']) }}</td>
				<td class="text-right">{{ formatNumber($pekerjaan['nilaikontrak']) }}</td>
			</tr>
		</tbody>
	</table>
</div>