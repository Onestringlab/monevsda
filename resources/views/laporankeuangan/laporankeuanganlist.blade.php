
<div class="x_title text-success">
	<h2>Data Laporan Keuangan</h2> 
	@if($edit != null && $edit =='Y')
	<a href="{{asset('/')}}laporankeuangan/insert/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
	@endif
	<div class="clearfix"></div>
</div>
<div class="x_content">
	<table class="table table-striped jambo_table">
		<thead>
			<tr>
				<th width="30px">#</th>
				<!-- <th>idpekerjaan</th> -->
				<th width="100px">Tanggal</th>
				<th>Keterangan</th>
				<th width="200px">Pembayaran</th>
				<!-- <th>kemajuan</th> -->
				<!-- <th>buktiba</th> -->
				<!-- <th width="50px">%</th> -->
				@if($edit != null && $edit =='Y')
				<!-- <th width="100px">Oleh</th> -->
				<!-- <th width="150px">Waktu</th> -->
				<th width="100px"></th>
				@endif
			</tr>
		</thead>
		<tbody>
			@php ($no = 1)
			@php ($totalpembayaran = 0)
			@php ($totalpersen = 0)
			@foreach ($datalaporankeuangan as $laporankeuangan)
				@php ($totalpembayaran += $laporankeuangan['pembayaran'])
				@if ($pekerjaan['nilaikontrak'] > 0)
					@php ($totalpersen = 100 * $totalpembayaran / $pekerjaan['nilaikontrak'])
				@endif
			<tr>
				<td>{{ $no++ }}</td>
				<!-- <td>{{ $laporankeuangan['idpekerjaan'] }}</td> -->
				<td>{{ formatTanggal($laporankeuangan['tanggal']) }}</td>
				<td>{{ $laporankeuangan['keterangan'] }}</td>
				<td class="text-right">{{ formatNumber($laporankeuangan['pembayaran']) }}</td>
				<!-- <td>{{ formatPersen($totalpersen) }}</td> -->
				<!-- <td>{{ $laporankeuangan['buktiba'] }}</td> -->
				@if($edit != null && $edit =='Y')
				<!-- <td>{{ $laporankeuangan['modified_by'] }}</td> -->
				<!-- <td>{{ $laporankeuangan['created_at'] }}</td> -->
				<!-- <td>{{ $laporankeuangan['updated_at'] }}</td> -->
				<td align="center">
					<a href="{{asset('/')}}laporankeuangan/{{ $laporankeuangan->idlaporankeuangan }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
					<a href="{{asset('/')}}laporankeuangan/{{ $laporankeuangan->idlaporankeuangan }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
				</td>
				@endif
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td><strong>Total</strong></td>
				<td class="text-right"><strong>{{ formatNumber($totalpembayaran) }}</strong></td>
				@if($edit != null && $edit =='Y')
				<td></td>
				<!-- <td></td> -->
				<!-- <td></td> -->
				@endif
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><strong>Sisa Pembayaran</strong></td>
				<td class="text-right"><strong>{{ formatNumber($pekerjaan['nilaikontrak'] - $totalpembayaran ) }} </strong></td>
				@if($edit != null && $edit =='Y')
				<td></td>
				<!-- <td></td> -->
				<!-- <td></td> -->
				@endif
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><strong>Nilai Kontrak </strong></td>
				<td class="text-right"><strong>{{ formatNumber($pekerjaan['nilaikontrak']) }} </strong></td>
				@if($edit != null && $edit =='Y')
				<td></td>
				<!-- <td></td> -->
				<!-- <td></td> -->
				@endif
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><strong>Presentase Pembayaran</strong></td>
				<td class="text-right">
					<strong>
					@if ($pekerjaan['nilaikontrak'] > 0)
						{{ formatPersen(100 * $totalpembayaran / $pekerjaan['nilaikontrak']) }}%
					@else
						0%
					@endif
					</strong>
				</td>
				@if($edit != null && $edit =='Y')
				<td></td>
				<!-- <td></td> -->
				<!-- <td></td> -->
				@endif
			</tr>
		</tbody>
	</table>
</div>
