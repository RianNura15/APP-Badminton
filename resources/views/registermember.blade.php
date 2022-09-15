@extends('layout/app')

@section('title', 'Register')

@section('content')
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <h1 class="auth-title">Daftar MEMBER</h1>
                    <p class="auth-subtitle mb-3">Segera Daftarkan Diri</p>

                    <form action="{{route('addregmember')}}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl @error('name')is-invalid @enderror" name="name" placeholder="Nama" required>
                            @error('name')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl @error('email')is-invalid @enderror" name="email" placeholder="Email" required>
                            @error('email')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl @error('password')is-invalid @enderror" name="password" placeholder="Password" required>
                            @error('password')
                                  <div class="invalid-feedback">{{ $message }}</div>
                              @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <a href="{{route('data_sewa')}}" class="font-bold">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
    @endsection