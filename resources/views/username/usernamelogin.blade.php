@extends('templates.login')

@section('title')
  Halaman Login
@endsection

@section('content')
<div class="animate form login_form">
  <section class="login_content">
    <form action="{{asset('/')}}ceklogin" method="post">
      <!-- <h1>Halaman Login</h1> -->
      <div class="text-center">
        <img src="{{asset('/')}}images/EMONEV-SDA.png" alt="" width="150px">
      </div>
      <br>
      <div>
        <label class="control-label">Username</label>
        <input type="text" class="form-control" placeholder="Nama Pengguna" name="username" required="" />
      </div>
      <div>
        <label class="control-label">Password</label>
        <input type="password" class="form-control" placeholder="Password" name="password" required="" />
      </div>
      <div>
        <label class="control-label">Tahun Anggaran</label>
        <select name = "ta" class="form-control">
          @foreach($datatahun as $tahun)
            <option value="{{ $tahun->value }}">{{ $tahun->value }}</option>
          @endforeach
        </select>
      </div>
      <div>
        {{ csrf_field() }}
        <br>
        <button type="submit" class="btn btn-success">Login</button>
        <button type="reset" class="btn btn-primary">Reset</button>
        <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
      </div>

      <div class="clearfix"></div>

      <div class="separator">
        <div>
          <!-- <h3><i class="fa fa-desktop"></i> e-Monev SDA</h3> -->
          <p><strong>Bidang Sumber Daya Air <br> Dinas PUPR Kabupaten Kuburaya</strong></p>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection