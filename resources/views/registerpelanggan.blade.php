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
                <h1 class="auth-title">Registrasi</h1>
                <p class="auth-subtitle mb-3">Segera Daftarkan Diri</p>
                <form action="{{route('addregpelanggan')}}" method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" class="form-control form-control-xl" name="name" placeholder="Nama" autofocus required>
                        <div class="form-control-icon">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                        <div class="form-control-icon">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="bi bi-person"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" class="form-control form-control-xl" name="password" placeholder="Password" required>
                        <div class="form-control-icon">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Sign Up</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Sudah memiliki akun? Silahkan <a href="{{route('loginpelanggan')}}"
                        class="font-bold">Login</a>.</p>
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