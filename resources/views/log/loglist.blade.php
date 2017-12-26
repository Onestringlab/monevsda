@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Log</h2> 
			<a href="{{asset('/')}}log/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th width="2%">#</th>
						<th width="25%">Aktivitas</th>
						<th>Keterangan</th>
						<th width="5%">Oleh</th>
						 <!-- <th>created_at</th> -->
						<th width="15%">Waktu</th>
						<th width="10%"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 15 * ($datalog->currentPage()-1)+1)
					@foreach ($datalog as $log)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $log['aktivitas'] }}</td>
						<td>{{ $log['keterangan'] }}</td>
						<td>{{ $log['modified_by'] }}</td>
						<!-- <td>{{ $log['created_at'] }}</td> -->
						<td>{{ $log['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}log/{{ $log->idlog }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}log/{{ $log->idlog }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{$datalog->links()}}
		</div>
	</div>
</div>
@endsection

