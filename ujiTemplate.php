@extends('template.main')

@section('title')
  Data Pengawas 
@endsection

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="x_panel">
<div class="x_title">
<h2> Data Pengawas</h2>
		<a href="{{asset('/')}}pengawas/insert" class="btn btn-success btn-xs" > <i class="fa fa-plus"></i></a>
<div class="clearfix"></div>
</div>
<div class="x_content">
<table class="table table-striped jambo_table ">
<thead class="thead-dark">
<tr>
		<th>idpengawas</th>
		<th>idkonsultan</th>
		<th>username</th>
		<th>name</th>
		<th>email</th>
		<th>password</th>
		<th>photo</th>
		<th>modified_by</th>
		<th>created_at</th>
		<th>updated_at</th>
</tr>
</thead>
<tbody>
@php ($no = 1)
@foreach ($rows as $row)
<tr>
		<td>{{ $row['idpengawas'] }}</td>
		<td>{{ $row['idkonsultan'] }}</td>
		<td>{{ $row['username'] }}</td>
		<td>{{ $row['name'] }}</td>
		<td>{{ $row['email'] }}</td>
		<td>{{ $row['password'] }}</td>
		<td>{{ $row['photo'] }}</td>
		<td>{{ $row['modified_by'] }}</td>
		<td>{{ $row['created_at'] }}</td>
		<td>{{ $row['updated_at'] }}</td>
<td align="center">
<a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/detail"><i class="material-icons">desktop_windows</i></a><a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/update"><i class="material-icons">create</i></a><a href="{{asset('/')}}pengawas/{{ $row->idpengawas }}/delete"><i class="material-icons">clear</i></a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
@endsection
	
