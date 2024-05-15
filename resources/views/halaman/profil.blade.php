     @extends('page/layout/app')
     @section('title','Profil')
     @section('content')
     <div class="page-heading">
        <div class="col-12">
        <div class="alert alert-light-danger color-danger"><i
            class="bi bi-exclamation-circle"></i> Isi data diri kamu dengan benar, bila melakukan manipulasi data akun akan di nonaktifkan
        </div>
        @if (auth()->user()->member == '1')
        <div class="alert alert-light-success color-success"><i
            class="bi bi-exclamation-circle"></i> Selamat, Kamu sudah menjadi member, nikmati keuntungannya!
        </div>
        @endif
    </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    BIODATA {{Auth::user()->name}} <br>
                    <!-- <b>Note :</b> <span class="text text-danger">Email anda untuk Notifikasi Konfirmasi Penyewaan.</span> -->
                        <button type="button" class="btn rounded-pill btn-md btn-warning block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm{{Auth::user()->id}}">
                            <i class="icon dripicons-document-edit"></i> Lengkapi
                        </button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @foreach($data as $cst)
                                <tr>
                                    <td>NO KTP</td>
                                    <td>:</td>
                                    <td>{{$cst->ktp}}</td>
                                </tr>
                                <tr>
                                    <td>NAMA</td>
                                    <td>:</td>
                                    <td>{{$cst->name}}</td>
                                </tr>
                                <tr>
                                    <td>USERNAME</td>
                                    <td>:</td>
                                    <td>{{$cst->username}}</td>
                                </tr>
                                <tr>
                                    <td>EMAIL</td>
                                    <td>:</td>
                                    <td>{{$cst->email}}</td>
                                </tr>
                                <tr>
                                    <td>JENIS KELAMIN</td>
                                    <td>:</td>
                                    <td>{{$cst->jenis_kelamin}}</td>
                                </tr>
                                <tr>
                                    <td>NO TELP/WA</td>
                                    <td>:</td>
                                    <td>
                                        @if(substr($cst->no_telp,0,1)=='0')
                                        <a href="https://wa.me/62{{substr($cst->no_telp,1)}}" target="_blank">
                                            62 {{substr($cst->no_telp,1)}}
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>ALAMAT</td>
                                    <td>:</td>
                                    <td>{{$cst->alamat_penyewa}}</td>
                                </tr>
                                <div class="modal fade text-left" id="inlineForm{{Auth::user()->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content" style="border-bottom:1px solid blue;">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">LENGKAPI BIODATA </h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('lengkapi')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    @if($cst->ktp == NULL)
                                                    <label>No KTP: <span style="color: red;">&ast;</span></label>
                                                    @else
                                                    <label>No KTP: </label>
                                                    @endif
                                                    <div class="form-group">
                                                        <input type="number" name="ktp" value="{{$cst->ktp}}"
                                                        class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Nama: </label>
                                                    <div class="form-group">
                                                        <input type="text" name="name" value="{{$cst->name}}"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    @if($cst->username == NULL)
                                                    <label>Username: <span style="color: red;">&ast;</span></label>
                                                    @else
                                                    <label>Username: </label>
                                                    @endif
                                                    <div class="form-group">
                                                        <input type="text" name="username" value="{{$cst->username}}"
                                                        class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Email: </label>
                                                    <div class="form-group">
                                                        <input type="email" name="email" value="{{$cst->email}}"
                                                        class="form-control @error('email')is-invalid @enderror">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="id_sewa" value="{{$cst->id_datauser}}">
                                                <div class="col-lg-6">
                                                    @if($cst->no_telp == NULL)
                                                    <label>N0 Telp/WA: <span style="color: red;">&ast;</span></label>
                                                    @else
                                                    <label>N0 Telp/WA: </label>
                                                    @endif
                                                    <div class="form-group">
                                                        <input type="number" name="no_telp" value="{{$cst->no_telp}}"
                                                        class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    @if($cst->jenis_kelamin == NULL)
                                                    <label>JENIS KELAMIN: <span style="color: red;">&ast;</span></label>
                                                    @else
                                                    <label>JENIS KELAMIN: </label>
                                                    @endif
                                                    <div class="form-group">
                                                        <select class="form-control" name="jenis_kelamin" required>
                                                            <option <?php if($cst->jenis_kelamin=="Laki-Laki"){echo "selected";}?> value="Laki-Laki" >Laki-Laki</option>
                                                            <option <?php if($cst->jenis_kelamin=="Perempuan"){echo "selected";}?> value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @if ($cst->gambar_ktp == NULL)
                                                 <div class="col-lg-6">
                                                    <div class="form=group">
                                                        <label>KTP <span style="color: red;">&ast;</span></label>
                                                        <input type="file" class="form-control" accept="image/*" name="gambar_ktp" value="{{$cst->gambar_ktp}}" required>
                                                    </div>  
                                                </div>
                                                @endif
                                                @if ($cst->gambar_ktp!==NULL)
                                                <div class="col-lg-6">
                                                    <div class="form=group">
                                                        <label>KTP</label>
                                                        <input type="file" class="form-control" accept="image/*" name="gambar_ktp">
                                                    </div>  
                                                </div>
                                                @endif
                                                <div class="col-lg-6">
                                                    @if($cst->alamat_penyewa == NULL)
                                                    <label>Alamat: <span style="color: red;">&ast;</span></label>
                                                    @else
                                                    <label>Alamat: </label>
                                                    @endif
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="alamat_penyewa" rows="4">{{$cst->alamat_penyewa}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Kembali</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Simpan</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade text-left" id="daftar{{Auth::user()->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                    role="document">
                                    <div class="modal-content" style="border-bottom:1px solid blue;">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel33">DAFTAR MEMBER</h4>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('daftarmember')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <h4 class="card-title">Nama : {{$cst->name}}</h4>
                                                    <h4 class="card-title">Email : {{$cst->email}}</h4>
                                                    <h4 class="card-title">Username : {{$cst->username}}</h4>
                                                    <input type="hidden" value="Member" name="level">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light-secondary"
                                            data-bs-dismiss="modal">
                                            <i class="bx bx-x d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Kembali</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary ml-1" onclick="return confirm('Yakin Mendaftar Menjadi Member?')">
                                            <i class="bx bx-check d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Daftar</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <h4 class="card-title">Gambar KTP</h4>
              <div>
                @foreach ($data as $dt)
          <p>
            <a href=""><img src="{{asset('gambarktp')}}/{{$dt->gambar_ktp}}" style="min-height: 220px; max-width: 300px;" alt=""></a>
          </p>
            @endforeach
        </div>
      </div>
    </div>
  </section>

</div>
@endsection