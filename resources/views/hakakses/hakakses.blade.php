@extends('templates.app')

@section('title')
  Hak Akses
@endsection

@section('content')
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Pemberian Hak Akses</h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<form class="form-horizontal" action="{{ asset('/') }}hakakses/waktu" method="post">
				<div class="form-group">
					<p>{{ $keterangan }} </p>
					<label class="col-xs-12 col-sm-2 col-md-2 tebal">Lama Waktu (Menit)</label>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<input class="form-control" type="number" name="waktu" value="60">
					</div>
					<div class="col-sm-6">
						<button type="submit" class="btn btn-success">Berikan Hak Akses</button>
					</div>
				</div>
				{{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
</div>
@endsection