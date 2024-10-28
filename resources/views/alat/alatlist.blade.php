<div class="x_title text-success">
	<h2>Data Alat</h2> 
	@if($edit != null && $edit =='Y' && session()->get('role')=='Superman')
		<a href="{{asset('/')}}alat/insert/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
	@endif
	@if($edit != null && $edit =='Y')
		<a href="{{asset('/')}}alat/singkronalat/{{ $pekerjaan -> idpekerjaan }}" class="btn btn-info btn-xs">Singkron</a>
		<a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target=".data-alat-pengawas">Alat Pengawas</a>
	@endif
	<div class="clearfix"></div>
</div>
<div class="x_content">
	<table class="table table-striped jambo_table">
		<thead>
			<tr>
				<th width="30px">#</th>
				<!-- <th>idpekerjaan</th> -->
				<th>Jenis</th>
				<th>Merk</th>
				<th>Tipe</th>
				<th>Keterangan</th>
				<th width="200">Photo</th>
				<!-- <th>modified_by</th> -->
				<!-- <th>created_at</th> -->
				<!-- <th>updated_at</th> -->
				@if($edit != null && $edit =='Y')
				<th width="100px"></th>
				@endif
			</tr>
		</thead>
		<tbody>
			@php ($no = 1)
			@foreach ($dataalat as $alat)
			<tr>
				<td>{{ $no++ }}</td>
				<!-- <td>{{ $alat['idpekerjaan'] }}</td> -->
				<td>{{ $alat['jenis'] }}</td>
				<td>{{ $alat['merk'] }}</td>
				<td>{{ $alat['tipe'] }}</td>
				<td>{{ $alat['keterangan'] }}</td>
				<td>
					<a href="#" data-toggle="modal" data-target=".idalat{{$alat->idalat}}"><img style="width : 200px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $alat['photo'] }}"/>
					</a>
					<div class="modal fade idalat{{$alat->idalat}}" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
									</button>
									<h4 class="modal-title" id="myModalLabel">{{ $alat['jenis'] }} - {{ $alat['merk'] }} - {{ $alat['tipe'] }}</h4>
								</div>
								<div class="modal-body">
									<img style="width: 100%; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $alat['photo'] }}"/>
								</div>
							</div>
						</div>
					</div>
				</td>
				<!-- <td>{{ $alat['modified_by'] }}</td> -->
				<!-- <td>{{ $alat['created_at'] }}</td> -->
				<!-- <td>{{ $alat['updated_at'] }}</td> -->
				@if($edit != null && $edit =='Y')
				<td class="text-center" >
					<a href="{{asset('/')}}alat/{{ $alat->idalat }}/update" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
					<a href="{{asset('/')}}alat/{{ $alat->idalat }}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

<div class="modal fade data-alat-pengawas" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Data Alat Pengawas</h4>
      </div>
      <div class="modal-body">
         <table class="table table-striped jambo_table" style="table-layout: fixed;">
				<thead>
					<tr>
						<th width="30px">#</th>
						<th width="150px">Jenis</th>
						<th width="150px">Merk</th>
						<th width="150px">Tipe</th>
						<!-- <th>Photo</th> -->
						<th width="80px">Status</th>
					</tr>
				</thead>
				<tbody>
					@php ($no = 1)
					@foreach ($dataalatp as $row)
					<tr>
						<td>{{ $no++}}.</td>
						<td>{{ $row['jenis'] }}</td>
						<td>{{ $row['merk'] }}</td>
						<td>{{ $row['tipe'] }}</td>
						<!-- <td>
							<img style="width : 50px; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $row['photo'] }}"/>
						</td> -->
						<td>{{ $row['status'] }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
     </div>
   </div>
 </div>
</div>
