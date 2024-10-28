@extends('templates.app')

@section('title')
Data Alat Pengawas 
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		@include('pekerjaan/pekerjaaninfo')
		<div class="x_title">
			<h2>Data Alat Pekerjaan&nbsp;</h2> 
			<a href="{{asset('/')}}alatp/insert/{{$idpekerjaan}}" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="30px">#</th>
						<!-- <th>idpekerjaan</th> -->
						<th width="150px">Jenis</th>
						<th width="150px">Merk</th>
						<th width="150px">Tipe</th>
						<!-- <th>keterangan</th> -->
						<th>Photo</th>
						<th width="80px">Status</th>
						<!-- <th>modified_by</th> -->
						<!-- <th>created_at</th> -->
						<!-- <th>updated_at</th> -->
						<th width="120px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($rows as $row)
					<tr>
						<td>{{ $no++}}.</td>
						<!-- <td>{{ $row['idpekerjaan'] }}</td> -->
						<td>{{ $row['jenis'] }}</td>
						<td>{{ $row['merk'] }}</td>
						<td>{{ $row['tipe'] }}</td>
						<!-- <td>{{ $row['keterangan'] }}</td> -->
						<td>
							<a href="#" data-toggle="modal" data-target=".idalatp{{$row->idalatp}}"><img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
							</a>
							<div class="modal fade idalatp{{$row->idalatp}}" tabindex="-1" role="dialog" aria-hidden="true">
						    <div class="modal-dialog modal-md">
						      <div class="modal-content">
						        <div class="modal-header">
						          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
						          </button>
						          <h4 class="modal-title" id="myModalLabel">{{ $row['jenis'] }} - {{ $row['merk'] }} - {{ $row['tipe'] }}</h4>
						        </div>
						        <div class="modal-body">
						          <img style="width: 100%; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						        </div>
						      </div>
						    </div>
						  </div>
						</td>
						<td>{{ $row['status'] }}</td>
						<!-- <td>{{ $row['modified_by'] }}</td> -->
						<!-- <td>{{ $row['created_at'] }}</td> -->
						<!-- <td>{{ $row['updated_at'] }}</td> -->
						<td align="center">
							<a href="{{asset('/')}}alatp/{{ $row->idalatp }}/detail" class="btn btn-dark btn-xs"><i class="fa fa-desktop"></i></a>
							<a href="{{asset('/')}}alatp/{{ $row->idalatp }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
							<a href="{{asset('/')}}alatp/{{ $row->idalatp }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

