<div class="x_content">
	<div class="x_title text-success">
		<h2>Data Dokumen Terkait</h2> 
		@if($edit != null && $edit =='Y')
		<a href="{{asset('/')}}dokumen/insert/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
		@endif
		<div class="clearfix"></div>
	</div>
	<div class="x_content">
		<table class="table table-striped jambo_table">
			<thead>
				<tr>
					<th width="30px">#</th>
					<th>Nama</th>
					<th width="70px">File</th>
					<th width="70px">Status</th>
					<th width="100px">Oleh</th>
					<th width="150px">Waktu</th>
					@if($edit != null && $edit =='Y')
					<th width="100px"></th>
					@endif
				</tr>
			</thead>
			<tbody>
				@php ($no = 1)
				@foreach ($datadokumen as $dokumen)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dokumen['juduldokumen'] }}</td>
					<td class="text-center"><a href="{{ asset('dataunggah/dokumen/')}}/{{$dokumen['namafile'] }}" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-file"></i></a></td>
					<td class="text-center">{{ $dokumen['status'] }}</td>
					<td class="text-center">{{ $dokumen['modified_by'] }}</td>
					<td class="text-center">{{ $dokumen['updated_at'] }}</td>
					@if($edit != null && $edit =='Y')
					<td class="text-center">
						<a href="{{asset('/')}}dokumen/{{ $dokumen->iddokumen }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
						<a href="{{asset('/')}}dokumen/{{ $dokumen->iddokumen }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
					</td>
					@endif
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>