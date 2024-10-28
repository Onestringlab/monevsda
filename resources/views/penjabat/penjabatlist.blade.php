@extends('templates.app')

@section('title')
  Data Pejabat
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Pejabat</h2> 
			<a href="{{asset('/')}}penjabat/insert/{{ $idsk }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table ">
				<thead>
					<tr>
						<th width="35px">#</th>
						<th width="150px">No SK</th>
						<th width="170px">NIP</th>
						<th width="200px">Nama Pejabat</th>
						<th>Jabatan SK</th>
						<th>Tahun</th>
						<th>Status</th>
						<!-- <th>Oleh</th>
						<th>Waktu</th> -->
						<th width="80px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datapenjabat as $penjabat)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $penjabat->sk->nosk }}</td>
						<td>{{ $penjabat['nip'] }}</td>
						<td>{{ $penjabat['namapenjabat'] }}</td>
						<td>{{ $penjabat['jabatan'] }}</td>
						<td>{{ $penjabat['tahun'] }}</td>
						<td>{{ $penjabat['status'] }}</td>
						<!-- <td>{{ $penjabat['modified_by'] }}</td>
						<td>{{ $penjabat['updated_at'] }}</td> -->
						<td align="center">
							<a href="{{asset('/')}}penjabat/{{ $penjabat->idpenjabat }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}penjabat/{{ $penjabat->idpenjabat }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

