<div class="x_title text-info">
  <h2>Photo</h2> 
  <a href="{{asset('/')}}photofisikp/insert/{{$laporanfisikp -> idlaporanfisikp}}" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
  <div class="clearfix"></div>
</div>
@php ($no = 1)
@foreach ($laporanfisikp -> dataphotofisikp as $photofisikp)
<div class="col-md-55">
  <div class="thumbnail">
    <div class="image view view-first">
      <a href="{{asset('/dataunggah/gambar')}}/{{ $photofisikp['photofisik'] }}" target="_blank"><img style="height: 100%; display: block;" src="{{ asset('/dataunggah/gambar')}}/{{ $photofisikp['photofisik'] }}"/></a>
      <div class="mask">
        <p></p>
        <div class="tools tools-bottom">
          <a href="#" data-toggle="modal" data-target=".id{{$photofisikp->idphotofisikp}}"><i class="fa fa-search-plus"></i></a>
          <a href="{{asset('/')}}photofisikp/{{ $photofisikp->idphotofisikp }}/update"><i class="fa fa-pencil"></i></a>
          <a href="{{asset('/')}}photofisikp/{{ $photofisikp->idphotofisikp }}/delete"><i class="fa fa-trash-o"></i></a>
        </div>
      </div>
    </div>
    <div class="caption">
      <p>
        {{ $photofisikp['judul'] }}
      </p>
    </div>
  </div>
</div>
<div class="modal fade id{{$photofisikp->idphotofisikp}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">{{ $photofisikp['judul'] }}</h4>
      </div>
      <div class="modal-body">
        <img style="width: 100%; display: block;" src="{{asset('/dataunggah/gambar')}}/{{ $photofisikp['photofisik'] }}"/>
      </div>
    </div>
  </div>
</div>
@endforeach