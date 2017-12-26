@extends('templates.app')

@section('title')
  Data Konsultan
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Konsultan</h2> 
			<a href="{{asset('/')}}konsultan/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama dan Alamat</th>
						<!-- <th>Alamat</th> -->
						<th>Penanggung Jawab</th>
						<!-- <th>No Telp</th> -->
						<!-- <th>E-Mail</th> -->
						<th>Status</th>
						<th>Oleh</th>
						<!-- <th>created_at</th> -->
						<th width="15%">Waktu</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datakonsultan as $konsultan)
					<tr>
						<td align="right">{{ $no++ }}.</td>
						<td>
							{{ $konsultan['nama'] }}<br>
							{{ $konsultan['alamat'] }}
							@if($konsultan['notelp']!="")
								<br><i class="fa fa-phone" aria-hidden="true"></i> {{ $konsultan['notelp'] }}
							@endif
						</td>
						<!-- <td>{{ $konsultan['alamat'] }}</td> -->
						<td>
							{{ $konsultan['penanggungjawab'] }}
							@if($konsultan['email']!="")
								<br><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ $konsultan['email'] }}
							@endif
						</td>
						<!-- <td>{{ $konsultan['notelp'] }}</td> -->
						<!-- <td><a href='{{ $konsultan['email'] }}'><i class="fa fa-envelope-o" aria-hidden="true"></i></a></td> -->
						<td>{{ $konsultan['status'] }}</td>
						<td>{{ $konsultan['modified_by'] }}</td>
						<!-- <td>{{ $konsultan['created_at'] }}</td> -->
						<td>{{ $konsultan['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}konsultan/{{ $konsultan->idkonsultan }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}konsultan/{{ $konsultan->idkonsultan }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
