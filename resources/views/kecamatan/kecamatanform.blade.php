@extends('templates.app')

@section('title')
  Data Kecamatan
@endsection

@section('content')
<script>
function button_cancel(){
	location.replace('{{ asset('/') }}kecamatan');
}
</script>
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Form Kecamatan</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}kecamatan/manage" method="post">
				@if($action == 'insert')
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Kecamatan</label>
						<div class="col-sm-2">
							<input class="form-control" type="text" name="nama" value="">
						</div>
						<label class="col-sm-2 control-label">Kode Kecamatan</label>
						<div class="col-sm-1">
							<input class="form-control" type="text" name="kode" value="">
						</div>
						<label class="col-sm-1 control-label">Status</label>
						<div class="col-sm-1">
							{!!selectForm($datastatus,'kode','value','status','')!!}
						</div>
						<div class="col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<button type="submit" class="btn btn-success">Insert</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'update')
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Kecamatan</label>
						<div class="col-sm-2">
	   					<input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
						</div>
						<label class="col-sm-2 control-label">Kode Kecamatan</label>
						<div class="col-sm-1">
	   					<input class="form-control" type="text" name="kode" value="{{ $row->kode }}">
						</div>
						<label class="col-sm-1 control-label">Status</label>
						<div class="col-sm-1">
							{!!selectForm($datastatus,'kode','value','status',$row->status)!!}
						</div>
						<div class="col-sm-3">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkecamatan" value = "{{ $row->idkecamatan }}"?>
							<button type="submit" class="btn btn-success">Update</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@elseif($action == 'delete')
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Kecamatan</label>
						<div class="col-sm-10">
							{{ $row->nama }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Kode Kecamatan</label>
						<div class="col-sm-10">
							{{ $row->kode }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							{{ $row->status }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Oleh</label>
						<div class="col-sm-10">
							{{ $row->modified_by }}
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Waktu</label>
						<div class="col-sm-10">
							{{ $row->updated_at }}
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type = "hidden" name = "action" value = "{{ $action }}"?>
							<input type = "hidden" name = "idkecamatan" value = "{{ $row->idkecamatan }}"?>
							<button type="submit" class="btn btn-success">Delete</button>
							<button type="button" class="btn btn-primary" onclick="button_cancel()">Cancel</button>
						</div>
					</div>
				@endif
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Kecamatan</h2> 
			<a href="{{asset('/')}}kecamatan/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Kecamatan</th>
						<th>Kode Kecamatan</th>
						<th>Status</th>
						<th>Oleh</th>
						<!-- <th>created_by</th> -->
						<th>Waktu</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($datakecamatan as $kecamatan)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $kecamatan['nama'] }}</td>
						<td>{{ $kecamatan['kode'] }}</td>
						<td>{{ $kecamatan['status'] }}</td>
						<td>{{ $kecamatan['modified_by'] }}</td>
						<!-- <td>{{ $kecamatan['created_by'] }}</td> -->
						<td>{{ $kecamatan['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}kecamatan/{{ $kecamatan->idkecamatan }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}kecamatan/{{ $kecamatan->idkecamatan }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
							<a href="{{asset('/')}}desa/{{ $kecamatan->idkecamatan }}" class="btn btn-primary btn-xs">Desa</i></a>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
