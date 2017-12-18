@extends('templates.app')

@section('title')
  Data Username
@endsection

@section('content')
<style>
th{
    text-align:center;
}
</style>


<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Username</h2> 
			<a href="{{asset('/')}}username/insert" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th>#</th>
						<th>username</th>
						<th>name</th>
						<th>email</th>
						<th>role</th>
						{{--  <th>password</th>  --}}
						{{--  <th>created_at</th>  --}}
						<th>updated_at</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($rows as $row)
					<tr>
						<td>{{ $row['idusername'] }}</td>
						<td>{{ $row['username'] }}</td>
						<td>{{ $row['name'] }}</td>
						<td>{{ $row['email'] }}</td>
						<td>{{ $row['role'] }}</td>
						{{--  <td>{{ $row['password'] }}</td>  --}}
						{{--  <td>{{ $row['created_at'] }}</td>  --}}
						<td>{{ $row['updated_at'] }}</td>
						<td align="center">
							<a href="{{asset('/')}}username/{{ $row->idusername }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}username/{{ $row->idusername }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>



@endsection


