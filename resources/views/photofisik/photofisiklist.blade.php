
<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Data Photo Fisik</h2> 
			<a href="{{asset('/')}}photofisik/insert/{{$laporanfisik->idlaporanfisik}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<table class="table table-striped table-bordered ">
				<thead>
					<tr>
						<th width="30px">#</th>
						<th>Judul</th>
						<th width="300px">Photo Fisik</th>
						<th width="100px"></th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($laporanfisik->dataphotofisik as $photofisik)
					<tr>
						<td>{{ $no++ }}</td>
						<td>{{ $photofisik['judul'] }}</td>
						<td><img width="300" src="{{asset('/dataunggah/gambar')}}/{{ $photofisik['photofisik'] }}"> </td>
						<td align="center">
							<a href="{{asset('/')}}photofisik/{{ $photofisik->idphotofisik }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> </a>
							<a href="{{asset('/')}}photofisik/{{ $photofisik->idphotofisik }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>


