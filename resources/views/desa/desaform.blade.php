@extends('templates.app')

@section('title')
  Data Desa
@endsection

@section('content')
<script>
function button_cancel(idkecamatan){
	location.replace('{{ asset('/') }}desa/'+idkecamatan);
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Desa - Kecamatan {{ $kecamatan->nama }}</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}desa/manage" method="post">
				@if($action == 'insert')
				  <div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Desa</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
							<input class="form-control" type="text" name="nama" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Kode Desa</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							<input class="form-control" type="text" name="kode" value="">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus,'kode','value','status','')!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkecamatan" value = "{{ $kecamatan->idkecamatan }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $kecamatan->idkecamatan }})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Desa</label>
						<div class="col-xs-12 col-sm-10 col-md-10">
	   					<input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Kode Desa</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
	   					<input class="form-control" type="text" name="kode" value="{{ $row->kode }}">
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{!!selectForm($datastatus, 'kode', 'value', 'status', $row->status)!!}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-4">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "iddesa" value = "{{ $row->iddesa }}"?>
							<input type = "hidden" name = "idkecamatan" value = "{{ $row->idkecamatan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{$row->idkecamatan}})">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Nama Desa</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->nama }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Kode Desa</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->kode }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Status</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Oleh</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->modified_by }}
						</div>
						<label class="col-xs-12 col-sm-2 col-md-2 tebal">Waktu</label>
						<div class="col-xs-12 col-sm-4 col-md-4">
							{{ $row->updated_at }}
						</div>
						<div class="col-sm-offset-2 col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "iddesa" value = "{{ $row->iddesa }}"?>
							<input type = "hidden" name = "idkecamatan" value = "{{ $row->idkecamatan }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel({{ $row->idkecamatan }})">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Desa</h2> 
			<a href="{{asset('/')}}desa/insert/{{ $kecamatan->idkecamatan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>Kecamatan</th>
						<th>Nama Desa</th>
						<th>Kode</th>
						<th>Status</th>
						<th>Oleh</th>
						<!-- <th>created_at</th> -->
						<th>Waktu</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datadesa as $desa)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $desa->kecamatan['nama'] }}</td>
						<td>{{ $desa['nama'] }}</td>
						<td>{{ $desa['kode'] }}</td>
						<td>{{ $desa['status'] }}</td>
						<td>{{ $desa['modified_by'] }}</td>
						<!-- <td>{{ $desa['created_at'] }}</td> -->
						<td>{{ $desa['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}desa/{{ $desa->iddesa }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}desa/{{ $desa->iddesa }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
@endsection

