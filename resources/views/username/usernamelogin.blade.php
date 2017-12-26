@extends('templates.login')

@section('title')
  Halaman Login
@endsection

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form action="{{asset('/')}}ceklogin" method="post">
      <h1>Halaman Login</h1>
      <div>
        <input type="text" class="form-control" placeholder="Nama Pengguna" name="username" required="" />
      </div>
      <div>
        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
      </div>
      <div>
        {{ csrf_field() }}
        <button type="submit" class="btn btn-success">Masuk</button>
        <button type="reset" class="btn btn-primary">Hapus</button>
        <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <div>
          <h3><i class="fa fa-paw"></i> Sistem Informasi Monitoring dan Evaluasi</h3>
          <p>Bidang Sumber Daya Air <br> Dinas Pekerjaan Umum  Kabupaten Kuburaya</p>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection