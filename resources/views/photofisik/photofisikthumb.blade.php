<div class="x_title text-info">
  <h2>Photo</h2> 
  @if($edit != null && $edit =='Y' && session()->get('role')=='Superman')
    <a href="{{asset('/')}}photofisik/insert/{{$laporanfisik->idlaporanfisik}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
  @endif
  <div class="clearfix"></div>
</div>
@php ($no = 1)
@foreach ($laporanfisik->dataphotofisik as $photofisik)
  <div class="col-md-55">
    <div class="thumbnail">
      <div class="image view view-first">
        <a href="{{asset('/dataunggah/gambar')}}/{{ $photofisik['photofisik'] }}" target="_blank"><img style="height: 100%; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $photofisik['photofisik'] }}"/></a>
        <div class="mask">
          <p></p>
          <div class="tools tools-bottom">
            <a href="#" data-toggle="modal" data-target=".id{{$photofisik->idphotofisik}}"><i class="fa fa-search-plus"></i></a>
            @if($edit != null && $edit =='Y' && session()->get('role')=='Superman')
              <!-- <a href="{{asset('/')}}photofisik/{{ $photofisik->idphotofisik }}/update"><i class="fa fa-pencil"></i></a> -->
              <!-- <a href="{{asset('/')}}photofisik/{{ $photofisik->idphotofisik }}/delete"><i class="fa fa-trash-o"></i></a> -->
            @endif
          </div>
        </div>
      </div>
      <div class="caption">
        <p>
          {{ $photofisik['judul'] }}
        </p>
      </div>
    </div>
  </div>
  <div class="modal fade id{{$photofisik->idphotofisik}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">{{ $photofisik['judul'] }}</h4>
        </div>
        <div class="modal-body">
          <img style="width: 100%; display: block;" src="{{asset('/dataunggah/gambar')}}/{{ $photofisik['photofisik'] }}"/>
        </div>
      </div>
    </div>
  </div>
@endforeach